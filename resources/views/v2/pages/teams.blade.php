@extends('v2.layout.layout')

@section('content')
    @php
        $filters = array_merge([
            'q' => null,
            'country' => null,
            'league' => null,
            'sort' => 'name',
            'direction' => 'asc',
            'per_page' => 20,
        ], $filters ?? []);

        $overviewCards = [ __('Club Profiles'), __('Squad Identity'), __('Manager Decisions'), __('Team Form'), __('Competition History'), __('Market Activity')];
        $profileFields = [ __('Team name'), __('Country'), __('Home stadium'), __('Manager profile'), __('Squad rating'), __('Current form'), __('League position'), __('Recent results')];
        $browseFilters = [ __('Competition'), __('Country'), __('Status'), __('Squad Rating'), __('Season')];
        $performanceCards = [ __('Squad Strength'), __('Tactical Balance'), __('Player Fitness'), __('Recent Form'), __('Market Value'), __('Match History')];
        $plannedFeatures = [ __('Public team profiles'), __('Squad comparison tools'), __('Team form charts'), __('Transfer activity summaries'), __('AI tactical identity'), __('Competition records'), __('Historical results'), __('Manager reputation')];

        $faqItems = [
            ['question' => __('What is the Squadex Teams page?'), 'answer' => __('It is the planned public team directory for Squadex clubs, squads, manager profiles and future team performance information.')],
            ['question' => __('Are the listed teams live data?'), 'answer' => __('Yes. The table uses Squadex club records and can be filtered, sorted and paginated.')],
            ['question' => __('Will team pages include more squad data?'), 'answer' => __('The page is designed so future team profiles can connect to deeper squad, match, tournament and marketplace data.')],
            ['question' => __('Can users compare teams?'), 'answer' => __('Team comparison is a planned concept and may evolve as the Squadex football manager ecosystem develops.')],
            ['question' => __('Do teams affect match simulations?'), 'answer' => __('Squadex is designed around football manager-style simulation where squad quality, tactics, form and player performance can influence match outcomes.')],
        ];

        $sortLink = function (string $field) use ($filters): string {
            $nextDirection = $filters['sort'] === $field && $filters['direction'] === 'asc' ? 'desc' : 'asc';

            return public_route('pages.teams', [], null, array_filter([
                'q' => $filters['q'],
                'country' => $filters['country'],
                'league' => $filters['league'],
                'per_page' => $filters['per_page'],
                'sort' => $field,
                'direction' => $nextDirection,
            ], static fn ($value) => $value !== null && $value !== ''));
        };

        $sortLabel = fn (string $field): string => $filters['sort'] === $field ? strtoupper($filters['direction']) : __('Sort');
    @endphp

    <main class="teams-page">
        <section class="matches-body">
            <div class="container tokenomics-stack">
                <section class="token-roadmap-intro matches-intro" aria-labelledby="teams-title">
                    <span class="tokenomics-kicker">{{ __('Team Directory') }}</span>
                    <h1 id="teams-title">{{ __('Squadex Teams') }}</h1>
                    <p class="matches-lead">
                        {{ __('Browse team profiles, squad concepts and football manager updates from the Squadex ecosystem.') }}
                    </p>
                    <p>
                        {{ __('The Squadex Teams page is designed to become the public hub for clubs, squads, team identity, form indicators, competition history and future AI football simulation insights.') }}
                    </p>
                    <nav class="token-roadmap-intro-actions" aria-label="{{ __('Teams quick links') }}">
                        <a href="{{ public_route('pages.matches') }}">{{ __('View Matches') }}</a>
                        <a href="{{ public_route('pages.leaderboards') }}">{{ __('View Leaderboards') }}</a>
                    </nav>
                </section>

                <section class="tokenomics-panel" aria-labelledby="teams-overview">
                    <span class="tokenomics-kicker">{{ __('Overview') }}</span>
                    <h2 id="teams-overview">{{ __('Team Centre') }}</h2>
                    <p>
                        {{ __('Team Centre will bring together public club information from across Squadex. As the platform develops, this page can support team profiles, squad snapshots, recent form, competition records and manager-driven club progress.') }}
                    </p>
                    <div class="token-roadmap-principles matches-feature-grid">
                        @foreach ($overviewCards as $card)
                            <article>
                                <h3>{{ $card }}</h3>
                            </article>
                        @endforeach
                    </div>
                </section>

                <section class="tokenomics-panel" aria-labelledby="teams-table">
                    <span class="tokenomics-kicker">{{ __('Teams') }}</span>
                    <div class="teams-table-head">
                        <div>
                            <h2 id="teams-table">{{ __('Club Directory') }}</h2>
                            <p>{{ __('Browse live Squadex clubs by name, country, league, squad size and squad market value.') }}</p>
                        </div>
                        <strong>{{ $clubs->total() }} {{ __('clubs') }}</strong>
                    </div>

                    <form class="teams-filter-form" method="GET" action="{{ public_route('pages.teams') }}">
                        <label>
                            <span>{{ __('Search') }}</span>
                            <input type="search" name="q" value="{{ $filters['q'] }}" placeholder="{{ __('Club, country or league') }}">
                        </label>
                        <label>
                            <span>{{ __('Country') }}</span>
                            <select name="country">
                                <option value="">{{ __('All countries') }}</option>
                                @foreach ($countries as $country)
                                    <option value="{{ data_get($country, 'id') }}" @selected((string) $filters['country'] === (string) data_get($country, 'id'))>{{ data_get($country, 'name') }}</option>
                                @endforeach
                            </select>
                        </label>
                        <label>
                            <span>{{ __('League') }}</span>
                            <select name="league">
                                <option value="">{{ __('All leagues') }}</option>
                                @foreach ($leagues as $league)
                                    <option value="{{ data_get($league, 'id') }}" @selected((string) $filters['league'] === (string) data_get($league, 'id'))>{{ data_get($league, 'name') }}</option>
                                @endforeach
                            </select>
                        </label>
                        <label>
                            <span>{{ __('Per page') }}</span>
                            <select name="per_page">
                                <option value="20" @selected($filters['per_page'] === 20)>20</option>
                                <option value="50" @selected($filters['per_page'] === 50)>50</option>
                            </select>
                        </label>
                        <input type="hidden" name="sort" value="{{ $filters['sort'] }}">
                        <input type="hidden" name="direction" value="{{ $filters['direction'] }}">
                        <div class="teams-filter-actions">
                            <button type="submit">{{ __('Apply Filters') }}</button>
                            <a href="{{ public_route('pages.teams') }}">{{ __('Reset') }}</a>
                        </div>
                    </form>

                    <div class="market-table-shell teams-table-shell">
                        <table class="market-table teams-table">
                            <thead>
                                <tr>
                                    <th><a href="{{ $sortLink('name') }}">{{ __('Club') }}<span>{{ $sortLabel('name') }}</span></a></th>
                                    <th><a href="{{ $sortLink('country') }}">{{ __('Country') }}<span>{{ $sortLabel('country') }}</span></a></th>
                                    <th><a href="{{ $sortLink('league') }}">{{ __('League') }}<span>{{ $sortLabel('league') }}</span></a></th>
                                    <th>{{ __('Manager') }}</th>
                                    <th><a href="{{ $sortLink('players') }}">{{ __('Players') }}<span>{{ $sortLabel('players') }}</span></a></th>
                                    <th><a href="{{ $sortLink('squad_value') }}">{{ __('Squad Value') }}<span>{{ $sortLabel('squad_value') }}</span></a></th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($clubs as $club)
                                    <tr>
                                        <td>
                                            <a class="teams-identity" href="{{ public_route('page.club.details', $club['routeParameters']) }}">
                                                <span aria-hidden="true">{{ substr($club['name'], 0, 1) }}</span>
                                                <strong>{{ $club['name'] }}</strong>
                                            </a>
                                        </td>
                                        <td>{{ $club['city'] }}, {{ $club['country'] }}</td>
                                        <td>{{ $club['league'] }}</td>
                                        <td>{{ $club['manager'] }}</td>
                                        <td>{{ $club['players'] }}</td>
                                        <td><strong>{{ $club['squadValue'] }}</strong></td>
                                        <td>
                                            <a class="market-buy-btn compact" href="{{ public_route('page.club.details', $club['routeParameters']) }}">{{ __('View Team') }}<span>&#8599;</span></a>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="7">
                                            <div class="market-empty">{{ __('No clubs match the selected filters.') }}</div>
                                        </td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>

                    @include('v2.partials.marketplace-pagination', [
                        'results' => $clubs->toArray(),
                        'paginationLabel' => __('Teams pagination'),
                    ])
                </section>

                <section class="tokenomics-panel" aria-labelledby="team-profiles">
                    <span class="tokenomics-kicker">{{ __('Profiles') }}</span>
                    <h2 id="team-profiles">{{ __('Team Profiles') }}</h2>
                    <p>
                        {{ __('Future Squadex team profiles can include club identity, squad details, current form, competition participation, match history and marketplace activity.') }}
                    </p>
                    <ul class="tokenomics-check-list matches-planned-list">
                        @foreach ($profileFields as $field)
                            <li>{{ $field }}</li>
                        @endforeach
                    </ul>
                </section>

                <section class="tokenomics-panel" aria-labelledby="browse-teams">
                    <span class="tokenomics-kicker">{{ __('Browse') }}</span>
                    <h2 id="browse-teams">{{ __('Browse Teams') }}</h2>
                    <div class="matches-filter-grid" aria-label="{{ __('Future team filters') }}">
                        @foreach ($browseFilters as $filter)
                            <label>
                                <span>{{ $filter }}</span>
                                <input type="text" value="{{ __('Coming soon') }}" disabled>
                            </label>
                        @endforeach
                    </div>
                </section>

                <section class="tokenomics-panel" aria-labelledby="team-performance">
                    <span class="tokenomics-kicker">{{ __('Simulation') }}</span>
                    <h2 id="team-performance">{{ __('Team Performance Signals') }}</h2>
                    <p>
                        {{ __('Squadex teams are designed to work within football manager-style simulations, where squad composition, tactical setup, player fitness and match history can help shape future fixtures.') }}
                    </p>
                    <div class="token-roadmap-principles matches-feature-grid">
                        @foreach ($performanceCards as $card)
                            <article>
                                <h3>{{ $card }}</h3>
                            </article>
                        @endforeach
                    </div>
                </section>

                <section class="tokenomics-panel" aria-labelledby="planned-team-features">
                    <span class="tokenomics-kicker">{{ __('Planned') }}</span>
                    <h2 id="planned-team-features">{{ __('Planned Team Features') }}</h2>
                    <p>{{ __('These features are planned concepts and may evolve as the Squadex platform develops.') }}</p>
                    <ul class="tokenomics-check-list matches-planned-list">
                        @foreach ($plannedFeatures as $feature)
                            <li>{{ $feature }}</li>
                        @endforeach
                    </ul>
                </section>

                <section class="tokenomics-panel" aria-labelledby="teams-faq">
                    <span class="tokenomics-kicker">{{ __('FAQ') }}</span>
                    <h2 id="teams-faq">{{ __('Teams FAQ') }}</h2>
                    <div class="faq-list">
                        @foreach ($faqItems as $item)
                            <details class="faq-item">
                                <summary>
                                    <span>{{ $item['question'] }}</span>
                                </summary>
                                <p>{{ $item['answer'] }}</p>
                            </details>
                        @endforeach
                    </div>
                </section>

                <section class="tokenomics-cta" aria-labelledby="teams-cta">
                    <span class="tokenomics-kicker">{{ __('Clubs') }}</span>
                    <h2 id="teams-cta">{{ __('Follow Squadex team development') }}</h2>
                    <p>{{ __('Explore matches, leaderboards and future team profiles as the Squadex football ecosystem develops.') }}</p>
                    <nav aria-label="{{ __('Teams next steps') }}">
                        <a href="{{ public_route('pages.matches') }}">{{ __('View Matches') }}</a>
                        <a href="{{ public_route('pages.leaderboards') }}">{{ __('View Leaderboards') }}</a>
                        <a href="{{ public_route('pages.game') }}">{{ __('Read Game Overview') }}</a>
                    </nav>
                </section>
            </div>
        </section>
    </main>
@stop
