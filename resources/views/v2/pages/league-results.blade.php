@extends('v2.layout.layout')

@section('content')
    <main class="tournaments-page league-season-page">
        <section class="tournaments-hero">
            <div class="container">
                <div>
                    <span class="tournaments-kicker">{{ __('League Results') }}</span>
                    <h1>{{ __(':league Results', ['league' => $season['league']]) }}</h1>
                    <p>
                        {{ __('Completed match results for the current :league season.', ['league' => $season['league']]) }}
                    </p>
                </div>
            </div>
        </section>

        <section class="tournaments-section">
            <div class="container">
                <article class="tournament-card tournament-card-focused">
                    <header class="tournament-card-head">
                        <div>
                            <span>{{ $season['country'] ?: 'League season' }}</span>
                            <h2>{{ $season['league'] }} {{ $season['year'] }}</h2>
                            <p>{{ __(':season results archive', ['season' => $season['name']]) }}</p>
                        </div>

                        <dl>
                            <div>
                                <dt>{{ __('Played') }}</dt>
                                <dd>{{ $summary['playedMatches'] }}</dd>
                            </div>
                            <div>
                                <dt>{{ __('Clubs') }}</dt>
                                <dd>{{ $summary['clubsRanked'] }}</dd>
                            </div>
                            <div>
                                <dt>{{ __('Upcoming') }}</dt>
                                <dd>{{ $summary['upcomingMatches'] }}</dd>
                            </div>
                        </dl>
                    </header>

                    <aside class="tournaments-control-panel league-season-control-panel" aria-label="{{ __('League results navigation') }}">
                        <div class="standings-filter-field">
                            <span>{{ __('League pages') }}</span>
                            <nav class="token-roadmap-intro-actions" aria-label="{{ __('League result links') }}">
                                <a href="{{ $leaguePageUrl }}">{{ __('League Simulation') }}</a>
                                <a href="{{ $standingsUrl }}">{{ __('Standings') }}</a>
                                <a href="{{ public_route('pages.matches') }}">{{ __('Matches') }}</a>
                            </nav>
                        </div>
                    </aside>

                    <section class="tournament-match-columns league-season-match-columns">
                        <div class="tournament-match-list">
                            <div class="tournament-panel-title">
                                <h3>{{ __('Results') }}</h3>
                                <span>{{ __('Latest completed matches') }}</span>
                            </div>
                            @forelse($playedMatches as $match)
                                @include('v2.partials.tournament-match-row', ['match' => $match])
                            @empty
                                <div class="tournament-empty">{{ __('No completed results yet.') }}</div>
                            @endforelse
                        </div>

                        <div class="tournament-match-list">
                            <div class="tournament-panel-title">
                                <h3>{{ __('Other Leagues') }}</h3>
                                <span>{{ __('Current season result pages') }}</span>
                            </div>
                            <nav class="token-roadmap-intro-actions" aria-label="{{ __('Available league result pages') }}">
                                @foreach($leagueLinks as $link)
                                    <a href="{{ $link['url'] }}">{{ $link['label'] }}</a>
                                @endforeach
                            </nav>
                        </div>
                    </section>
                </article>
            </div>
        </section>
    </main>
@stop
