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

test('a player detail is resolved from the bounded public player index', function () {
    $projectionPath = storage_path('framework/testing/player-details-public-projections');
    File::deleteDirectory($projectionPath);
    File::ensureDirectoryExists($projectionPath);
    config()->set('public_site.projection.path', $projectionPath);

    $uuid = '3f2504e0-4f89-41d3-9a0c-0305e82c3301';

    try {
        PublicProjectionFixture::publish($projectionPath, [
            'pages/player-details.json' => PublicProjectionFixture::page([
                'players' => [
                    $uuid => [
                        'uuid' => $uuid,
                        'name' => 'Public Player',
                        'age' => 24,
                        'overallRating' => 82,
                        'market_value' => '1500000',
                        'appearances' => 20,
                        'goals' => 6,
                        'assists' => 4,
                        'player_position' => ['short_name' => 'CM', 'name' => 'Central midfielder'],
                        'club' => ['name' => 'Public FC', 'country' => ['name' => 'England']],
                        'mainAttributes' => ['Passing' => 85],
                        'stats' => ['Assists' => 4, 'Goals' => 6],
                    ],
                ],
                'seo' => ['available_locales' => ['en']],
            ], ['locale' => 'en', 'page' => 1, 'per_page' => 20]),
            'pages/player-stats.json' => PublicProjectionFixture::page([
                'players' => [$uuid => [
                    'player' => [
                        'name' => 'Public Player',
                        'position' => 'CM',
                        'club' => 'Public FC',
                        'country' => 'England',
                        'profileUrl' => '/{locale}/player/details/'.$uuid,
                        'matchesUrl' => null,
                    ],
                    'summary' => [
                        'matches' => 20,
                        'overallRating' => 82,
                        'averageRating' => '-',
                        'goals' => 6,
                        'assists' => 4,
                        'minutes' => '-',
                    ],
                    'performance' => [['label' => 'Appearances', 'value' => 20]],
                    'attributes' => [['label' => 'Passing', 'value' => 85]],
                ]],
                'seo' => ['available_locales' => ['en']],
            ], ['locale' => 'en', 'page' => 1, 'per_page' => 20]),
        ]);

        $this->get('/en/player/details/'.$uuid)
            ->assertOk()
            ->assertSee('Public Player')
            ->assertSee('Public FC')
            ->assertSee('name="robots" content="index,follow"', false);

        $this->get('/en/player/'.$uuid.'/stats')
            ->assertOk()
            ->assertSee('Appearances')
            ->assertSee('Passing')
            ->assertHeaderMissing('X-Robots-Tag');

        $this->get('/en/player/details/3f2504e0-4f89-41d3-9a0c-0305e82c3302')
            ->assertServiceUnavailable()
            ->assertHeader('X-Robots-Tag', 'noindex, nofollow');
        $this->get('/en/player/3f2504e0-4f89-41d3-9a0c-0305e82c3302/stats')
            ->assertServiceUnavailable()
            ->assertHeader('X-Robots-Tag', 'noindex, nofollow');
    } finally {
        File::deleteDirectory($projectionPath);
    }
});

test('a club detail is resolved from the canonical public club route', function () {
    $projectionPath = storage_path('framework/testing/club-details-public-projections');
    File::deleteDirectory($projectionPath);
    File::ensureDirectoryExists($projectionPath);
    config()->set('public_site.projection.path', $projectionPath);

    try {
        PublicProjectionFixture::publish($projectionPath, [
            'pages/club.json' => PublicProjectionFixture::page([
                'clubs' => [
                    'germany/munchen-stars' => [
                        'name' => 'München Stars',
                        'country' => ['name' => 'Germany'],
                        'city' => ['name' => 'Munich'],
                        'stadium' => ['name' => 'Public Arena', 'capacity' => 55000, 'opening' => 2005],
                        'players' => [[
                            'uuid' => '00b6d621-85ca-5eff-bea6-b79332849cc5',
                            'name' => 'Public Player',
                            'age' => 24,
                            'market_value' => '1200000.00',
                            'player_position' => ['short_name' => 'CM'],
                        ]],
                    ],
                ],
                'seo' => ['available_locales' => ['en', 'ro']],
            ], ['locale' => 'en', 'page' => 1, 'per_page' => 20]),
        ]);

        $this->get(route('page.club.details', ['locale' => 'en', 'country' => 'germany', 'club' => 'munchen-stars']))
            ->assertOk()
            ->assertSee('München Stars')
            ->assertSee('Public Arena')
            ->assertSee('Public Player')
            ->assertHeaderMissing('X-Robots-Tag');

        $this->get(route('page.club.details', ['locale' => 'en', 'country' => 'germany', 'club' => 'unknown-club']))
            ->assertServiceUnavailable()
            ->assertHeader('X-Robots-Tag', 'noindex, nofollow');
    } finally {
        File::deleteDirectory($projectionPath);
    }
});

