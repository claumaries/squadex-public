<?php

use App\PublicSite\LocaleRegistry;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Lang;
use Tests\Support\PublicProjectionFixture;

test('every canonical locale serves public content and locale-aware auth redirects', function (string $locale) {
    $this->get('/'.$locale.'/about')->assertOk();
    $this->get('/'.$locale.'/login')->assertRedirect(rtrim((string) config('public_site.auth_app_url'), '/').'/'.$locale.'/login');
})->with(array_keys(require __DIR__.'/../../config/locales.php'));

test('the default locale redirects and localized public pages render seo metadata', function () {
    $this->get('/')
        ->assertMovedPermanently()
        ->assertRedirect('/en');

    $this->get('/en')
        ->assertOk()
        ->assertCookieMissing('public_locale')
        ->assertSee('<link rel="canonical" href="'.route('pages.homepage', ['locale' => 'en']).'">', false)
        ->assertSee('hreflang="fr"', false)
        ->assertSee('v2/assets/squadex-og.png', false)
        ->assertSee(rtrim((string) config('public_site.auth_app_url'), '/').'/en/login', false)
        ->assertSee(rtrim((string) config('public_site.auth_app_url'), '/').'/en/register', false);
});

test('configured public SEO metadata is translated for every route locale', function () {
    $registry = app(LocaleRegistry::class);
    $missing = [];

    foreach (config('public_pages') as $page => $definition) {
        foreach ($registry->routeLocales() as $routeLocale) {
            if ($routeLocale === 'en') {
                continue;
            }

            $translationLocale = $registry->translationLocale($routeLocale);

            foreach (['title', 'description'] as $field) {
                $key = $definition[$field];

                if (! Lang::hasForLocale($key, $translationLocale, false)) {
                    $missing[] = "{$page}.{$field} ({$routeLocale})";
                }
            }
        }
    }

    expect($missing)->toBeEmpty();
});

test('static pages advertise translated SEO metadata with their matching locales', function () {
    $this->get('/fr/about')
        ->assertOk()
        ->assertSee('<title>À propos de Squadex</title>', false)
        ->assertSee('hreflang="en-GB"', false)
        ->assertSee('hreflang="fr"', false)
        ->assertSee('hreflang="ro"', false);
});

test('projected pages use the route locale translation catalog for SEO metadata', function () {
    $this->get('/ro/market')
        ->assertSee('<title>Piața jucătorilor</title>', false);

    $this->get('/zh/market')
        ->assertSee('<title>球员市场</title>', false);
});

test('legacy locale routes preserve their path and query string', function () {
    $this->get('/cn/about?campaign=launch')
        ->assertMovedPermanently()
        ->assertRedirect('/zh/about?campaign=launch');
});

test('static public pages render while unavailable projections are not indexable', function () {
    $this->get('/fr/privacy-policy')->assertOk();

    $projectionPath = storage_path('framework/testing/unavailable-public-projections');
    File::deleteDirectory($projectionPath);
    File::ensureDirectoryExists($projectionPath);
    config()->set('public_site.projection.path', $projectionPath);

    try {
        $this->get('/en/teams')
            ->assertServiceUnavailable()
            ->assertHeader('Retry-After', '300')
            ->assertHeader('X-Robots-Tag', 'noindex, nofollow')
            ->assertSee('temporarily unavailable')
            ->assertSee('name="robots" content="noindex, nofollow"', false);
    } finally {
        File::deleteDirectory($projectionPath);
    }
});

test('a projected paginator is hydrated for the public Blade view', function () {
    $projectionPath = storage_path('framework/testing/routing-public-projections');
    File::deleteDirectory($projectionPath);
    File::ensureDirectoryExists($projectionPath);
    config()->set('public_site.projection.path', $projectionPath);

    PublicProjectionFixture::publish($projectionPath, [
        'pages/teams.json' => PublicProjectionFixture::page([
            'clubs' => [
                'current_page' => 1,
                'data' => [[
                    'routeParameters' => ['country' => 'england', 'club' => 'public-fc'],
                    'name' => 'Public FC',
                    'city' => 'London',
                    'country' => 'England',
                    'league' => 'Public League',
                    'manager' => 'Public Manager',
                    'players' => 24,
                    'squadValue' => '1,000 SQX',
                ]],
                'per_page' => 20,
                'total' => 1,
            ],
            'countries' => [['id' => 1, 'name' => 'England']],
            'leagues' => [['id' => 2, 'name' => 'Public League']],
            'filters' => [],
        ], ['locale' => 'en', 'page' => 1, 'per_page' => 20]),
    ]);

    $this->get('/en/teams')
        ->assertOk()
        ->assertSee('Public FC')
        ->assertSee('Public League')
        ->assertDontSee('hreflang="fr"', false);

    File::deleteDirectory($projectionPath);
});

test('projected filter URLs are not indexable', function () {
    $projectionPath = storage_path('framework/testing/filter-public-projections');
    File::deleteDirectory($projectionPath);
    File::ensureDirectoryExists($projectionPath);
    config()->set('public_site.projection.path', $projectionPath);

    PublicProjectionFixture::publish($projectionPath, [
        'pages/teams.json' => PublicProjectionFixture::page([
            'clubs' => ['current_page' => 1, 'data' => [], 'per_page' => 20, 'total' => 0],
            'countries' => [],
            'leagues' => [],
            'filters' => [],
        ], ['direction' => 'asc', 'locale' => 'en', 'page' => 1, 'per_page' => 20, 'sort' => 'name']),
    ]);

    try {
        $this->get('/en/teams?sort=name&direction=asc')
            ->assertOk()
            ->assertHeader('X-Robots-Tag', 'noindex, follow')
            ->assertSee('name="robots" content="noindex, follow"', false);
    } finally {
        File::deleteDirectory($projectionPath);
    }
});

test('an approved static public page renders', function (string $path) {
    $this->get('/en/'.$path)->assertOk();
})->with([
    'about',
    'contact',
    'game',
    'status',
    'changelog',
    'guides',
    'insights',
    'highlights',
    'stories',
    'community',
    'discord',
    'twitter',
    'referral',
    'ambassadors',
    'partners',
    'investors',
    'token',
    'tokenomics',
    'token-roadmap',
    'token-transparency',
    'presale',
    'how-to-buy',
    'contract',
    'liquidity',
    'vesting',
    'whitepaper',
    'privacy-policy',
    'cookie-policy',
    'terms-and-conditions',
    'kyc-policy',
    'disclaimer',
    'faq',
]);
