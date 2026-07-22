@extends('v2.layout.layout')

@section('content')
    <main class="match-detail-page match-lineups-page">
        <section class="match-detail-hero">
            <div class="container">
                <header class="match-detail-heading">
                    <h1>{{ $match['label'] }}</h1>
                    <p>{{ $match['competition'] }} @if($match['date']) / {{ $match['date'] }} @endif</p>
                </header>

                <article class="match-scoreboard">
                    <section class="match-team-card">
                        <h2>{{ $match['homeName'] }}</h2>
                    </section>

                    <section class="match-score-center">
                        <strong>{{ $match['score'] }}</strong>
                        <span>{{ __('Lineups') }}</span>
                        <nav class="token-roadmap-intro-actions" aria-label="{{ __('Match links') }}">
                            <a href="{{ $overviewUrl }}">{{ __('admin.view_details') }}</a>
                            <a href="{{ $statsUrl }}">{{ __('Match Statistics') }}</a>
                        </nav>
                    </section>

                    <section class="match-team-card away">
                        <h2>{{ $match['awayName'] }}</h2>
                    </section>
                </article>
            </div>
        </section>

        <section class="match-detail-section">
            <div class="container match-lineups-grid">
                @foreach($lineups as $lineup)
                    <article class="match-lineup-card">
                        <header>
                            <span>{{ __('Lineup') }}</span>
                            <h2>{{ $lineup['club'] }}</h2>
                            @if($lineup['formation'])
                                <p>{{ $lineup['formation'] }}</p>
                            @endif
                        </header>

                        <div class="match-player-list">
                            @forelse($lineup['players'] as $player)
                                <article>
                                    <span>{{ $player['position'] ?: '-' }}</span>
                                    <a href="{{ $player['url'] }}">{{ $player['name'] }}</a>
                                    <small>{{ $player['position'] === 'GK' ? 'GK' : 'XI' }}</small>
                                </article>
                            @empty
                                <article>
                                    <span>-</span>
                                    <strong>{{ __('No lineup available') }}</strong>
                                    <small>{{ __('XI') }}</small>
                                </article>
                            @endforelse
                        </div>
                    </article>
                @endforeach
            </div>
        </section>
    </main>
@stop