test('a match detail is resolved from the canonical public match route', function () {
    $projectionPath = storage_path('framework/testing/match-details-public-projections');
    File::deleteDirectory($projectionPath);
    File::ensureDirectoryExists($projectionPath);
    config()->set('public_site.projection.path', $projectionPath);

    $matchKey = 'public-league/2026/9c4fef83-f297-4b71-9c63-715609242e4c';
    $match = [
        'label' => 'Madrid Royals vs Barcelona Blau',
        'homeName' => 'Madrid Royals',
        'awayName' => 'Barcelona Blau',
        'score' => '2 - 1',
        'competition' => 'Public League',
        'date' => '2026-08-09',
        'status' => 'finished',
    ];

    try {
        PublicProjectionFixture::publish($projectionPath, [
            'pages/match-details.json' => PublicProjectionFixture::page([
                'matches' => [
                    $matchKey => [
                        'home_club' => ['name' => 'Madrid Royals', 'country' => ['name' => 'Spain']],
                        'away_club' => ['name' => 'Barcelona Blau', 'country' => ['name' => 'Spain']],
                        'home_goals' => 2,
                        'away_goals' => 1,
                        'match_ended' => true,
                        'match_start' => '2026-08-09T19:30:00+00:00',
                        'leagueName' => 'Public League',
                        'league_season' => '2026',
                        'stadium' => ['name' => 'Royal Arena'],
                    ],
                ],
                'seo' => ['available_locales' => ['en', 'ro']],
            ], ['locale' => 'en', 'page' => 1, 'per_page' => 20]),
            'pages/match-stats.json' => PublicProjectionFixture::page([
                'matches' => [$matchKey => [
                    'match' => $match,
                    'hasStats' => true,
                    'statRows' => [[
                        'label' => 'Possession',
                        'description' => 'Control of the ball.',
                        'home' => 57,
                        'away' => 43,
                        'homePercent' => 57,
                    ]],
                    'overviewUrl' => '/{locale}/match/'.$matchKey,
                ]],
                'seo' => ['available_locales' => ['en', 'ro']],
            ], ['locale' => 'en', 'page' => 1, 'per_page' => 20]),
            'pages/match-lineups.json' => PublicProjectionFixture::page([
                'matches' => [$matchKey => [
                    'match' => $match,
                    'lineups' => [[
                        'club' => 'Madrid Royals',
                        'formation' => '4-3-3',
                        'players' => [['name' => 'Public Player', 'position' => 'CM', 'url' => '/{locale}/player/details/player-id']],
                    ]],
                    'overviewUrl' => '/{locale}/match/'.$matchKey,
                    'statsUrl' => '/{locale}/match/'.$matchKey.'/stats',
                ]],
                'seo' => ['available_locales' => ['en', 'ro']],
            ], ['locale' => 'en', 'page' => 1, 'per_page' => 20]),
            'pages/match-ratings.json' => PublicProjectionFixture::page([
                'matches' => [$matchKey => [
                    'match' => $match,
                    'hasRatings' => true,
                    'summary' => ['topPerformer' => 'Public Player', 'homeAverage' => '8.4', 'awayAverage' => '7.1', 'totalRated' => 2],
                    'ratingTeams' => [],
                    'overviewUrl' => '/{locale}/match/'.$matchKey,
                    'timelineUrl' => '/{locale}/match/'.$matchKey.'/timeline',
                    'lineupsUrl' => '/{locale}/match/'.$matchKey.'/lineups',
                    'statsUrl' => '/{locale}/match/'.$matchKey.'/stats',
                ]],
                'seo' => ['available_locales' => ['en', 'ro']],
            ], ['locale' => 'en', 'page' => 1, 'per_page' => 20]),
            'pages/match-timeline.json' => PublicProjectionFixture::page([
                'matches' => [$matchKey => [
                    'match' => $match,
                    'events' => [['minute' => "64'", 'eventName' => 'Goal', 'playerName' => 'Public Player']],
                    'overviewUrl' => '/{locale}/match/'.$matchKey,
                    'lineupsUrl' => '/{locale}/match/'.$matchKey.'/lineups',
                    'statsUrl' => '/{locale}/match/'.$matchKey.'/stats',
                ]],
                'seo' => ['available_locales' => ['en', 'ro']],
            ], ['locale' => 'en', 'page' => 1, 'per_page' => 20]),
        ]);

        $this->get(route('page.match.details', [
            'locale' => 'en',
            'competition' => 'public-league',
            'year' => 2026,
            'slug' => '9c4fef83-f297-4b71-9c63-715609242e4c',
        ]))
            ->assertOk()
            ->assertSee('Madrid Royals vs Barcelona Blau')
            ->assertSee('Royal Arena')
            ->assertHeaderMissing('X-Robots-Tag');

        $canonicalParameters = [
            'locale' => 'en',
            'competition' => 'public-league',
            'year' => 2026,
            'slug' => '9c4fef83-f297-4b71-9c63-715609242e4c',
        ];

        $this->get(route('page.match.stats', $canonicalParameters))
            ->assertOk()
            ->assertSee('Possession');
        $this->get(route('page.match.lineups', $canonicalParameters))
            ->assertOk()
            ->assertSee('4-3-3');
        $this->get(route('page.match.ratings', $canonicalParameters))
            ->assertOk()
            ->assertSee('Public Player');
        $this->get(route('page.match.timeline', $canonicalParameters))
            ->assertOk()
            ->assertSee('Goal');

        $this->get(route('page.match.details', [
            'locale' => 'en',
            'competition' => 'public-league',
            'year' => 2026,
            'slug' => 'missing-match',
        ]))
            ->assertServiceUnavailable()
            ->assertHeader('X-Robots-Tag', 'noindex, nofollow');
        $this->get(route('page.match.stats', [
            'locale' => 'en',
            'competition' => 'public-league',
            'year' => 2026,
            'slug' => 'missing-match',
        ]))
            ->assertServiceUnavailable()
            ->assertHeader('X-Robots-Tag', 'noindex, nofollow');
    } finally {
        File::deleteDirectory($projectionPath);
    }
});

