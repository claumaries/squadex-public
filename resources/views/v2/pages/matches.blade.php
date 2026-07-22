@extends('v2.layout.layout')

@section('content')
    @php
        $statusTabs = [
            ['value' => 'upcoming', 'label' => __('Upcoming Matches')],
            ['value' => 'live', 'label' => trans('admin.live')],
            ['value' => 'results', 'label' => __('Recent Results')],
            ['value' => 'all', 'label' => __('All Matches')],
        ];
        $activeStatusLabel = collect($statusTabs)->firstWhere('value', $filters['status'])['label'] ?? __('All Matches');
    @endphp

    <main class="matches-page matches-centre-page">
        <section class="matches-centre-hero">
            <div class="container">
                <div class="matches-centre-heading">
                    <div>
                        <span class="matches-centre-kicker">{{ __('Match Centre') }}</span>
                        <h1>{{ __('Squadex Matches') }}</h1>
                        <p>{{ __('Follow upcoming fixtures, match results and football simulation updates from the Squadex ecosystem.') }}</p>
                    </div>

                    <nav class="matches-centre-links" aria-label="{{ __('Matches quick links') }}">
                        <a href="{{ public_route('pages.tournaments') }}">{{ __('View Tournaments') }}</a>
                        <a href="{{ public_route('pages.leaderboards') }}">{{ __('View Leaderboards') }}</a>
                    </nav>
                </div>

                <dl class="matches-summary-strip">
                    <div>
                        <dt>{{ trans('admin.live') }}</dt>
                        <dd>{{ $summary['live'] }}</dd>
                    </div>
                    <div>
                        <dt>{{ __('Upcoming') }}</dt>
                        <dd>{{ $summary['upcoming'] }}</dd>
                    </div>
                    <div>
                        <dt>{{ __('Completed') }}</dt>
                        <dd>{{ $summary['completed'] }}</dd>
                    </div>
                </dl>
            </div>
        </section>

        <section class="matches-browser-section">
            <div class="container">
                <nav class="matches-status-tabs" aria-label="{{ __('Status') }}">
                    @foreach($statusTabs as $statusTab)
                        @php
                            $statusQuery = array_filter([
                                ...$filters,
                                'status' => $statusTab['value'],
                            ], static fn (mixed $value): bool => $value !== null && $value !== '');
                        @endphp
                        <a
                            href="{{ public_route('pages.matches', [], null, $statusQuery) }}"
                            @class(['is-active' => $filters['status'] === $statusTab['value']])
                            @if($filters['status'] === $statusTab['value']) aria-current="page" @endif
                        >
                            {{ $statusTab['label'] }}
                        </a>
                    @endforeach
                </nav>

                <form class="matches-browser-filters" method="GET" action="{{ public_route('pages.matches') }}">
                    <input type="hidden" name="status" value="{{ $filters['status'] }}">

                    <label>
                        <span>{{ __('Competition') }}</span>
                        <select name="competition">
                            <option value="">{{ __('Competition') }}</option>
                            @foreach($competitionOptions as $competitionOption)
                                <option value="{{ $competitionOption['value'] }}" @selected($filters['competition'] === $competitionOption['value'])>
                                    {{ $competitionOption['label'] }}
                                </option>
                            @endforeach
                        </select>
                    </label>

                    <label>
                        <span>{{ __('Team') }}</span>
                        <input type="search" name="team" value="{{ $filters['team'] }}" placeholder="{{ __('Search') }}" maxlength="80">
                    </label>

                    <label>
                        <span>{{ __('Date') }}</span>
                        <input type="date" name="date" value="{{ $filters['date'] }}">
                    </label>

                    <label>
                        <span>{{ __('Season') }}</span>
                        <input type="number" name="season" value="{{ $filters['season'] }}" min="2000" max="{{ now()->year + 5 }}" inputmode="numeric">
                    </label>

                    <label>
                        <span>{{ __('Per page') }}</span>
                        <select name="per_page">
                            @foreach($perPageOptions as $perPageOption)
                                <option value="{{ $perPageOption }}" @selected($filters['per_page'] === $perPageOption)>{{ $perPageOption }}</option>
                            @endforeach
                        </select>
                    </label>

                    <div class="matches-browser-filter-actions">
                        <button type="submit">{{ __('Apply Filters') }}</button>
                        <a href="{{ public_route('pages.matches') }}" aria-label="{{ __('All Matches') }}" title="{{ __('All Matches') }}">&times;</a>
                    </div>
                </form>

                <header class="matches-results-heading">
                    <div>
                        <span>{{ __('Match Centre') }}</span>
                        <h2>{{ $activeStatusLabel }}</h2>
                    </div>
                    <p>
                        @if($matches->firstItem() !== null)
                            {{ $matches->firstItem() }}-{{ $matches->lastItem() }} /
                        @endif
                        <strong>{{ $totalMatches }}</strong> {{ __('Matches') }}
                    </p>
                </header>

                <div class="matches-browser-list">
                    @forelse($matches as $match)
                        <article class="matches-browser-row">
                            <div class="matches-browser-meta">
                                <strong>{{ $match['competition'] }}</strong>
                                <span>{{ $match['date'] }}</span>
                                @if($match['time'])
                                    <time>{{ $match['time'] }}</time>
                                @endif
                            </div>

                            <div class="matches-browser-fixture">
                                @if($match['home']['url'])
                                    <a class="matches-browser-team is-home" href="{{ $match['home']['url'] }}">
                                        <span>{{ $match['home']['name'] }}</span>
                                        <img src="{{ $match['home']['logoUrl'] }}" alt="" width="44" height="44" loading="lazy">
                                    </a>
                                @else
                                    <span class="matches-browser-team is-home">
                                        <span>{{ $match['home']['name'] }}</span>
                                        <img src="{{ $match['home']['logoUrl'] }}" alt="" width="44" height="44" loading="lazy">
                                    </span>
                                @endif

                                <div class="matches-browser-score">
                                    <strong>{{ $match['score'] }}</strong>
                                    <span class="{{ $match['statusClass'] }}">{{ $match['status'] }}</span>
                                </div>

                                @if($match['away']['url'])
                                    <a class="matches-browser-team is-away" href="{{ $match['away']['url'] }}">
                                        <img src="{{ $match['away']['logoUrl'] }}" alt="" width="44" height="44" loading="lazy">
                                        <span>{{ $match['away']['name'] }}</span>
                                    </a>
                                @else
                                    <span class="matches-browser-team is-away">
                                        <img src="{{ $match['away']['logoUrl'] }}" alt="" width="44" height="44" loading="lazy">
                                        <span>{{ $match['away']['name'] }}</span>
                                    </span>
                                @endif
                            </div>

                            <a class="matches-browser-action" href="{{ $match['detailsUrl'] }}">
                                {{ $match['isCompleted'] ? __('Match Report') : __('View Match') }}
                            </a>
                        </article>
                    @empty
                        <div class="matches-browser-empty">
                            <strong>{{ trans('admin.no_matches_yet') }}</strong>
                            <a href="{{ public_route('pages.matches') }}">{{ __('All Matches') }}</a>
                        </div>
                    @endforelse
                </div>

                @include('v2.partials.marketplace-pagination', [
                    'results' => $matches->toArray(),
                    'paginationLabel' => __('Matches'),
                ])
            </div>
        </section>
    </main>
@stop
