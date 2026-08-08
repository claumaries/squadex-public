<!DOCTYPE html>
<html lang="{{ data_get($seo ?? [], 'htmlLang', app()->getLocale()) }}">
<head>
    @php
        $seo = $seo ?? [];
        $seoTitle = $seo['title'] ?? trans('custom.title_home');
        $seoDescription = $seo['description'] ?? trans('custom.football_manager_description');
        $seoKeywords = $seo['keywords'] ?? null;
        $seoCanonical = $seo['canonical'] ?? request()->fullUrl();
        $seoAlternates = $seo['alternates'] ?? [];
        $seoImage = $seo['image'] ?? asset('v2/assets/squadex-og.png');
        $seoRobots = $seo['robots'] ?? 'index,follow';
        $seoXDefault = $seo['xDefault'] ?? $seoCanonical;
        $seoStructuredData = $seo['structuredData'] ?? [
            '@context' => 'https://schema.org',
            '@type' => 'WebPage',
            'name' => $seoTitle,
            'description' => $seoDescription,
            'url' => $seoCanonical,
            'inLanguage' => $seo['htmlLang'] ?? app()->getLocale(),
            'image' => $seoImage,
        ];
        $seoOpenGraph = $seo['openGraph'] ?? [
            'type' => 'website',
            'title' => $seoTitle,
            'description' => $seoDescription,
            'url' => $seoCanonical,
            'image' => $seoImage,
            'siteName' => config('app.name'),
            'locale' => data_get(config('locales'), localeCode().'.og_locale', 'en_GB'),
            'alternateLocales' => collect(config('locales'))->pluck('og_locale')->reject(fn ($locale) => $locale === data_get(config('locales'), localeCode().'.og_locale'))->all(),
        ];
        $seoTwitter = $seo['twitter'] ?? [
            'card' => 'summary_large_image',
            'title' => $seoTitle,
            'description' => $seoDescription,
            'image' => $seoImage,
        ];
        $localizedSwitchUrls = collect($seoAlternates)->mapWithKeys(fn ($alternate, $code) => [$code => $alternate['url']])->all();
    @endphp

    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta name="description" content="{{ $seoDescription }}">
    @if(is_string($seoKeywords) && $seoKeywords !== '')
        <meta name="keywords" content="{{ $seoKeywords }}">
    @endif
    <meta name="robots" content="{{ $seoRobots }}">
    <link rel="canonical" href="{{ $seoCanonical }}">
    @foreach($seoAlternates as $alternate)
        <link rel="alternate" hreflang="{{ $alternate['hreflang'] }}" href="{{ $alternate['url'] }}">
    @endforeach


    <link rel="alternate" hreflang="x-default" href="{{ $seoXDefault }}">
    <meta property="og:type" content="{{ $seoOpenGraph['type'] }}" />
    <meta property="og:title" content="{{ $seoOpenGraph['title'] }}" />
    <meta property="og:description" content="{{ $seoOpenGraph['description'] }}" />
    <meta property="og:url" content="{{ $seoOpenGraph['url'] }}" />
    <meta property="og:image" content="{{ $seoOpenGraph['image'] }}" />
    <meta property="og:site_name" content="{{ $seoOpenGraph['siteName'] }}" />
    <meta property="og:locale" content="{{ $seoOpenGraph['locale'] }}" />
    @foreach($seoOpenGraph['alternateLocales'] as $alternateLocale)
        <meta property="og:locale:alternate" content="{{ $alternateLocale }}" />
    @endforeach
    <meta name="twitter:card" content="{{ $seoTwitter['card'] }}">
    <meta name="twitter:title" content="{{ $seoTwitter['title'] }}">
    <meta name="twitter:description" content="{{ $seoTwitter['description'] }}">
    <meta name="twitter:image" content="{{ $seoTwitter['image'] }}">
    <title>{{ $seoTitle }}</title>
    <link rel="shortcut icon" href="{{ asset('favicon.png') }}" type="image/x-icon">
    <link href="{{ asset('v2/css/inter.css') }}" rel="stylesheet">
    <link href="{{ asset('v2/css/style.css') }}" rel="stylesheet">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <script nonce="{{ Illuminate\Support\Facades\Vite::cspNonce() }}" type="application/ld+json">{!! Illuminate\Support\Js::encode($seoStructuredData) !!}</script>
</head>
<body
    data-auth-session-url="{{ auth_app_session_url() }}"
    data-auth-dashboard-url="{{ auth_app_url('dashboard') }}"
