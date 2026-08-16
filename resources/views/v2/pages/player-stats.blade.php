@extends('v2.layout.layout')

@section('content')
    <main class="tournaments-page player-stats-page">
        <section class="tournaments-hero">
            <div class="container">
                <div>
                    <span class="tournaments-kicker">{{ __('admin.player_stats') }}</span>
                    <h1>{{ $player['name'] }}</h1>
                    <p>
                        {{ $player['position'] ?: __('admin.player_profile') }}
                        @if($player['club'])
                            / {{ $player['club'] }}
                        @endif
                        @if($player['country'])
                            / {{ $player['country'] }}
                        @endif
                    </p>
                </div>
            </div>
        </section>

        <section class="tournaments-section">
            <div class="container">
                <article class="tournament-card tournament-card-focused">
                    <header class="tournament-card-head">
                        <div>
                            <span>{{ __('admin.player_stats') }}</span>
                            <h2>{{ $player['name'] }}</h2>
                            <p>{{ __('admin.overall_rating') }} {{ $summary['overallRating'] }}</p>
                        </div>

                        <dl>
                            <div>
                                <dt>{{ __('admin.matches_played') }}</dt>
                                <dd>{{ $summary['matches'] }}</dd>
                            </div>
                            <div>
                                <dt>{{ __('admin.overall_rating') }}</dt>
                                <dd>{{ $summary['averageRating'] }}</dd>
                            </div>
                            <div>
                                <dt>{{ __('Goals') }}</dt>
                                <dd>{{ $summary['goals'] }}</dd>
                            </div>
                            <div>
                                <dt>{{ __('Assists') }}</dt>
                                <dd>{{ $summary['assists'] }}</dd>
                            </div>
                            <div>
                                <dt>{{ __('Minutes') }}</dt>
                                <dd>{{ $summary['minutes'] }}</dd>
                            </div>
                        </dl>
                    </header>

                    <div class="tournament-content-grid league-season-content-grid">
                        <section class="tournament-standings">
                            <div class="tournament-panel-title">
                                <h3>{{ __('admin.player_stats') }}</h3>
                                <span>{{ __('custom.players_performance') }}</span>
                            </div>

                            <div class="market-table-shell country-page-table-shell">
                                <table class="market-table country-page-table">
                                    <thead>
                                        <tr>
                                            <th>{{ __('Stat') }}</th>
                                            <th>{{ __('Value') }}</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($performance as $row)
                                            <tr>
                                                <td>{{ $row['label'] }}</td>
                                                <td><strong>{{ $row['value'] }}</strong></td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>

                            <div class="tournament-panel-title" style="margin-top: 24px;">
                                <h3>{{ __('admin.overall_rating') }}</h3>
                                <span>{{ $summary['overallRating'] }}</span>
                            </div>

                            <div class="player-stat-grid">
                                @foreach($attributes as $attribute)
                                    <article class="player-stat-row">
                                        <div>
                                            <strong>{{ $attribute['label'] }}</strong>
                                            <span>{{ $attribute['value'] }}</span>
                                        </div>
                                        <meter min="0" max="100" value="{{ $attribute['value'] }}">{{ $attribute['value'] }}</meter>
                                    </article>
                                @endforeach
                            </div>
                        </section>

                        <aside class="tournaments-control-panel league-season-control-panel" aria-label="{{ __('admin.player_profile') }}">
                            <div class="standings-filter-field">
                                <span>{{ __('admin.player_profile') }}</span>
                                <nav class="token-roadmap-intro-actions" aria-label="{{ __('admin.player_profile') }}">
                                    <a href="{{ $player['profileUrl'] }}">{{ __('admin.view_details') }}</a>
                                    @if($player['matchesUrl'])
                                        <a href="{{ $player['matchesUrl'] }}">{{ __('admin.matches_played') }}</a>
                                    @endif
                                </nav>
                            </div>
                        </aside>
                    </div>
                </article>
            </div>
        </section>
    </main>
@stop
