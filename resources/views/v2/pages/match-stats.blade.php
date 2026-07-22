@extends('v2.layout.layout')

@section('content')
    @php
        $match = $match ?? ['label' => $matchLabel ?? '', 'homeName' => __('Home'), 'awayName' => __('Away'), 'score' => '--'];
        $hasStats = $hasStats ?? false;
        $statRows = $statRows ?? [
            ['label' => __('Possession'), 'description' => __('Control of the ball across the match'), 'home' => '--', 'away' => '--', 'homePercent' => 0],
            ['label' => __('Expected Goals (xG)'), 'description' => __('Quality of chances created'), 'home' => '--', 'away' => '--', 'homePercent' => 0],
            ['label' => __('Shots'), 'description' => __('Total attempts at goal'), 'home' => '--', 'away' => '--', 'homePercent' => 0],
            ['label' => __('Shots on Target'), 'description' => __('Attempts requiring a save or scoring'), 'home' => '--', 'away' => '--', 'homePercent' => 0],
            ['label' => __('Pass Accuracy'), 'description' => __('Completion under match pressure'), 'home' => '--', 'away' => '--', 'homePercent' => 0],
            ['label' => __('Win Probability'), 'description' => __('Simulation outcome signal'), 'home' => '--', 'away' => '--', 'homePercent' => 0],
        ];
        $insights = [
            ['title' => __('Chance Quality'), 'copy' => __('xG and shot quality reveal which side created the stronger scoring opportunities.')],
            ['title' => __('Territory & Control'), 'copy' => __('Possession and passing output help explain how control developed during the simulation.')],
            ['title' => __('Match Outcome'), 'copy' => __('Probability and event data turn the final score into a readable performance story.')],
        ];
    @endphp

    <main class="match-detail-page match-stats-page">
        <section class="match-detail-hero">
            <div class="container">
                <header class="match-detail-heading">
                    <span>{{ __('Match Intelligence') }}</span>
                    <h1>{{ __(':match Statistics', ['match' => $match['label']]) }}</h1>
                    <p>{{ __('Performance data, chance creation and match control in one clear report.') }}</p>
                </header>

                <article class="match-stats-hero-card">
                    <div>
                        <span>{{ __('Statistics Report') }}</span>
                        <h2>{{ $match['label'] }}</h2>
                        <p>{{ $hasStats ? __('Verified analytics generated from the completed Squadex simulation.') : __('Detailed statistics appear when a tracked Squadex fixture has generated verified match analytics.') }}</p>
                    </div>
                    <div class="match-stats-status">
                        <strong>{{ $match['score'] }}</strong>
                        <span>{{ $hasStats ? __('Analytics Available') : __('Awaiting Match Data') }}</span>
                    </div>
                </article>
            </div>
        </section>

        <section class="match-detail-section">
            <div class="container match-stats-layout">
                <article class="match-stats-panel">
                    <header class="match-detail-section-head">
                        <span>{{ __('Comparison') }}</span>
                        <h2>{{ __('Key Statistics') }}</h2>
                    </header>

                    <div class="match-stats-team-head" aria-label="{{ __('Team statistics columns') }}">
                        <strong>{{ $match['homeName'] }}</strong>
                        <span>{{ __('Statistic') }}</span>
                        <strong>{{ $match['awayName'] }}</strong>
                    </div>

                    <div class="match-stat-list">
                        @foreach($statRows as $stat)
                            <article class="match-stat-row">
                                <strong>{{ $stat['home'] }}</strong>
                                <div>
                                    <h3>{{ $stat['label'] }}</h3>
                                    <p>{{ $stat['description'] }}</p>
                                    <span aria-hidden="true"><i style="width: {{ $stat['homePercent'] }}%"></i></span>
                                </div>
                                <strong>{{ $stat['away'] }}</strong>
                            </article>
                        @endforeach
                    </div>
                </article>

                <aside class="match-stats-side">
                    <article class="match-stats-empty">
                        <span>{{ __('Data Status') }}</span>
                        <h2>{{ $hasStats ? 'Analytics ready' : 'Stats pending' }}</h2>
                        <p>{{ $hasStats ? 'These match statistics were captured from the completed simulation and provide context for the final result.' : 'No verified statistics are available for this match reference yet. Values will appear here after match analytics are recorded.' }}</p>
                    </article>

                    <nav class="match-stats-links" aria-label="{{ __('Match page links') }}">
                        @if(isset($overviewUrl))
                            <a href="{{ $overviewUrl }}">{{ __('Match Overview') }}</a>
                        @endif
                        <a href="{{ public_route('pages.matches') }}">{{ __('All Matches') }}</a>
                        <a href="{{ public_route('pages.tournaments') }}">{{ __('Tournaments') }}</a>
                    </nav>
                </aside>
            </div>
        </section>

        <section class="match-detail-section match-stats-insights-section">
            <div class="container">
                <header class="match-detail-section-head">
                    <span>{{ __('Reading the Match') }}</span>
                    <h2>{{ __('Performance Insights') }}</h2>
                </header>
                <div class="match-stats-insights">
                    @foreach($insights as $insight)
                        <article>
                            <h3>{{ $insight['title'] }}</h3>
                            <p>{{ $insight['copy'] }}</p>
                        </article>
                    @endforeach
                </div>
            </div>
        </section>
    </main>
@stop
