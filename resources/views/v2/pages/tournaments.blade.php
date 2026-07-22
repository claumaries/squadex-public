@extends('v2.layout.layout')

@section('content')
    <main class="tournaments-page tournaments-index-page">
        <section class="tournaments-hero">
            <div class="container tournaments-hero-grid">
                <div>
                    <h1>{{ __('Tournaments') }}</h1>
                    <p>
                        {{ __('Select one country and one competition to inspect a focused table with full standings, completed matches and upcoming fixtures.') }}
                    </p>
                </div>

                @php
                    $selectedCountryName = data_get(
                        $countries->first(fn ($country): bool => (int) data_get($country, 'id') === (int) $selectedCountryId), 'name',
                        __('Country')
                    );
                    $selectedCompetitionLabel = data_get(
                        collect($competitionOptions)->first(fn (array $option): bool => \Illuminate\Support\Arr::get($option, 'key') === $selectedCompetitionKey), 'label',
                        __('No competitions available')
                    );
                @endphp

                <form class="tournaments-control-panel standings-filter" method="GET" action="{{ public_route('pages.tournaments') }}">
                    <input type="hidden" name="c" value="{{ $selectedCountryId }}">
                    <input type="hidden" name="competition" value="{{ $selectedCompetitionKey }}">

                    <div class="standings-filter-field">
                        <span>{{ __('Country') }}</span>
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
                            @foreach($countries as $country)
                                    <button
                                        class="standings-select-option"
                                        type="button"
                                        role="option"
                                        data-standings-select-option
                                        data-target="c"
                                        data-value="{{ data_get($country, 'id') }}"
                                        data-reset-competition="true"
                                        @if((int) $selectedCountryId === (int) data_get($country, 'id')) aria-selected="true" @endif
                                    >
                                    {{ data_get($country, 'name') }}</button>
                            @endforeach
                            </div>
                        </div>
                    </div>

                    <div class="standings-filter-field">
                        <span>{{ __('Competition') }}</span>
                        <div class="standings-select">
                            <button
                                class="standings-select-toggle"
                                type="button"
                                aria-haspopup="listbox"
                                aria-expanded="false"
                                data-standings-select-toggle
                            >
                                {{ $selectedCompetitionLabel }}
                            </button>
                            <div class="standings-select-menu" role="listbox" hidden data-standings-select-menu>
                            @forelse($competitionOptions as $option)
                                    <button
                                        class="standings-select-option"
                                        type="button"
                                        role="option"
                                        data-standings-select-option
                                        data-target="competition"
                                        data-value="{{ \Illuminate\Support\Arr::get($option, 'key') }}"
                                        @if($selectedCompetitionKey === \Illuminate\Support\Arr::get($option, 'key')) aria-selected="true" @endif
                                    >
                                        {{ \Illuminate\Support\Arr::get($option, 'label') }} / {{ \Illuminate\Support\Arr::get($option, 'type') }}
                                    </button>
                            @empty
                                    <button class="standings-select-option" type="button" role="option" disabled>
                                        {{ __('No competitions available') }}
                                    </button>
                            @endforelse
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </section>

        <section class="tournaments-section">
            <div class="container">
                @if($selectedTournament)
                    <article class="tournament-card tournament-card-focused">
                        <header class="tournament-card-head">
                            <div>
                                <h2>{{ \Illuminate\Support\Arr::get($selectedTournament, 'name') }}</h2>
                                <p>
                                    {{ \Illuminate\Support\Arr::get($selectedTournament, 'season') }}
                                    @if(\Illuminate\Support\Arr::get($selectedTournament, 'location'))
                                        / {{ \Illuminate\Support\Arr::get($selectedTournament, 'location') }}
                                    @endif
                                    @if(\Illuminate\Support\Arr::get($selectedTournament, 'stage'))
                                        / {{ \Illuminate\Support\Arr::get($selectedTournament, 'stage') }}
                                    @endif
                                </p>
                            </div>

                            <dl>
                                <div>
                                    <dt>{{ __('Clubs') }}</dt>
                                    <dd>{{ \Illuminate\Support\Arr::get($summary, 'clubsRanked', 0) }}</dd>
                                </div>
                                <div>
                                    <dt>{{ __('Played') }}</dt>
                                    <dd>{{ \Illuminate\Support\Arr::get($summary, 'playedMatches', 0) }}</dd>
                                </div>
                                <div>
                                    <dt>{{ __('Upcoming') }}</dt>
                                    <dd>{{ \Illuminate\Support\Arr::get($summary, 'upcomingMatches', 0) }}</dd>
                                </div>
                            </dl>
                        </header>

                        <div class="tournament-content-grid">
                            <section class="tournament-standings">
                                <div class="tournament-panel-title">
                                    <h3>{{ __('Full Standing') }}</h3>
                                    <span>{{ __('Sorted by points, goal difference and goals for') }}</span>
                                </div>

                                <div class="tournament-table-wrap">
                                    @php
                                        $standingRows = collect(\Illuminate\Support\Arr::get($selectedTournament, 'standing', []));
                                        $continentalQualificationCount = min(5, max($standingRows->count() - 5, 0));
                                        $relegationStartIndex = max($standingRows->count() - 5, 0);
                                    @endphp
                                    <table class="tournament-standings-table">
                                        <thead>
                                            <tr>
                                                <th>#</th>
                                                <th>{{ __('Club') }}</th>
                                                <th>{{ __('MP') }}</th>
                                                <th>{{ __('W') }}</th>
                                                <th>{{ __('D') }}</th>
                                                <th>{{ __('L') }}</th>
                                                <th>{{ __('GF') }}</th>
                                                <th>{{ __('GA') }}</th>
                                                <th>{{ __('GD') }}</th>
                                                <th>{{ __('PTS') }}</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @forelse($standingRows as $index => $standing)
                                                <tr @class([
                                                    'tournament-standing-row-continental' => $index < $continentalQualificationCount,
                                                    'tournament-standing-row-relegation' => $standingRows->count() > 5 && $index >= $relegationStartIndex,
                                                ])>
                                                    <td>{{ $index + 1 }}</td>
                                                    <td>
                                                        @if(\Illuminate\Support\Arr::get($standing, 'details_url'))
                                                            <a href="{{ \Illuminate\Support\Arr::get($standing, 'details_url') }}">
                                                                {{ \Illuminate\Support\Arr::get($standing, 'club') }}
                                                            </a>
                                                        @else
                                                            {{ \Illuminate\Support\Arr::get($standing, 'club') }}
                                                        @endif
                                                    </td>
                                                    <td>{{ \Illuminate\Support\Arr::get($standing, 'MP') }}</td>
                                                    <td>{{ \Illuminate\Support\Arr::get($standing, 'W') }}</td>
                                                    <td>{{ \Illuminate\Support\Arr::get($standing, 'D') }}</td>
                                                    <td>{{ \Illuminate\Support\Arr::get($standing, 'L') }}</td>
                                                    <td>{{ \Illuminate\Support\Arr::get($standing, 'GF') }}</td>
                                                    <td>{{ \Illuminate\Support\Arr::get($standing, 'GA') }}</td>
                                                    <td>{{ \Illuminate\Support\Arr::get($standing, 'GD') }}</td>
                                                    <td>{{ \Illuminate\Support\Arr::get($standing, 'PTS') }}</td>
                                                </tr>
                                            @empty
                                                <tr>
                                                    <td colspan="10" class="tournament-empty">{{ __('No standing available yet.') }}</td>
                                                </tr>
                                            @endforelse
                                        </tbody>
                                    </table>
                                </div>
                            </section>

                            <section class="tournament-match-columns">
                                <div class="tournament-match-list">
                                    <div class="tournament-panel-title">
                                        <h3>{{ __('Played Matches') }}</h3>
                                        <span>{{ __('Latest results') }}</span>
                                    </div>
                                    @forelse(\Illuminate\Support\Arr::get($selectedTournament, 'played_matches', []) as $match)
                                        @include('v2.partials.tournament-match-row', ['match' => $match])
                                    @empty
                                        <div class="tournament-empty">{{ __('No played matches yet.') }}</div>
                                    @endforelse
                                </div>

                                <div class="tournament-match-list">
                                    <div class="tournament-panel-title">
                                        <h3>{{ __('Upcoming Matches') }}</h3>
                                        <span>{{ __('Next fixtures') }}</span>
                                    </div>
                                    @forelse(\Illuminate\Support\Arr::get($selectedTournament, 'upcoming_matches', []) as $match)
                                        @include('v2.partials.tournament-match-row', ['match' => $match])
                                    @empty
                                        <div class="tournament-empty">{{ __('No upcoming matches scheduled.') }}</div>
                                    @endforelse
                                </div>
                            </section>
                        </div>
                    </article>
                @else
                    <div class="tournaments-empty-section">
                        {{ __('No competitions are available for the selected country.') }}
                    </div>
                @endif
            </div>
        </section>
    </main>
@stop