test('legacy slug-only match statistics route resolves by canonical match key', function () {
    $projectionPath = storage_path('framework/testing/legacy-match-stats-projections');
    File::deleteDirectory($projectionPath);
    File::ensureDirectoryExists($projectionPath);
    config()->set('public_site.projection.path', $projectionPath);

    $matchKey = 'public-league/2026/public-final';

    try {
        PublicProjectionFixture::publish($projectionPath, [
            'pages/match-stats.json' => PublicProjectionFixture::page([
                'matches' => [
                    $matchKey => [
                        'match' => [
                            'label' => 'Public FC vs United',
                            'homeName' => 'Public FC',
                            'awayName' => 'United',
                            'score' => '3 - 0',
                            'competition' => 'Public League',
                            'date' => '2026-08-16',
                            'status' => 'finished',
                        ],
                        'hasStats' => true,
                        'overviewUrl' => '/en/match/'.$matchKey,
                        'lineupsUrl' => '/en/match/'.$matchKey.'/lineups',
                        'timelineUrl' => '/en/match/'.$matchKey.'/timeline',
                    ],
                ],
                'seo' => ['available_locales' => ['en']],
            ], ['locale' => 'en', 'page' => 1, 'per_page' => 20]),
        ]);

        $this->get('/en/match/public-final/stats')
            ->assertOk()
            ->assertSee('Public FC vs United')
            ->assertHeaderMissing('X-Robots-Tag');
        $this->get('/en/match/public-league/2026/public-final/stats')->assertOk();
    } finally {
        File::deleteDirectory($projectionPath);
    }
});

