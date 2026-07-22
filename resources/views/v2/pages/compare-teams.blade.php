@extends('v2.layout.layout')

@section('content')
    <main class="compare-teams-page">
        <section class="compare-teams-hero">
            <div class="container compare-teams-hero-grid">
                <div class="compare-team-card compare-team-card-left">
                    <span>{{ $leftTeam['league'] }}</span>
                    <div class="compare-team-crest">
                        <img src="{{ $leftTeam['logoUrl'] }}" alt="{{ $leftTeam['name'] }}">
                    </div>
                    <h2>{{ $leftTeam['name'] }}</h2>
                    <p>{{ $leftTeam['country'] }}</p>
                </div>

                <div class="compare-versus-panel">
                    <span>{{ __('Team Comparison') }}</span>
                    <h1>{{ $leftTeam['name'] }} vs {{ $rightTeam['name'] }}</h1>
                    <p>{{ __('Compare two football teams across form, tactical balance and simulation readiness.') }}</p>
                    <strong>{{ __('VS') }}</strong>
                </div>

                <div class="compare-team-card compare-team-card-right">
                    <span>{{ $rightTeam['league'] }}</span>
                    <div class="compare-team-crest">
                        <img src="{{ $rightTeam['logoUrl'] }}" alt="{{ $rightTeam['name'] }}">
                    </div>
                    <h2>{{ $rightTeam['name'] }}</h2>
                    <p>{{ $rightTeam['country'] }}</p>
                </div>
            </div>
        </section>

        <section class="compare-teams-section">
            <div class="container compare-teams-layout">
                <article class="compare-table-panel">
                    <header>
                        <span>{{ __('Comparison Matrix') }}</span>
                        <h2>{{ __('Side-by-side profile') }}</h2>
                    </header>

                    <div class="compare-table">
                        <div class="compare-table-row compare-table-head">
                            <span>{{ $leftTeam['name'] }}</span>
                            <span>{{ __('Metric') }}</span>
                            <span>{{ $rightTeam['name'] }}</span>
                        </div>

                        @foreach($comparisonRows as $row)
                            <div class="compare-table-row">
                                <strong>{{ $row['left'] }}</strong>
                                <span>{{ $row['label'] }}</span>
                                <strong>{{ $row['right'] }}</strong>
                            </div>
                        @endforeach
                    </div>
                </article>

                <aside class="compare-summary-panel">
                    <span>{{ __('Head To Head') }}</span>
                    <h2>{{ __(':count played', ['count' => $headToHead['played']]) }}</h2>
                    <p>
                        {{ __(':left wins: :leftWins / Draws: :draws / :right wins: :rightWins.', [
                            'left' => $leftTeam['name'],
                            'leftWins' => $headToHead['leftWins'],
                            'draws' => $headToHead['draws'],
                            'right' => $rightTeam['name'],
                            'rightWins' => $headToHead['rightWins'],
                        ]) }}
                    </p>
                    <dl class="compare-head-to-head">
                        <div>
                            <dt>{{ __(':team goals', ['team' => $leftTeam['name']]) }}</dt>
                            <dd>{{ $headToHead['leftGoals'] }}</dd>
                        </div>
                        <div>
                            <dt>{{ __(':team goals', ['team' => $rightTeam['name']]) }}</dt>
                            <dd>{{ $headToHead['rightGoals'] }}</dd>
                        </div>
                    </dl>
                </aside>
            </div>
        </section>

        <section class="compare-insights-section">
            <div class="container compare-insights-grid">
                <article>
                    <span>01</span>
                    <h3>{{ __('Squad Value') }}</h3>
                    <p>{{ $leftTeam['name'] }}: {{ $leftTeam['squadMarketValueFormatted'] }} / {{ $rightTeam['name'] }}: {{ $rightTeam['squadMarketValueFormatted'] }}.</p>
                </article>
                <article>
                    <span>02</span>
                    <h3>{{ __('Goals') }}</h3>
                    <p>{{ __(':left scored :leftFor and conceded :leftAgainst. :right scored :rightFor and conceded :rightAgainst.', [
                        'left' => $leftTeam['name'],
                        'leftFor' => $leftTeam['goalsFor'],
                        'leftAgainst' => $leftTeam['goalsAgainst'],
                        'right' => $rightTeam['name'],
                        'rightFor' => $rightTeam['goalsFor'],
                        'rightAgainst' => $rightTeam['goalsAgainst'],
                    ]) }}</p>
                </article>
                <article>
                    <span>03</span>
                    <h3>{{ __('xG') }}</h3>
                    <p>{{ __(':left total xG: :leftXg. :right total xG: :rightXg.', [
                        'left' => $leftTeam['name'],
                        'leftXg' => number_format((float) $leftTeam['xg'], 2),
                        'right' => $rightTeam['name'],
                        'rightXg' => number_format((float) $rightTeam['xg'], 2),
                    ]) }}</p>
                </article>
            </div>
        </section>
    </main>
@stop
