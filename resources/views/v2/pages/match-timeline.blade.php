@extends('v2.layout.layout')

@section('content')
    <main class="match-detail-page match-timeline-page">
        <section class="match-detail-hero">
            <div class="container">
                <header class="match-detail-heading">
                    <span>{{ __('Match Timeline') }}</span>
                    <h1>{{ $match['label'] }}</h1>
                    <p>{{ $match['competition'] }} @if($match['date']) / {{ $match['date'] }} @endif</p>
                </header>

                <article class="match-scoreboard match-timeline-scoreboard">
                    <section class="match-team-card">
                        <h2>{{ $match['homeName'] }}</h2>
                    </section>

                    <section class="match-score-center">
                        <strong>{{ $match['score'] }}</strong>
                        <span>{{ $match['status'] }}</span>
                        <nav class="match-timeline-nav" aria-label="{{ __('Match links') }}">
                            <a href="{{ $overviewUrl }}">{{ __('admin.view_details') }}</a>
                            <a href="{{ $lineupsUrl }}">{{ __('Lineups') }}</a>
                            <a href="{{ $statsUrl }}">{{ __('Statistics') }}</a>
                        </nav>
                    </section>

                    <section class="match-team-card away">
                        <h2>{{ $match['awayName'] }}</h2>
                    </section>
                </article>
            </div>
        </section>

        <section class="match-detail-section match-events-section">
            <div class="container match-events-layout">
                <header class="match-detail-section-head">
                    <span>{{ __('Timeline') }}</span>
                    <h2>{{ __('Key Events') }}</h2>
                </header>

                <div class="match-event-list">
                    @forelse($events as $event)
                        <article class="match-event-row">
                            <time>{{ $event['minute'] ?? '' }}</time>
                            <div>
                                <h3>
                                    {{ $event['eventName'] ?? '' }}
                                    @if($event['playerName'] ?? null)
                                        <span>{{ $event['playerName'] }}</span>
                                    @elseif($event['sideClubName'] ?? null)
                                        <span>{{ $event['sideClubName'] }}</span>
                                    @endif
                                </h3>
                                @if($event['eventValue'] ?? null)
                                    <p>{{ $event['eventValue'] }}</p>
                                @endif
                                @if($event['eventMeta'] ?? null)
                                    <p class="match-event-meta">{{ $event['eventMeta'] }}</p>
                                @endif
                            </div>
                        </article>
                    @empty
                        <article class="match-timeline-empty">
                            <span>{{ __('No events yet') }}</span>
                            <h2>{{ __('Timeline pending') }}</h2>
                            <p>{{ __('This match has not produced public timeline events yet. Goals, cards, phase changes and simulation details will appear here once recorded.') }}</p>
                        </article>
                    @endforelse
                </div>
            </div>
        </section>
    </main>
@stop
