@extends('v2.layout.layout')

@section('content')
    <main class="match-detail-page match-ratings-page">
        <section class="match-detail-hero">
            <div class="container">
                <header class="match-detail-heading">
                    <span>{{ __('Player Ratings') }}</span>
                    <h1>{{ $match['label'] }}</h1>
                    <p>{{ $match['competition'] }} @if($match['date']) / {{ $match['date'] }} @endif</p>
                </header>

                <article class="match-stats-hero-card match-ratings-hero-card">
                    <div>
                        <span>{{ __('Ratings Report') }}</span>
                        <h2>{{ $match['score'] }}</h2>
                        <p>{{ $hasRatings ? 'Verified player ratings generated from the completed match performance model.' : 'Player ratings appear after match performance records are generated.' }}</p>
                    </div>
                    <div class="match-ratings-summary-grid">
                        <div>
                            <span>{{ __('Top Performer') }}</span>
                            <strong>{{ $summary['topPerformer'] }}</strong>
                        </div>
                        <div>
                            <span>{{ $match['homeName'] }}</span>
                            <strong>{{ $summary['homeAverage'] }}</strong>
                        </div>
                        <div>
                            <span>{{ $match['awayName'] }}</span>
                            <strong>{{ $summary['awayAverage'] }}</strong>
                        </div>
                    </div>
                </article>
            </div>
        </section>

        <section class="match-detail-section">
            <div class="container match-ratings-layout">
                <article class="match-ratings-panel">
                    <header class="match-detail-section-head">
                        <span>{{ __('Ratings') }}</span>
                        <h2>{{ __('Player Ratings') }}</h2>
                    </header>

                    <div class="match-rating-team-grid">
                        @foreach($ratingTeams as $team)
                            <article class="match-rating-team-card">
                                <header>
                                    <span>{{ __(':count rated', ['count' => $team['totalRated']]) }}</span>
                                    <h3>{{ $team['name'] }}</h3>
                                    <strong>{{ $team['average'] }}</strong>
                                </header>

                                <div class="match-rating-list">
                                    @forelse($team['ratings'] as $rating)
                                        <article class="match-rating-row">
                                            <div class="match-rating-player">
                                                <span>{{ $rating['position'] ?: '-' }}</span>
                                                <div>
                                                    @if($rating['url'])
                                                        <a href="{{ $rating['url'] }}">{{ $rating['player'] }}</a>
                                                    @else
                                                        <strong>{{ $rating['player'] }}</strong>
                                                    @endif
                                                    <small>{{ $rating['club'] }}</small>
                                                </div>
                                            </div>

                                            <div class="match-rating-meter">
                                                <strong>{{ $rating['rating'] }}</strong>
                                                <span aria-hidden="true"><i style="width: {{ $rating['ratingPercent'] }}%"></i></span>
                                            </div>

                                            <dl class="match-rating-stats">
                                                <div>
                                                    <dt>{{ __('Min') }}</dt>
                                                    <dd>{{ $rating['minutes'] }}</dd>
                                                </div>
                                                <div>
                                                    <dt>{{ __('G') }}</dt>
                                                    <dd>{{ $rating['goals'] }}</dd>
                                                </div>
                                                <div>
                                                    <dt>{{ __('A') }}</dt>
                                                    <dd>{{ $rating['assists'] }}</dd>
                                                </div>
                                                <div>
                                                    <dt>{{ __('KP') }}</dt>
                                                    <dd>{{ $rating['keyPasses'] }}</dd>
                                                </div>
                                                <div>
                                                    <dt>{{ __('Tkl') }}</dt>
                                                    <dd>{{ $rating['tackles'] }}</dd>
                                                </div>
                                                <div>
                                                    <dt>{{ __('Sv') }}</dt>
                                                    <dd>{{ $rating['saves'] }}</dd>
                                                </div>
                                            </dl>
                                        </article>
                                    @empty
                                        <article class="match-rating-empty-team">
                                            <span>{{ __('No ratings') }}</span>
                                            <p>{{ __('No player ratings are available for this team yet.') }}</p>
                                        </article>
                                    @endforelse
                                </div>
                            </article>
                        @endforeach

                        @unless($hasRatings)
                            <article class="match-timeline-empty">
                                <span>{{ __('No ratings yet') }}</span>
                                <h2>{{ __('Ratings pending') }}</h2>
                                <p>{{ __('This match does not have public player ratings yet. Ratings will appear here after match performance processing is complete.') }}</p>
                            </article>
                        @endunless
                    </div>
                </article>

                <aside class="match-stats-side">
                    <article class="match-stats-empty">
                        <span>{{ __('Rated Players') }}</span>
                        <h2>{{ $summary['totalRated'] }}</h2>
                        <p>{{ __('Ratings are calculated from goals, assists, saves, key passes, tackles, mistakes and match engine performance context.') }}</p>
                    </article>

                    <nav class="match-stats-links" aria-label="{{ __('Match page links') }}">
                        <a href="{{ $overviewUrl }}">{{ __('Match Overview') }}</a>
                        <a href="{{ $timelineUrl }}">{{ __('Match Timeline') }}</a>
                        <a href="{{ $lineupsUrl }}">{{ __('Lineups') }}</a>
                        <a href="{{ $statsUrl }}">{{ __('Statistics') }}</a>
                    </nav>
                </aside>
            </div>
        </section>
    </main>
@stop