test('competition season routes resolve only published standing projections', function () {
    $projectionPath = storage_path('framework/testing/competition-season-public-projections');
    File::deleteDirectory($projectionPath);
    File::ensureDirectoryExists($projectionPath);
    config()->set('public_site.projection.path', $projectionPath);

    $season = [
        'league' => 'Public League',
        'name' => 'Public League',
        'year' => '2026',
        'country' => 'England',
        'current' => true,
    ];
    $projection = [
        'season' => $season,
        'summary' => ['clubsRanked' => 1, 'playedMatches' => 1, 'upcomingMatches' => 0],
        'standingRows' => [[
            'club' => 'Public FC',
            'MP' => 2,
            'W' => 2,
            'D' => 0,
            'L' => 0,
            'GF' => 5,
            'GA' => 1,
            'GD' => 4,
            'PTS' => 6,
            'details_url' => '/{locale}/club/england/public-fc',
        ]],
        'playedMatches' => [],
        'upcomingMatches' => [],
        'seasonLinks' => [],
        'leagueLinks' => [],
        'leaguePageUrl' => '/{locale}/league/public-league',
    ];

    try {
        PublicProjectionFixture::publish($projectionPath, [
            'pages/league-season.json' => PublicProjectionFixture::page([
                'leagues' => ['public-league' => $projection],
                'seo' => ['available_locales' => ['en', 'ro']],
            ], ['locale' => 'ro', 'page' => 1, 'per_page' => 20]),
            'pages/competition-season.json' => PublicProjectionFixture::page([
                'competitions' => ['public-league' => [
                    ...$projection,
                    'page' => [
                        'kicker' => 'Competition Centre',
                        'summary' => 'Public competition data.',
                        'locationLabel' => 'Competition',
                        'tableTitle' => 'League Table',
                        'tableHint' => 'Sorted by points.',
                        'seasonLinksLabel' => 'Seasons',
                        'peerLinksLabel' => 'Competitions',
                        'peerLinksAriaLabel' => 'Competitions',
                    ],
                ]],
                'seo' => ['available_locales' => ['en', 'ro']],
            ], ['locale' => 'en', 'page' => 1, 'per_page' => 20]),
            'pages/standings.json' => PublicProjectionFixture::page([
                'leagues' => ['public-league' => $projection],
                'seo' => ['available_locales' => ['en', 'ro']],
            ], ['locale' => 'en', 'page' => 1, 'per_page' => 20]),
            'pages/season.json' => PublicProjectionFixture::page([
                'seasons' => ['2026' => [
                    'season' => ['year' => '2026'],
                    'summary' => ['total' => 1, 'leagues' => 1, 'competitions' => 0],
                    'leagueRows' => [[
                        'name' => 'Public League',
                        'country' => 'England',
                        'region' => 'England',
                        'current' => true,
                        'url' => '/{locale}/league/public-league',
                    ]],
                    'competitionRows' => [],
                    'yearLinks' => [[
                        'label' => '2026',
                        'url' => '/{locale}/season/2026',
                        'active' => true,
                    ]],
                ]],
                'seo' => ['available_locales' => ['en', 'ro']],
            ], ['locale' => 'en', 'page' => 1, 'per_page' => 20]),
        ]);

        $this->get('/ro/league/public-league')
            ->assertOk()
            ->assertSee('Public FC')
            ->assertSee('href="/ro/club/england/public-fc"', false)
            ->assertHeaderMissing('X-Robots-Tag');
        $this->get('/en/competition/public-league')->assertOk()->assertSee('Public League');
        $this->get('/en/standings/public-league')->assertOk()->assertSee('Public FC');
        $this->get('/en/season/2026')
            ->assertOk()
            ->assertSee('Public League')
            ->assertSee('href="/en/league/public-league"', false);
        $this->get('/en/league/unknown-league')
            ->assertServiceUnavailable()
            ->assertHeader('X-Robots-Tag', 'noindex, nofollow');
        $this->get('/en/season/1900')
            ->assertServiceUnavailable()
            ->assertHeader('X-Robots-Tag', 'noindex, nofollow');
    } finally {
        File::deleteDirectory($projectionPath);
    }
});

