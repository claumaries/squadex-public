<?php

$csv = static fn (?string $value): array => array_values(array_filter(array_map(
    static fn (string $item): string => trim($item),
    explode(',', (string) $value),
)));

$appHost = parse_url((string) env('APP_URL', 'http://localhost'), PHP_URL_HOST) ?: 'localhost';
$trustedHosts = $csv(env('PUBLIC_TRUSTED_HOSTS', $appHost));
$trustedProxies = env('PUBLIC_TRUSTED_PROXIES', '*');

return [
    'auth_app_url' => env('AUTH_APP_URL', 'https://app.sqaudex.com'),
    'contact_address' => env('PUBLIC_CONTACT_ADDRESS', env('MAIL_FROM_ADDRESS', 'hello@example.com')),
    'trusted_hosts' => array_map(
        static fn (string $host): string => '^'.preg_quote($host, '/').'$',
        $trustedHosts,
    ),
    'trusted_proxies' => $trustedProxies === '*' ? '*' : $csv($trustedProxies),
    'media_hosts' => $csv(env('PUBLIC_MEDIA_HOSTS', $appHost)),

    'legacy_aliases' => [
        'news' => 'latest-news',
        'marketplace' => 'market',
        'terms-of-service' => 'terms-and-conditions',
        'cookies' => 'cookie-policy',
        'roadmap' => 'token-roadmap',
        'transparency' => 'token-transparency',
        'buy' => 'how-to-buy',
    ],

    'legacy_redirects' => [
        'fixtures' => ['route' => 'pages.matches', 'query' => ['status' => 'scheduled']],
        'results' => ['route' => 'pages.matches', 'query' => ['status' => 'finished']],
        'match-predictions' => ['route' => 'pages.football-predictions'],
        'documentation' => ['route' => 'pages.guides'],
        'articles' => ['route' => 'pages.news'],
        'trending' => ['route' => 'pages.news', 'query' => ['category' => 'trending']],
        'latest' => ['route' => 'pages.news'],
        'popular' => ['route' => 'pages.news', 'query' => ['category' => 'popular']],
        'recommended' => ['route' => 'pages.news', 'query' => ['category' => 'recommended']],
        'search' => ['route' => 'pages.news'],
        'explore' => ['route' => 'pages.game'],
        'simulate' => ['route' => 'pages.game'],
        'predictions' => ['route' => 'pages.football-predictions'],
        'ai-analysis' => ['route' => 'pages.football-predictions'],
        'manager-mode' => ['route' => 'pages.game'],
        'maintenance' => ['route' => 'pages.status'],
        'offline' => ['route' => 'pages.status'],
        'early-access' => ['auth' => 'register'],
        'waitlist' => ['auth' => 'register'],
    ],

    'gone_paths' => [
        'api',
        'api/docs',
        'ai-predictions-feed',
        'custom-simulation',
        'daily-picks',
        'simulation-history',
        'what-if-scenarios',
        'premium',
        'pricing',
        'credits',
        'upgrade',
    ],

    'projection' => [
        'contract_version' => env('PUBLIC_PROJECTION_CONTRACT_VERSION', 'v1'),
        'path' => env('PUBLIC_PROJECTION_PATH', storage_path('app/public-projections')),
        'cache_ttl' => (int) env('PUBLIC_PROJECTION_CACHE_TTL', 300),
        'stale_ttl' => (int) env('PUBLIC_PROJECTION_STALE_TTL', 86400),
        'max_snapshot_age' => (int) env('PUBLIC_PROJECTION_MAX_SNAPSHOT_AGE', 86400),
        'max_bytes' => (int) env('PUBLIC_PROJECTION_MAX_BYTES', 5242880),
        'max_files' => (int) env('PUBLIC_PROJECTION_MAX_FILES', 256),
        'max_variants' => (int) env('PUBLIC_PROJECTION_MAX_VARIANTS', 1000),
    ],

    'sitemap_sections' => [
        'static',
        'clubs',
        'matches',
        'league-seasons',
        'competition-seasons',
        'standings',
        'team-forms',
        'seasons',
        'countries',
        'cities',
        'players',
        'news',
        'blogs',
    ],
];
