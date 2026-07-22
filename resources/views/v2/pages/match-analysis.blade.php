@extends('v2.layout.layout')

@section('content')
    <main class="match-detail-page match-analysis-page">
        <section class="match-detail-hero">
            <div class="container">
                <header class="match-detail-heading">
                    <span>{{ __('Match Analysis') }}</span>
                    <h1>{{ $match['label'] }}</h1>
                    <p>{{ $match['competition'] }} @if($match['date']) / {{ $match['date'] }} @endif</p>
                </header>

                <article class="match-stats-hero-card match-analysis-hero-card">
                    <div>
                        <span>{{ __('Analysis Report') }}</span>
                        <h2>{{ $match['score'] }}</h2>
                        <p>{{ $headline }}</p>
                    </div>
                    <div class="match-stats-status">
                        <strong>{{ $hasAnalysis ? 'Ready' : 'Pending' }}</strong>
                        <span>{{ $hasAnalysis ? 'Analysis Available' : 'Awaiting Match Data' }}</span>
                    </div>
                </article>
            </div>
        </section>

        <section class="match-detail-section">
            <div class="container match-analysis-layout">
                <article class="match-analysis-panel">
                    <header class="match-detail-section-head">
                        <span>{{ __('Team View') }}</span>
                        <h2>{{ __('Match Analysis') }}</h2>
                    </header>

                    <div class="match-analysis-team-grid">
                        @foreach($teamCards as $team)
                            <article class="match-analysis-team-card">
                                <header>
                                    <span>{{ $team['name'] }}</span>
                                    <strong>{{ $team['goals'] }}</strong>
                                </header>

                                <dl>
                                    @foreach($team['metrics'] as $metric)
                                        <div>
                                            <dt>{{ $metric['label'] }}</dt>
                                            <dd>{{ $metric['value'] }}</dd>
                                        </div>
                                    @endforeach
                                    <div>
                                        <dt>{{ __('Average Rating') }}</dt>
                                        <dd>{{ $team['averageRating'] }}</dd>
                                    </div>
                                    <div>
                                        <dt>{{ __('Top Performer') }}</dt>
                                        <dd>{{ $team['topPerformer'] }}</dd>
                                    </div>
                                </dl>
                            </article>
                        @endforeach
                    </div>

                    @unless($hasAnalysis)
                        <article class="match-timeline-empty">
                            <span>{{ __('No analysis yet') }}</span>
                            <h2>{{ __('Analysis pending') }}</h2>
                            <p>{{ __('This match does not have verified analytics or player performance records yet. The analysis will update after match processing completes.') }}</p>
                        </article>
                    @endunless
                </article>

                <aside class="match-stats-side">
                    <article class="match-stats-empty">
                        <span>{{ __('Data Status') }}</span>
                        <h2>{{ $hasAnalysis ? 'Report ready' : 'Pending' }}</h2>
                        <p>{{ __('The analysis uses saved match analytics, expected goals, team control metrics and player performance ratings.') }}</p>
                    </article>

                    <nav class="match-stats-links" aria-label="{{ __('Match page links') }}">
                        <a href="{{ $overviewUrl }}">{{ __('Match Overview') }}</a>
                        <a href="{{ $timelineUrl }}">{{ __('Match Timeline') }}</a>
                        <a href="{{ $ratingsUrl }}">{{ __('Player Ratings') }}</a>
                        <a href="{{ $lineupsUrl }}">{{ __('Lineups') }}</a>
                        <a href="{{ $statsUrl }}">{{ __('Statistics') }}</a>
                    </nav>
                </aside>
            </div>
        </section>

        <section class="match-detail-section match-analysis-insights-section">
            <div class="container">
                <header class="match-detail-section-head">
                    <span>{{ __('Insights') }}</span>
                    <h2>{{ __('Reading the Match') }}</h2>
                </header>

                <div class="match-analysis-insights">
                    @foreach($insights as $insight)
                        <article>
                            <span>{{ $insight['label'] }}</span>
                            <strong>{{ $insight['stat'] }}</strong>
                            <h3>{{ $insight['title'] }}</h3>
                            <p>{{ $insight['body'] }}</p>
                        </article>
                    @endforeach
                </div>
            </div>
        </section>
    </main>
@stop