>
@php
    $languages = config('locales');
    $currentUiLocale = localeCode();
    $currentLanguage = $languages[$currentUiLocale] ?? $languages['en'];
    $tokenName = config('app.token_name');
    $communityMenuGroups = [
        'Platform' => [
            ['label' => 'Game', 'route' => 'pages.game'],
            ['label' => 'Marketplace', 'route' => 'pages.marketplace.players'],
            ['label' => 'Tournaments', 'route' => 'pages.tournaments'],
            ['label' => 'Leaderboards', 'route' => 'pages.leaderboards'],
        ],
        'Match Centre' => [
            ['label' => 'Matches', 'route' => 'pages.matches'],
            ['label' => 'Fixtures', 'route' => 'pages.matches', 'query' => ['status' => 'scheduled']],
            ['label' => 'Results', 'route' => 'pages.matches', 'query' => ['status' => 'finished']],
            ['label' => 'Match Predictions', 'route' => 'pages.football-predictions'],
            ['label' => 'Teams', 'route' => 'pages.teams'],
            ['label' => 'Players', 'route' => 'pages.players'],
        ],
        'Resources' => [
            ['label' => 'Documentation', 'route' => 'pages.guides'],
            ['label' => 'Whitepaper', 'route' => 'pages.whitepaper'],
            ['label' => 'Tokenomics', 'route' => 'pages.tokenomics'],
            ['label' => 'Token Transparency', 'route' => 'pages.token-transparency'],
            ['label' => 'Presale', 'route' => 'pages.presale'],
            ['label' => 'News', 'route' => 'pages.news'],
            ['label' => 'FAQ', 'route' => 'pages.faq'],
        ],
        'Legal' => [
            ['label' => 'Privacy Policy', 'route' => 'pages.privacy'],
            ['label' => 'Cookie Policy', 'route' => 'pages.cookie'],
            ['label' => 'Terms of Service', 'route' => 'pages.terms'],
            ['label' => 'Disclaimer', 'route' => 'pages.disclaimer'],
            ['label' => 'KYC Policy', 'route' => 'pages.kyc'],
        ],
        'Community' => [
            ['label' => 'Community', 'route' => 'pages.community'],
            ['label' => 'Discord', 'route' => 'pages.discord'],
            ['label' => 'Twitter', 'route' => 'pages.twitter'],
            ['label' => 'Referral', 'route' => 'pages.referral'],
            ['label' => 'Ambassadors', 'route' => 'pages.ambassadors'],
            ['label' => 'Partners', 'route' => 'pages.partners'],
            ['label' => 'Investors', 'route' => 'pages.investors'],
        ],
    ];