test('country routes resolve only countries with published public clubs', function () {
    $projectionPath = storage_path('framework/testing/country-public-projections');
    File::deleteDirectory($projectionPath);
    File::ensureDirectoryExists($projectionPath);
    config()->set('public_site.projection.path', $projectionPath);

    try {
        PublicProjectionFixture::publish($projectionPath, [
            'pages/country.json' => PublicProjectionFixture::page([
                'countries' => ['england' => [
                    'country' => [
                        'name' => 'England',
                        'code' => '',
                        'region' => '',
                        'flagUrl' => null,
                        'imageUrl' => null,
                        'descriptionHtml' => 'Public club data for England.',
                    ],
                    'summary' => ['cities' => 1, 'leagues' => 0, 'clubs' => 1, 'players' => 1],
                    'leagueLinks' => [],
                    'countryLinks' => [[
                        'label' => 'England',
                        'url' => '/{locale}/country/england',
                        'active' => true,
                    ]],
                    'listingTabs' => [[
                        'label' => 'Clubs',
                        'short' => 'Clubs',
                        'url' => '/{locale}/country/england',
                        'active' => true,
                    ]],
                    'activeListing' => [
                        'tab' => 'clubs',
                        'title' => 'Clubs in England',
                        'results' => [
                            'data' => [[
                                'name' => 'Public FC',
                                'city' => 'London',
                                'league' => 'Independent',
                                'url' => '/{locale}/club/england/public-fc',
                            ]],
                            'per_page' => 20,
                            'total' => 1,
                        ],
                    ],
                ]],
                'seo' => ['available_locales' => ['en', 'ro']],
            ], ['locale' => 'en', 'page' => 1, 'per_page' => 20]),
        ]);

        $this->get('/en/country/england')
            ->assertOk()
            ->assertSee('Public FC')
            ->assertSee('href="/en/club/england/public-fc"', false)
            ->assertHeaderMissing('X-Robots-Tag');
        $this->get('/en/country/unknown-country')
            ->assertServiceUnavailable()
            ->assertHeader('X-Robots-Tag', 'noindex, nofollow');
    } finally {
        File::deleteDirectory($projectionPath);
    }
});

test('city routes resolve only unambiguous published city projections', function () {
    $projectionPath = storage_path('framework/testing/city-public-projections');
    File::deleteDirectory($projectionPath);
    File::ensureDirectoryExists($projectionPath);
    config()->set('public_site.projection.path', $projectionPath);

    try {
        PublicProjectionFixture::publish($projectionPath, [
            'pages/city.json' => PublicProjectionFixture::page([
                'cities' => ['london' => [
                    'city' => [
                        'name' => 'London',
                        'country' => 'England',
                        'countryUrl' => '/{locale}/country/england',
                        'descriptionHtml' => 'Public club data for London.',
                        'latitude' => null,
                        'longitude' => null,
                    ],
                    'summary' => ['clubs' => 1, 'players' => 1],
                    'otherCityLinks' => [[
                        'label' => 'London',
                        'url' => '/{locale}/city/london',
                        'active' => true,
                    ]],
                    'listingTabs' => [[
                        'label' => 'Clubs',
                        'short' => 'Clubs',
                        'url' => '/{locale}/city/london',
                        'active' => true,
                    ]],
                    'activeListing' => [
                        'tab' => 'clubs',
                        'title' => 'Clubs in London',
                        'results' => [
                            'data' => [[
                                'name' => 'Public FC',
                                'league' => 'Independent',
                                'url' => '/{locale}/club/england/public-fc',
                            ]],
                            'per_page' => 20,
                            'total' => 1,
                        ],
                    ],
                ]],
                'seo' => ['available_locales' => ['en', 'ro']],
            ], ['locale' => 'en', 'page' => 1, 'per_page' => 20]),
        ]);

        $this->get('/en/city/london')
            ->assertOk()
            ->assertSee('Public FC')
            ->assertSee('href="/en/country/england"', false)
            ->assertSee('href="/en/club/england/public-fc"', false)
            ->assertHeaderMissing('X-Robots-Tag');
        $this->get('/en/city/unknown-city')
            ->assertServiceUnavailable()
            ->assertHeader('X-Robots-Tag', 'noindex, nofollow');
    } finally {
        File::deleteDirectory($projectionPath);
    }
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
