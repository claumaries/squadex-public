@extends('v2.layout.layout')

@section('content')
    <main class="tournaments-page team-form-page">
        <section class="tournaments-hero">
            <div class="container">
                <div>
                    <span class="tournaments-kicker">{{ __('admin.team_form') }}</span>
                    <h1>{{ $team['name'] }}</h1>
                    <p>{{ $team['league'] ?: __('admin.club') }}{{ $team['country'] ? ' / '.$team['country'] : '' }}</p>
                </div>
            </div>
        </section>

        <section class="tournaments-section">
            <div class="container">
                <article class="tournament-card tournament-card-focused">
                    <header class="tournament-card-head">
                        <div>
                            <span>{{ __('admin.team_form') }}</span>
                            <h2>{{ $team['name'] }}</h2>
                            <p>{{ $summary['form'] ?: __('admin.no_results') }}</p>
                        </div>

                        <dl>
                            <div>
                                <dt>{{ __('admin.mp') }}</dt>
                                <dd>{{ $summary['played'] }}</dd>
                            </div>
                            <div>
                                <dt>{{ __('admin.w') }}</dt>
                                <dd>{{ $summary['wins'] }}</dd>
                            </div>
                            <div>
                                <dt>{{ __('admin.d') }}</dt>
                                <dd>{{ $summary['draws'] }}</dd>
                            </div>
                            <div>
                                <dt>{{ __('admin.l') }}</dt>
                                <dd>{{ $summary['losses'] }}</dd>
                            </div>
                            <div>
                                <dt>{{ __('admin.pts') }}</dt>
                                <dd>{{ $summary['points'] }}</dd>
                            </div>
                        </dl>
                    </header>

                    <div class="tournament-content-grid league-season-content-grid">
                        <section class="tournament-standings">
                            <div class="tournament-panel-title">
                                <h3>{{ __('admin.results') }}</h3>
                                <span>{{ __('admin.team_form') }}</span>
                            </div>

                            <div class="market-table-shell country-page-table-shell">
                                <table class="market-table country-page-table">
                                    <thead>
                                        <tr>
                                            <th>{{ __('admin.date') }}</th>
                                            <th>{{ __('admin.league_cup') }}</th>
                                            <th>{{ __('admin.venue') }}</th>
                                            <th>{{ __('admin.away_team') }}</th>
                                            <th>{{ __('admin.result') }}</th>
                                            <th>{{ __('admin.match_details') }}</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @forelse($formRows as $row)
                                            <tr>
                                                <td>{{ $row['date'] }}{{ $row['time'] ? ' '.$row['time'] : '' }}</td>
                                                <td>{{ $row['competition'] }}</td>
                                                <td>{{ $row['venue'] }}</td>
                                                <td>
                                                    @if($row['opponent_url'])
                                                        <a class="country-page-table-link" href="{{ $row['opponent_url'] }}">{{ $row['opponent'] }}</a>
                                                    @else
                                                        {{ $row['opponent'] ?: '-' }}
                                                    @endif
                                                </td>
                                                <td>
                                                    <strong>{{ $row['result'] }}</strong>
                                                    <span>{{ $row['score'] }}</span>
                                                </td>
                                                <td><a class="country-page-table-link" href="{{ $row['details_url'] }}">{{ __('admin.view_details') }}</a></td>
                                            </tr>
                                        @empty
                                            <tr>
                                                <td colspan="6"><div class="market-empty">{{ __('admin.no_results') }}</div></td>
                                            </tr>
                                        @endforelse
                                    </tbody>
                                </table>
                            </div>
                        </section>

                        <aside class="tournaments-control-panel league-season-control-panel" aria-label="{{ __('admin.team_form') }}">
                            <div class="standings-filter-field">
                                <span>{{ __('admin.club') }}</span>
                                <nav class="token-roadmap-intro-actions" aria-label="{{ __('admin.club') }}">
                                    <a href="{{ $team['details_url'] }}">{{ __('admin.view_details') }}</a>
                                </nav>
                            </div>
                        </aside>
                    </div>
                </article>
            </div>
        </section>
    </main>
@stop
