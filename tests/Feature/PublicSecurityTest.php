<?php

use App\Http\Middleware\TrustPublicHosts;
use App\PublicSite\SanitizeProjectionData;
use App\PublicSite\ValidatePublicRuntimeConfiguration;
use Illuminate\Support\Facades\File;
use Tests\Support\PublicProjectionFixture;

beforeEach(function () {
    config()->set('public_site.auth_app_url', 'https://app.sqaudex.com');
});

test('public responses enforce a nonce based content security policy', function () {
    $first = $this->get('/en');
    $second = $this->get('/en/about');
    $policy = (string) $first->headers->get('Content-Security-Policy');

    expect($policy)
        ->toContain("default-src 'none'")
        ->toContain("connect-src 'self' https://app.sqaudex.com")
        ->toContain("script-src-attr 'none'")
        ->not->toContain("script-src 'self' 'unsafe-inline'")
        ->and($first->headers->get('X-Frame-Options'))->toBe('DENY');

    preg_match("/nonce-([^' ;]+)/", $policy, $firstNonce);
    preg_match("/nonce-([^' ;]+)/", (string) $second->headers->get('Content-Security-Policy'), $secondNonce);

    expect($firstNonce[1] ?? null)->not->toBeNull()
        ->and($first->getContent())->toContain('nonce="'.($firstNonce[1] ?? '').'"')
        ->and($secondNonce[1] ?? null)->not->toBe($firstNonce[1] ?? null);
});

test('public responses are stateless and cacheable by browsers and the edge', function () {
    $response = $this->get('/en/about');

    $response->assertOk()
        ->assertHeaderMissing('Set-Cookie');

    expect($response->headers->get('Cache-Control'))
        ->toContain('public')
        ->toContain('max-age=60')
        ->toContain('s-maxage=300')
        ->toContain('stale-while-revalidate=600')
        ->and($response->headers->get('ETag'))->not->toBeNull();
});

test('projection sanitization removes active html and rejects unsafe URLs', function () {
    $sanitized = app(SanitizeProjectionData::class)->handle([
        'descriptionHtml' => '<p>Safe <strong>words</strong></p><img src=x onerror=alert(1)>',
        'href' => 'javascript:alert(1)',
        'imageUrl' => '//tracker.attacker.test/pixel.png',
        'internalUrl' => '/en/teams',
        'externalUrl' => 'https://attacker.test/phishing',
    ]);

    expect($sanitized)
        ->toHaveKey('descriptionHtml', 'Safe words')
        ->toHaveKey('href', null)
        ->toHaveKey('imageUrl', null)
        ->toHaveKey('internalUrl', '/en/teams')
        ->toHaveKey('externalUrl', null);
});

test('projected structured data cannot terminate its json ld script element', function () {
    $projectionPath = storage_path('framework/testing/security-public-projections');
    File::deleteDirectory($projectionPath);
    File::ensureDirectoryExists($projectionPath);
    config()->set('public_site.projection.path', $projectionPath);

    PublicProjectionFixture::publish($projectionPath, [
        'pages/homepage.json' => PublicProjectionFixture::page([
            'seo' => [
                'title' => '</script><script>alert(1)</script>',
                'description' => 'Safe description',
            ],
        ], ['locale' => 'en', 'page' => 1, 'per_page' => 20]),
    ]);

    $this->get('/en')
        ->assertOk()
        ->assertDontSee('</script><script>alert(1)</script>', false)
        ->assertSee('\\u003C', false)
        ->assertDontSee('onchange=', false);

    File::deleteDirectory($projectionPath);
});

test('trusted host patterns are exact and do not accept arbitrary subdomains', function () {
    config()->set('public_site.trusted_hosts', ['^sqaudex\\.com$', '^www\\.sqaudex\\.com$']);

    expect(config('public_site.trusted_hosts'))
        ->toContain('^sqaudex\\.com$')
        ->not->toContain('^(.+\\.)?sqaudex\\.com$');
});

test('trusted hosts are resolved from configuration after application bootstrap', function () {
    $patterns = ['^sqaudex\\.com$', '^www\\.sqaudex\\.com$'];
    config()->set('public_site.trusted_hosts', $patterns);

    expect(app(TrustPublicHosts::class)->hosts())->toBe($patterns);
});

test('production runtime configuration rejects insecure public origins and global proxy trust', function () {
    config()->set('app.url', 'http://sqaudex.com');

    expect(fn () => app(ValidatePublicRuntimeConfiguration::class)->handle(forceProductionValidation: true))
        ->toThrow(RuntimeException::class, 'APP_URL must be an absolute HTTPS URL');

    config()->set('app.url', 'https://sqaudex.com');
    config()->set('public_site.trusted_hosts', ['^sqaudex\\.com$']);
    config()->set('public_site.trusted_proxies', '*');

    expect(fn () => app(ValidatePublicRuntimeConfiguration::class)->handle(forceProductionValidation: true))
        ->toThrow(RuntimeException::class, 'PUBLIC_TRUSTED_PROXIES');
});
