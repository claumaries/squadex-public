@extends('v2.layout.layout')

@section('content')
    <main class="tournaments-page player-matches-page">
        <section class="tournaments-hero">
            <div class="container">
                <div>
                    <span class="tournaments-kicker">{{ __('admin.player_profile') }}</span>
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
                            <span>{{ __('admin.matches_played') }}</span>
                            <h2>{{ $player['name'] }}</h2>
                            <p>{{ __('admin.match_details') }}</p>
                        </div>

                        <dl>
                            <div>
                                <dt>{{ __('admin.matches_played') }}</dt>
                                <dd>{{ $summary['matches'] }}</dd>
                            </div>
                            <div>
                                <dt>{{ __('Minutes') }}</dt>
                                <dd>{{ $summary['minutes'] }}</dd>
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
                                <dt>{{ __('admin.overall_rating') }}</dt>
                                <dd>{{ $summary['averageRating'] }}</dd>
                            </div>
                        </dl>
                    </header>

                    <div class="tournament-content-grid league-season-content-grid">
                        <section class="tournament-standings">
                            <div class="tournament-panel-title">
                                <h3>{{ __('admin.match_details') }}</h3>
                                <span>{{ __('admin.matches_played') }}</span>
                            </div>

                            <div class="market-table-shell country-page-table-shell">
                                <table class="market-table country-page-table">
                                    <thead>
                                        <tr>
                                            <th>{{ __('admin.date') }}</th>
                                            <th>{{ __('admin.league_cup') }}</th>
                                            <th>{{ __('admin.match_details') }}</th>
                                            <th>{{ __('admin.result') }}</th>
                                            <th>{{ __('admin.overall_rating') }}</th>
                                            <th>{{ __('Minutes') }}</th>
                                            <th>{{ __('G/A') }}</th>
                                            <th>{{ __('admin.view_details') }}</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @forelse($matches as $match)
                                            <tr>
                                                <td>{{ $match['date'] }}{{ $match['time'] ? ' '.$match['time'] : '' }}</td>
                                                <td>{{ $match['competition'] }}</td>
                                                <td>{{ $match['match'] }}</td>
                                                <td><strong>{{ $match['score'] }}</strong></td>
                                                <td>{{ $match['rating'] }}</td>
                                                <td>{{ $match['minutes'] }}</td>
                                                <td>{{ $match['goals'] }}/{{ $match['assists'] }}</td>
                                                <td>
                                                    @if($match['detailsUrl'])
                                                        <a class="country-page-table-link" href="{{ $match['detailsUrl'] }}">{{ __('admin.view_details') }}</a>
                                                    @else
                                                        -
                                                    @endif
                                                </td>
                                            </tr>
                                        @empty
                                            <tr>
                                                <td colspan="8"><div class="market-empty">{{ __('admin.no_matches_yet') }}</div></td>
                                            </tr>
                                        @endforelse
                                    </tbody>
                                </table>
                            </div>

                            @include('v2.partials.marketplace-pagination', [
                                'results' => $matches->toArray(),
                                'paginationLabel' => $player['name'].' matches pagination',
                            ])
                        </section>

                        <aside class="tournaments-control-panel league-season-control-panel" aria-label="{{ __('admin.player_profile') }}">
                            <div class="standings-filter-field">
                                <span>{{ __('admin.player_profile') }}</span>
                                <nav class="token-roadmap-intro-actions" aria-label="{{ __('admin.player_profile') }}">
                                    <a href="{{ $player['profileUrl'] }}">{{ __('admin.view_details') }}</a>
                                    <a href="{{ $player['statsUrl'] }}">{{ __('admin.player_stats') }}</a>
                                </nav>
                            </div>
                        </aside>
                    </div>
                </article>
            </div>
        </section>
    </main>
@stop
