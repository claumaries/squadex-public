<?php

use Illuminate\Support\Facades\File;
use Tests\Support\PublicProjectionFixture;

test('every canonical locale serves public content and locale-aware auth redirects', function (string $locale) {
    $this->get('/'.$locale.'/about')->assertOk();
    $this->get('/'.$locale.'/login')->assertRedirect('https://app.sqaudex.com/'.$locale.'/login');
})->with(array_keys(require __DIR__.'/../../config/locales.php'));

test('the default locale redirects and localized public pages render seo metadata', function () {
    $this->get('/')
        ->assertMovedPermanently()
        ->assertRedirect('/en');

    $this->get('/en')
        ->assertOk()
        ->assertCookieMissing('public_locale')
        ->assertSee('<link rel="canonical" href="http://localhost/en">', false)
        ->assertSee('hreflang="fr"', false)
        ->assertSee('https://app.sqaudex.com/en/login', false)
        ->assertSee('https://app.sqaudex.com/en/register', false);
});

test('legacy locale routes preserve their path and query string', function () {
    $this->get('/cn/about?campaign=launch')
        ->assertMovedPermanently()
        ->assertRedirect('/zh/about?campaign=launch');
});

test('static public pages render while unavailable projections fail safely', function () {
    $this->get('/fr/privacy-policy')->assertOk();

    $this->get('/en/teams')
        ->assertOk()
        ->assertSee('temporarily unavailable');
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
        ->assertSee('Public League');

    File::deleteDirectory($projectionPath);
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
