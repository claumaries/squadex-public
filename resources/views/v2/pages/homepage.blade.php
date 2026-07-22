@extends('v2.layout.layout')
@section('content')
    @php
        $languages = config('locales');
        $currentUiLocale = localeCode();
        $currentLanguage = $languages[$currentUiLocale] ?? $languages['en'];
        $tokenName = config('app.token_name');
    @endphp
<section class="hero">
    <div class="hero-background"></div>
    <div class="hero-overlay"></div>
    <div class="hero-glow"></div>

    <div class="container hero-inner">
        <div class="hero-copy">
            <div class="eyebrow">
                {{ config('app.name') }}
            </div>
            <h1>
                {{ trans('custom.homepage_hero_title_line_1') }}
                <span>{{ trans('custom.homepage_hero_title_line_2') }}</span>
            </h1>
            <p>
                {{ trans('custom.football_manager_description') }}
            </p>
            <div class="hero-actions">
                <a href="{{ auth_app_url('register', referral: request()->query('r')) }}" class="btn btn-outline btn-lg">{{ trans('custom.register_now') }}</a>
            </div>
        </div>

        @php
            $latestResultSlides = collect($results ?? [])->take(5)->values();
            $clubInitials = static function (?string $clubName): string {
                $initials = collect(preg_split('/\s+/', trim((string) $clubName), -1, PREG_SPLIT_NO_EMPTY))
                    ->take(2)
                    ->map(fn (string $word): string => \Illuminate\Support\Str::upper(\Illuminate\Support\Str::substr($word, 0, 1)))
                    ->implode('');

                return $initials !== '' ? $initials : 'FC';
            };
        @endphp

        <aside class="live-match-card" id="liveMatchCard">
            <div class="card-head">
                <span class="league-name">{{ trans('custom.latest_results') }}</span>
            </div>

            @if($latestResultSlides->isNotEmpty())
                <div class="results-carousel" data-results-carousel>
                    <div class="results-carousel-viewport">
                        <div class="results-carousel-track">
                            @foreach($latestResultSlides as $result)
                                @php
                                    $homeClubName = (string) data_get($result, 'home_club.name', '');
                                    $awayClubName = (string) data_get($result, 'away_club.name', '');
                                    $stadiumName = (string) data_get($result, 'home_club.stadium.name', '');
                                @endphp
                                <a href="{{ public_route('page.match.details', match_route_parameters($result)) }}" class="scoreboard result-slide" data-results-slide>
                                    <div class="team team-left">
                                        <div class="crest crest-red">{{ $clubInitials($homeClubName) }}</div>
                                        <div class="team-name">{{ $homeClubName }}</div>
                                    </div>

                                    <div class="score-center">
                                        <div class="score">{{ data_get($result, 'home_goals') }} - {{ data_get($result, 'away_goals') }}</div>
                                        <div class="minute">{{ __('FT') }}</div>
                                    </div>

                                    <div class="team team-right">
                                        <div class="crest crest-blue">{{ $clubInitials($awayClubName) }}</div>
                                        <div class="team-name">{{ $awayClubName }}</div>
                                    </div>

                                    @if($stadiumName !== '')
                                        <div class="result-meta">{{ $stadiumName }}</div>
                                    @endif
                                </a>
                            @endforeach
                        </div>
                    </div>

                    @if($latestResultSlides->count() > 1)
                        <div class="results-carousel-controls">
                            <button class="results-carousel-button" type="button" data-results-prev aria-label="{{ __('Previous result') }}">‹</button>
                            <div class="results-carousel-dots" aria-label="{{ __('Result carousel navigation') }}">
                                @foreach($latestResultSlides as $result)
                                    <button
                                        class="results-carousel-dot {{ $loop->first ? 'active' : '' }}"
                                        type="button"
                                        data-results-dot="{{ $loop->index }}"
                                        aria-label="{{ __('Show result :number', ['number' => $loop->iteration]) }}"
                                    ></button>
                                @endforeach
                            </div>
                            <button class="results-carousel-button" type="button" data-results-next aria-label="{{ __('Next result') }}">›</button>
                        </div>
                    @endif
                </div>
            @else
                <div class="scoreboard scoreboard-empty">
                    <div class="score-center">
                        <div class="score">-</div>
                        <div class="minute">{{ trans('custom.latest_results') }}</div>
                    </div>
                </div>
            @endif
        </aside>
    </div>

    <section class="roadmap-section" id="roadmap">
        <div class="roadmap-frame">
            <div class="roadmap-border top"></div>

            <div class="container roadmap-stage">
                <svg class="roadmap-svg" viewBox="0 0 1800 470" preserveAspectRatio="none" aria-hidden="true">
                    <defs>
                        <filter id="greenGlow">
                            <feGaussianBlur stdDeviation="8" result="blur" />
                            <feMerge><feMergeNode in="blur" /><feMergeNode in="SourceGraphic" /></feMerge>
                        </filter>
                        <filter id="blueGlow">
                            <feGaussianBlur stdDeviation="8" result="blur" />
                            <feMerge><feMergeNode in="blur" /><feMergeNode in="SourceGraphic" /></feMerge>
                        </filter>
                        <filter id="redGlow">
                            <feGaussianBlur stdDeviation="8" result="blur" />
                            <feMerge><feMergeNode in="blur" /><feMergeNode in="SourceGraphic" /></feMerge>
                        </filter>
                    </defs>

                    <path class="road-base" d="M40 335 C150 180, 315 205, 420 318 S675 455, 785 260 S1040 110, 1165 295 S1420 445, 1535 280 S1690 165, 1760 230" />
                    <path class="road-glow road-green" d="M40 335 C150 180, 315 205, 420 318 S560 410, 650 355" />
                    <path class="road-glow road-cyan" d="M650 355 C710 315, 745 305, 785 260 S1040 110, 1165 295" />
                    <path class="road-glow road-red" d="M1165 295 C1260 410, 1420 445, 1535 280 S1690 165, 1760 230" />

                    <path class="road-dash road-green-dash" d="M40 335 C150 180, 315 205, 420 318 S560 410, 650 355" />
                    <path class="road-dash road-cyan-dash" d="M650 355 C710 315, 745 305, 785 260 S1040 110, 1165 295" />
                    <path class="road-dash road-red-dash" d="M1165 295 C1260 410, 1420 445, 1535 280 S1690 165, 1760 230" />
                </svg>

                <div class="road-particles" aria-hidden="true">
                    <span style="--x:4%; --y:76%; --d:.1s"></span>
                    <span style="--x:10%; --y:67%; --d:.7s"></span>
                    <span style="--x:18%; --y:72%; --d:1.3s"></span>
                    <span style="--x:25%; --y:78%; --d:2s"></span>
                    <span style="--x:36%; --y:79%; --d:.4s"></span>
                    <span style="--x:44%; --y:66%; --d:1.2s"></span>
                    <span style="--x:52%; --y:58%; --d:2.3s"></span>
                    <span style="--x:62%; --y:61%; --d:.9s"></span>
                    <span style="--x:71%; --y:73%; --d:1.6s"></span>
                    <span style="--x:82%; --y:70%; --d:.3s"></span>
                    <span style="--x:91%; --y:55%; --d:2.1s"></span>
                </div>

                <button class="road-node node-1 completed active" data-step="0" aria-label="{{ __('Ecosystem Launch') }}">
                    <span>1</span>
                </button>
                <button class="road-node node-2 completed" data-step="1" aria-label="{{ __('NFT Player Packs') }}">
                    <span>2</span>
                </button>
                <button class="road-node node-3 progress" data-step="2" aria-label="{{ __('PVP Tournaments') }}">
                    <span>3</span>
                </button>
                <button class="road-node node-4 pending" data-step="3" aria-label="{{ __('Governance DAO') }}">
                    <span>4</span>
                </button>
                <button class="road-node node-5 pending" data-step="4" aria-label="{{ __('Token Expansion') }}">
                    <span>5</span>
                </button>

                <article class="road-card card-1 completed active" data-card="0">
                    <h3>{{ __('Ecosystem Launch') }}</h3>
                    <span>{{ __('Completed') }}</span>
                    <p>{{ __('Core platform and token infrastructure deployed. Welcome to the future of football.') }}</p>
                </article>

                <article class="road-card card-2 completed" data-card="1">
                    <h3>{{ __('NFT Player Packs') }}</h3>
                    <span>{{ __('Completed') }}</span>
                    <p>{{ __('Player cards live and ownership mechanics powered by the next stage of club building.') }}</p>
                </article>

                <article class="road-card card-3 progress" data-card="2">
                    <h3>{{ __('PVP Tournaments') }}</h3>
                    <span>{{ __('In Progress') }}</span>
                    <p>{{ __('Competitive manager-vs-manager tournaments with performance-based rewards.') }}</p>
                </article>

                <article class="road-card card-4 pending" data-card="3">
                    <h3>{{ __('Governance DAO') }}</h3>
                    <span>{{ __('Coming Soon') }}</span>
                    <p>{{ __('Community voting for platform decisions. Decentralised and ecosystem expansion.') }}</p>
                </article>

                <article class="road-card card-5 pending" data-card="4">
                    <h3>{{ __('Token Expansion') }}</h3>
                    <span>{{ __('Coming Soon') }}</span>
                    <p>{{ __('More leagues, more clubs, global competitions, blockchain and broader Web3 integrations.') }}</p>
                </article>
            </div>


        </div>
    </section>

    <section class="dashboard-live-section" id="dashboard-live">
        <div class="container dashboard-live-grid">
            <section class="dashboard-panel league-standings-panel neon-panel">
                <header class="showcase-panel-header">
                    <span class="showcase-kicker">{{ trans('custom.league_table_schedule') }}</span>
                    <div class="showcase-heading-row">
                        <div>

                            <p>
                                {{ \Illuminate\Support\Arr::get($table ?? [], 'name') }}
                                {{ \Illuminate\Support\Arr::get($table ?? [], 'league.name') }}
                                ({{ \Illuminate\Support\Arr::get($table ?? [], 'country_name') }})
                            </p>
                        </div>

                    </div>
                </header>

                <div class="standings-board">
                    @php
                        $homepageCountries = collect($countries ?? []);
                        $homepageLeagues = collect($leagues ?? []);
                        $homepageCountryId = $countryId ?? null;
                        $homepageLeagueId = $leagueId ?? 0;
                        $selectedCountryName = data_get(
                            $homepageCountries->first(fn ($country): bool => (int) data_get($country, 'id') === (int) $homepageCountryId),
                            'name',
                            trans('admin.country')
                        );
                        $selectedLeagueName = (int) $homepageLeagueId === 0
                            ? __('All leagues')
                            : data_get(
                                $homepageLeagues->first(fn ($league): bool => (int) data_get($league, 'id') === (int) $homepageLeagueId),
                                'name',
                                __('All leagues')
                            );
                    @endphp
                    <form class="standings-filter" method="GET" action="{{ public_route('pages.homepage') }}#dashboard-live">
                        <input type="hidden" name="c" id="countrySelect" value="{{ $homepageCountryId }}">
                        <input type="hidden" name="l" id="leagueSelect" value="{{ $homepageLeagueId }}">

                        <div class="standings-filter-field">
                            <span>{{ trans('admin.country') }}</span>
                            <div class="standings-select">
                                <button
                                    class="standings-select-toggle"
                                    type="button"
                                    aria-haspopup="listbox"
                                    aria-expanded="false"
                                    data-standings-select-toggle
                                >
                                    {{ $selectedCountryName }}
                                </button>
                                <div class="standings-select-menu" role="listbox" hidden data-standings-select-menu>
                                    @foreach($homepageCountries as $country)
                                        <button
                                            class="standings-select-option"
                                            type="button"
                                            role="option"
                                            data-standings-select-option
                                            data-target="c"
                                            data-value="{{ \Illuminate\Support\Arr::get($country, 'id') }}"
                                            data-reset-league="true"
                                            @if(\Illuminate\Support\Arr::get($country, 'id') == $homepageCountryId) aria-selected="true" @endif
                                        >
                                            {{ \Illuminate\Support\Arr::get($country, 'name') }}
                                        </button>
                                    @endforeach
                                </div>
                            </div>
                        </div>

                        <div class="standings-filter-field">
                            <span>{{ trans('custom.league') }}</span>
                            <div class="standings-select">
                                <button
                                    class="standings-select-toggle"
                                    type="button"
                                    aria-haspopup="listbox"
                                    aria-expanded="false"
                                    data-standings-select-toggle
                                >
                                    {{ $selectedLeagueName }}
                                </button>
                                <div class="standings-select-menu" role="listbox" hidden data-standings-select-menu>
                                    <button
                                        class="standings-select-option"
                                        type="button"
                                        role="option"
                                        data-standings-select-option
                                        data-target="l"
                                        data-value="0"
                                        @if((int) $homepageLeagueId === 0) aria-selected="true" @endif
                                    >
                                        {{ __('All leagues') }}
                                    </button>
                                    @foreach($homepageLeagues as $league)
                                        <button
                                            class="standings-select-option"
                                            type="button"
                                            role="option"
                                            data-standings-select-option
                                            data-target="l"
                                            data-value="{{ \Illuminate\Support\Arr::get($league, 'id') }}"
                                            @if(\Illuminate\Support\Arr::get($league, 'id') == $homepageLeagueId) aria-selected="true" @endif
                                        >
                                            {{ \Illuminate\Support\Arr::get($league, 'name') }}
                                        </button>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    </form>

                    <div class="standings-table-wrap">
                        <table class="v2-standings-table">
                            <thead>
                            <tr>
                                <th>#</th>
                                <th>{{ trans('custom.club') }}</th>
                                <th>{{ trans('custom.mp') }}</th>
                                <th>{{ trans('custom.w') }}</th>
                                <th>{{ trans('custom.d') }}</th>
                                <th>{{ trans('custom.l') }}</th>
                                <th>{{ trans('custom.pts') }}</th>
                            </tr>
                            </thead>
                            <tbody>
                            @php
                                $homepageStandingRows = collect(\Illuminate\Support\Arr::get($table ?? [], 'standing', []));
                                $homepageContinentalQualificationCount = min(5, max($homepageStandingRows->count() - 5, 0));
                                $homepageRelegationStartIndex = max($homepageStandingRows->count() - 5, 0);
                            @endphp
                            @forelse($homepageStandingRows as $index => $standing)
                                <tr @class([
                                    'v2-standing-row-continental' => $index < $homepageContinentalQualificationCount,
                                    'v2-standing-row-relegation' => $homepageStandingRows->count() > 5 && $index >= $homepageRelegationStartIndex,
                                ])>
                                    <td>{{ $index + 1 }}</td>
                                    <td>
                                        <a
                                            class="standings-club-link"
                                            title="{{ \Illuminate\Support\Arr::get($standing, 'club') }}"
                                            href="{{ \Illuminate\Support\Arr::get($standing, 'detailsHomepage') }}"
                                        >
                                            {{ \Illuminate\Support\Arr::get($standing, 'club') }}
                                        </a>
                                    </td>
                                    <td>{{ \Illuminate\Support\Arr::get($standing, 'MP') }}</td>
                                    <td>{{ \Illuminate\Support\Arr::get($standing, 'W') }}</td>
                                    <td>{{ \Illuminate\Support\Arr::get($standing, 'D') }}</td>
                                    <td>{{ \Illuminate\Support\Arr::get($standing, 'L') }}</td>
                                    <td>{{ \Illuminate\Support\Arr::get($standing, 'PTS') }}</td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="7" class="standings-empty">{{ __('No standings available') }}</td>
                                </tr>
                            @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
            </section>

            <section class="live-command-panel neon-panel">
                <header class="live-command-header showcase-panel-header">
                    <span class="showcase-kicker">{{ __('Fixtures') }}</span>
                    <div class="showcase-heading-row">
                        <div>
                            <p>{{ __('Upcoming fixtures for the selected country and league.') }}</p>
                        </div>
                    </div>
                </header>

                <div class="fixture-command-list">
                    @forelse(\Illuminate\Support\Arr::get($table ?? [], 'fixtures', []) as $matches)
                        @php
                            $matchDateParts = app(\App\Support\DateDisplayFormatter::class)
                                ->publicMatchDateParts(\Illuminate\Support\Arr::get($matches, 'match_start'));
                            $homeClubName = (string) \Illuminate\Support\Arr::get($matches, 'home_club.name', '');
                            $awayClubName = (string) \Illuminate\Support\Arr::get($matches, 'away_club.name', '');
                            $fixtureMatchId = \Illuminate\Support\Arr::get($matches, 'id');
                        @endphp
                        <article class="fixture-command-row">
                            <div class="fixture-command-date">
                                <strong>{{ \Illuminate\Support\Arr::get($matchDateParts, 'date') ?: '-' }}</strong>
                                <span>{{ \Illuminate\Support\Arr::get($matchDateParts, 'time') ?: '-' }}</span>
                            </div>

                            <div class="fixture-command-teams">
                                <a
                                    class="fixture-command-team"
                                    title="{{ $homeClubName }}"
                                    href="{{ public_route('page.club.details', club_route_parameters([...(\Illuminate\Support\Arr::get($matches, 'home_club') ?? []), 'countryName' => \Illuminate\Support\Arr::get($table ?? [], 'country_name')])) }}"
                                >
                                    {{ $homeClubName }}
                                </a>
                                <span>{{ __('vs') }}</span>
                                <a
                                    class="fixture-command-team"
                                    title="{{ $awayClubName }}"
                                    href="{{ public_route('page.club.details', club_route_parameters([...(\Illuminate\Support\Arr::get($matches, 'away_club') ?? []), 'countryName' => \Illuminate\Support\Arr::get($table ?? [], 'country_name')])) }}"
                                >
                                    {{ $awayClubName }}
                                </a>
                            </div>

                            @if($fixtureMatchId)
                                <a
                                    class="fixture-command-details"
                                    href="{{ public_route('page.match.details', match_route_parameters([...$matches, 'competitionName' => \Illuminate\Support\Arr::get($table ?? [], 'league.name')])) }}"
                                    aria-label="{{ __('View match details for :home vs :away', ['home' => $homeClubName, 'away' => $awayClubName]) }}"
                                >
                                    {{ __('Details') }}
                                </a>
                            @endif
                        </article>
                    @empty
                        <div class="fixture-command-empty">{{ __('No fixtures available') }}</div>
                    @endforelse
                </div>
            </section>
        </div>
    </section>

    <section class="token-section" id="token-section">
        <div class="container token-grid">
            <section class="token-left-panel token-panel-shell">
                <header class="token-panel-header">
                    <span class="showcase-kicker">{{ __(':token Token Utility', ['token' => $tokenName]) }}</span>
                </header>

                <div class="token-left-body">
                    <div class="token-benefits-grid">
                        <article class="benefit-card green-card">
                            <div class="benefit-icon">🏠</div>
                            <h3>{{ __('Club Ownership') }}</h3>
                            <p>{{ __('Own football clubs and connect token utility directly to long-term club growth.') }}</p>
                        </article>

                        <article class="benefit-card yellow-card">
                            <div class="benefit-icon">🏆</div>
                            <h3>{{ __('Tournament Rewards') }}</h3>
                            <p>{{ __('Use :token as the reward layer for competitive results, seasonal events and manager performance.', ['token' => $tokenName]) }}</p>
                        </article>

                        <article class="benefit-card lime-card">
                            <div class="benefit-icon">🛍</div>
                            <h3>{{ __('Marketplace Utility') }}</h3>
                            <p>{{ __('Spend :token on player assets, club upgrades, packs and ecosystem marketplace items.', ['token' => $tokenName]) }}</p>
                        </article>

                        <article class="benefit-card orange-card">
                            <div class="benefit-icon">🗳</div>
                            <h3>{{ __('Governance Access') }}</h3>
                            <p>{{ __('Participate in ecosystem decisions and help shape future platform features.') }}</p>
                        </article>

                        <article class="benefit-card green-card">
                            <div class="benefit-icon">⚡</div>
                            <h3>{{ __('Instant Game Actions') }}</h3>
                            <p>{{ __('Power fast in-game transactions for upgrades, entries and manager decisions.') }}</p>
                        </article>

                        <article class="benefit-card yellow-card">
                            <div class="benefit-icon">🔒</div>
                            <h3>{{ __('On-Chain Settlement') }}</h3>
                            <p>{{ __('Keep token movements transparent, verifiable and aligned with the platform economy.') }}</p>
                        </article>
                    </div>
                </div>
            </section>


            <section class="token-right-panel token-panel-shell">
                <header class="token-panel-header">
                    <span class="showcase-kicker">{{ __(':token Token Economy', ['token' => $tokenName]) }}</span>
                </header>

                <div class="token-right-body">
                    <article class="fm11-main-card token-economy-card">
                        <div class="fm11-card-top">
                            <x-token-logo class="fm11-logo" :size="74" />
                            <div>
                                <h3>{{ __(':token Token', ['token' => $tokenName]) }}</h3>
                                <span>{{ __('BEP-20 ecosystem asset') }}</span>
                            </div>
                        </div>

                        <div class="token-card-copy">
                            <p>
                                {{ trans('custom.purchase_nft_text_1', ['token_name' => $tokenName]) }}
                            </p>
                            <p>
                                {{ trans('custom.purchase_nft_text_2', ['token_name' => $tokenName]) }}
                            </p>
                        </div>

                        <div class="token-proof-grid">
                            <div class="token-proof-item">
                                <span>{{ __('Total Supply') }}</span>
                                <strong class="token-stat" data-target="1000000000" data-token-name="{{ $tokenName }}">1,000,000,000 {{ $tokenName }}</strong>
                            </div>
                            <div class="token-proof-item">
                                <span>{{ __('Network') }}</span>
                                <strong>{{ __('BNB Smart Chain') }}</strong>
                            </div>
                            <div class="token-proof-item">
                                <span>{{ __('Standard') }}</span>
                                <strong>{{ __('BEP-20') }}</strong>
                            </div>
                            <div class="token-proof-item">
                                <span>{{ __('Contract') }}</span>
                                <strong class="verified-text">{{ __('Verified') }}</strong>
                            </div>
                        </div>

                        <div class="token-card-actions">
                            <a class="buy-token-btn" href="{{ public_route('pages.token') }}">Buy {{ __(':token Token', ['token' => $tokenName]) }}</a>
                        </div>
                    </article>
                </div>
            </section>
        </div>
    </section>

    <section class="news-section standalone-news-section homepage-news-real" id="latest-news">
        <div class="container news-shell">
            <header class="news-header">
                <h2>{{ trans('custom.news') }}</h2>
                <a href="{{ public_route('pages.news') }}" class="news-view-link" id="newsViewAll">
                    {{ trans('custom.view_all') }} <span>›</span>
                </a>
            </header>

            <div class="news-layout">
                <div class="news-featured-list">
                    @forelse(array_slice($news ?? [], 0, 1) as $item)
                        @php
                            $newsTitle = \Illuminate\Support\Arr::get($item, 'title');
                            $newsImage = \Illuminate\Support\Arr::get($item, 'image');
                            $featuredDescription = trim(strip_tags((string) \Illuminate\Support\Arr::get($item, 'description', '')));
                            $featuredExcerpt = $featuredDescription !== ''
                                ? \Illuminate\Support\Str::limit($featuredDescription, 520)
                                : \Illuminate\Support\Arr::get($item, 'short_description');
                        @endphp
                        <a href="{{ \Illuminate\Support\Arr::get($item, 'detailsUrl') }}" class="news-featured-card news-card" data-news-title="{{ $newsTitle }}">
                            <figure class="news-featured-image">
                                <img src="{{ $newsImage }}" alt="{{ $newsTitle }}" loading="lazy">
                            </figure>

                            <div class="news-featured-content">
                                <h3>{{ $newsTitle }}</h3>

                                <div class="news-meta">
                                    <span>{{ \Illuminate\Support\Arr::get($item, 'diffForHumans') }}</span>
                                </div>

                                <p>{{ $featuredExcerpt }}</p>

                                <span class="news-read-more">{{ trans('custom.read_more') }}</span>
                            </div>
                        </a>
                    @empty
                        <div class="news-empty">{{ __('No news available') }}</div>
                    @endforelse
                </div>

                <div class="news-side-list">
                    @foreach(array_slice($news ?? [], 1, 6) as $item)
                        @php
                            $newsTitle = \Illuminate\Support\Arr::get($item, 'title');
                            $newsImage = \Illuminate\Support\Arr::get($item, 'image');
                        @endphp
                        <a href="{{ \Illuminate\Support\Arr::get($item, 'detailsUrl') }}" class="news-side-card news-card" data-news-title="{{ $newsTitle }}">
                            <figure class="news-thumb">
                                <img src="{{ $newsImage }}" alt="{{ $newsTitle }}" loading="lazy">
                            </figure>

                            <div class="news-side-content">
                                <h3>{{ $newsTitle }}</h3>

                                <div class="news-meta">
                                    <span>{{ \Illuminate\Support\Arr::get($item, 'diffForHumans') }}</span>
                                </div>

                                <p>{{ \Illuminate\Support\Arr::get($item, 'short_description') }}</p>
                            </div>
                        </a>
                    @endforeach
                </div>
            </div>
        </div>
    </section>
</section>
@stop