@endphp
<div class="page-shell">
    <header class="site-header">
        <div class="container header-inner">
            <a href="{{ public_route('pages.homepage') }}" class="brand" aria-label="Homepage">
                <img style="width:80px;" src="{{ asset('blade/images/logo.png') }}" alt="logo"/>
            </a>

            <nav class="main-nav" aria-label="Main navigation">
                <a @class(['active' => request()->routeIs('pages.homepage')])  href="{{ public_route('pages.homepage') }}">
                    {{ trans('custom.top_menu.home') }}
                </a>
                <a @class(['active' => request()->routeIs('pages.about')]) href="{{ public_route('pages.about') }}">
                    {{ trans('custom.top_menu.about') }}
                </a>
                <a @class(['active' => request()->routeIs('pages.news') || request()->routeIs('pages.details')]) href="{{ public_route('pages.news') }}">
                    {{ trans('custom.top_menu.news') }}
                </a>
                <a @class(['active' => request()->routeIs('pages.marketplace.*')]) href="{{ public_route('pages.marketplace.players') }}">
                    {{ trans('custom.top_menu.marketplace') }}
                </a>
                <a @class(['active' => request()->routeIs('pages.token')]) href="{{ public_route('pages.token') }}">
                    {{ trans('custom.top_menu.buy_token', ['token_name' => $tokenName]) }}
                </a>
                <div @class(['main-nav-group', 'active' => request()->routeIs('pages.community') || request()->routeIs('pages.discord') || request()->routeIs('pages.twitter') || request()->routeIs('pages.referral') || request()->routeIs('pages.ambassadors') || request()->routeIs('pages.partners') || request()->routeIs('pages.investors')])>
                    <a href="{{ public_route('pages.community') }}">Community</a>
                    <div class="community-mega-menu" role="menu" aria-label="Community menu">
                        @foreach($communityMenuGroups as $groupTitle => $items)
                            <section>
                                <h3>{{ $groupTitle }}</h3>
                                @foreach($items as $item)
                                    <a href="{{ public_route($item['route'], query: $item['query'] ?? []) }}">{{ $item['label'] }}</a>
                                @endforeach
                            </section>
                        @endforeach
                    </div>
                </div>
                <a @class(['active' => request()->routeIs('pages.contact')]) href="{{ public_route('pages.contact') }}">
                    {{ trans('custom.top_menu.contact') }}
                </a>
            </nav>

            <div class="header-actions">
                <div class="language-switch">
                    <button
                        class="language-switch-toggle"
                        type="button"
                        aria-label="Language"
                        aria-haspopup="listbox"
                        aria-expanded="false"
                        data-language-switch-toggle
                    >
                        {{ $currentLanguage['native_name'] }}
                    </button>
                    <div class="language-switch-menu" role="listbox" hidden data-language-switch-menu>
                        @foreach($languages as $code => $info)
                            <button
                                class="language-switch-option"
                                type="button"
                                role="option"
                                data-language="{{ $code }}"
                                data-url="{{ $localizedSwitchUrls[$code] ?? public_route('pages.homepage', [], $code) }}"
                                @if($currentUiLocale === $code) aria-selected="true" @endif
                            >
                                {{ $info['native_name'] }}
                            </button>
                        @endforeach
                    </div>
                </div>
                <a class="btn btn-primary" href="{{ auth_app_url('login') }}" data-auth-guest-link>
                    {{ trans('custom.top_menu.login') }}
                </a>
                <a class="btn btn-outline" href="{{ auth_app_url('register') }}" data-auth-guest-link>
                    {{ trans('custom.top_menu.register') }}
                </a>
                <a class="btn btn-primary" href="{{ auth_app_url('dashboard') }}" data-auth-dashboard-link hidden>
                    {{ trans('custom.top_menu.dashboard') }}
                </a>
            </div>

            <button class="mobile-menu-toggle" aria-label="Open menu" id="menuToggle">☰</button>
        </div>

        <div class="mobile-nav" id="mobileNav">
            <a @class(['active' => request()->routeIs('pages.homepage')])  href="{{ public_route('pages.homepage') }}">
                {{ trans('custom.top_menu.home') }}
            </a>
            <a @class(['active' => request()->routeIs('pages.about')]) href="{{ public_route('pages.about') }}">
                {{ trans('custom.top_menu.about') }}
            </a>
            <a @class(['active' => request()->routeIs('pages.news') || request()->routeIs('pages.details')]) href="{{ public_route('pages.news') }}">
                {{ trans('custom.top_menu.news') }}
            </a>
            <a @class(['active' => request()->routeIs('pages.marketplace.*')]) href="{{ public_route('pages.marketplace.players') }}">
                {{ trans('custom.top_menu.marketplace') }}
            </a>
            <a @class(['active' => request()->routeIs('pages.token')]) href="{{ public_route('pages.token') }}">
                {{ trans('custom.top_menu.buy_token', ['token_name' => $tokenName]) }}
            </a>
            <a @class(['active' => request()->routeIs('pages.community') || request()->routeIs('pages.discord') || request()->routeIs('pages.twitter') || request()->routeIs('pages.referral') || request()->routeIs('pages.ambassadors') || request()->routeIs('pages.partners') || request()->routeIs('pages.investors')]) href="{{ public_route('pages.community') }}">
                Community
            </a>
            <div class="mobile-nav-section">
                @foreach($communityMenuGroups as $groupTitle => $items)
                    <strong>{{ $groupTitle }}</strong>
                    @foreach($items as $item)
                        <a href="{{ public_route($item['route'], query: $item['query'] ?? []) }}">{{ $item['label'] }}</a>
                    @endforeach
                @endforeach
            </div>
            <a @class(['active' => request()->routeIs('pages.contact')]) href="{{ public_route('pages.contact') }}">
                {{ trans('custom.top_menu.contact') }}
            </a>
            <a href="{{ auth_app_url('login') }}" data-auth-guest-link>{{ trans('custom.top_menu.login') }}</a>
            <a href="{{ auth_app_url('register') }}" data-auth-guest-link>{{ trans('custom.top_menu.register') }}</a>
            <a href="{{ auth_app_url('dashboard') }}" data-auth-dashboard-link hidden>{{ trans('custom.top_menu.dashboard') }}</a>
            <div class="mobile-language-switch language-switch">
                <button
                    class="language-switch-toggle"
                    type="button"
                    aria-label="Language"
                    aria-haspopup="listbox"
                    aria-expanded="false"
                    data-language-switch-toggle
                >
                    {{ $currentLanguage['native_name'] }}
                </button>
                <div class="language-switch-menu" role="listbox" hidden data-language-switch-menu>
                    @foreach($languages as $code => $info)
                        <button
                            class="language-switch-option"
                            type="button"
                            role="option"
                            data-language="{{ $code }}"
                            data-url="{{ $localizedSwitchUrls[$code] ?? public_route('pages.homepage', [], $code) }}"
                            @if($currentUiLocale === $code) aria-selected="true" @endif
                        >
                            {{ $info['native_name'] }}
                        </button>
                    @endforeach
                </div>
            </div>
        </div>
    </header>

    @yield('content')

    @include('v2.partials.footer')
</div>

<script src="{{ asset('v2/js/script.js') }}"></script>
@stack('scripts')
</body>
</html>
