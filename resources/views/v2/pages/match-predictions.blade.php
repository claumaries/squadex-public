@extends('v2.layout.layout')

@section('content')
    <main class="match-detail-page match-predictions-page">
        <section class="match-detail-hero">
            <div class="container">
                <header class="match-detail-heading">
                    <span>{{ __('Match Predictions') }}</span>
                    <h1>{{ $match['label'] }}</h1>
                    <p>{{ $match['competition'] }} @if($match['date']) / {{ $match['date'] }} @endif</p>
                </header>

                <article class="match-stats-hero-card match-predictions-hero-card">
                    <div>
                        <span>{{ __('Prediction Report') }}</span>
                        <h2>{{ $match['score'] }}</h2>
                        <p>{{ $verdict }}</p>
                    </div>
                    <div class="match-stats-status">
                        <strong>{{ $confidence }}</strong>
                        <span>{{ $hasPredictions ? 'Prediction Available' : 'Awaiting Analytics' }}</span>
                    </div>
                </article>
            </div>
        </section>

        <section class="match-detail-section">
            <div class="container match-predictions-layout">
                <article class="match-predictions-panel">
                    <header class="match-detail-section-head">
                        <span>{{ __('Win Probability') }}</span>
                        <h2>{{ __('Prediction Profile') }}</h2>
                    </header>

                    <div class="match-predictions-team-grid">
                        @foreach($predictionCards as $team)
                            <article class="match-prediction-team-card">
                                <header>
                                    <span>{{ $team['name'] }}</span>
                                    <strong>{{ $team['probability'] }}</strong>
                                </header>

                                <div class="match-prediction-meter" aria-hidden="true">
                                    <i style="width: {{ $team['probabilityPercent'] }}%"></i>
                                </div>

                                <dl>
                                    @foreach($team['metrics'] as $metric)
                                        <div>
                                            <dt>{{ $metric['label'] }}</dt>
                                            <dd>{{ $metric['value'] }}</dd>
                                        </div>
                                    @endforeach
                                </dl>
                            </article>
                        @endforeach
                    </div>

                    @unless($hasPredictions)
                        <article class="match-timeline-empty">
                            <span>{{ __('No predictions yet') }}</span>
                            <h2>{{ __('Prediction pending') }}</h2>
                            <p>{{ __('This match does not have saved analytics yet. Win probability and match signals will appear after analytics are recorded.') }}</p>
                        </article>
                    @endunless
                </article>

                <aside class="match-stats-side">
                    <article class="match-stats-empty">
                        <span>{{ __('Prediction Basis') }}</span>
                        <h2>{{ $hasPredictions ? 'Analytics ready' : 'Pending' }}</h2>
                        <p>{{ __('Predictions are derived from saved win probability, expected goals, possession, pass accuracy and shot pressure.') }}</p>
                    </article>

                    <nav class="match-stats-links" aria-label="{{ __('Match page links') }}">
                        <a href="{{ $overviewUrl }}">{{ __('Match Overview') }}</a>
                        <a href="{{ $timelineUrl }}">{{ __('Match Timeline') }}</a>
                        <a href="{{ $ratingsUrl }}">{{ __('Player Ratings') }}</a>
                        <a href="{{ $analysisUrl }}">{{ __('Match Analysis') }}</a>
                        <a href="{{ $lineupsUrl }}">{{ __('Lineups') }}</a>
                        <a href="{{ $statsUrl }}">{{ __('Statistics') }}</a>
                    </nav>
                </aside>
            </div>
        </section>

        <section class="match-detail-section match-predictions-signals-section">
            <div class="container">
                <header class="match-detail-section-head">
                    <span>{{ __('Signals') }}</span>
                    <h2>{{ __('Prediction Signals') }}</h2>
                </header>

                <div class="match-predictions-signals">
                    @foreach($signals as $signal)
                        <article>
                            <span>{{ $signal['label'] }}</span>
                            <strong>{{ $signal['stat'] }}</strong>
                            <h3>{{ $signal['title'] }}</h3>
                            <p>{{ $signal['body'] }}</p>
                        </article>
                    @endforeach
                </div>
            </div>
        </section>
    </main>
@stop
