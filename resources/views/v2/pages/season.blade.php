@extends('v2.layout.layout')

@section('content')
    <main class="tournaments-page season-page">
        <section class="tournaments-hero">
            <div class="container">
                <div>
                    <span class="tournaments-kicker">{{ __('admin.season') }}</span>
                    <h1>{{ $season['year'] }}</h1>
                    <p>{{ __('Leagues and continental competitions available for this football season.') }}</p>
                </div>
            </div>
        </section>

        <section class="tournaments-section">
            <div class="container">
                <article class="tournament-card tournament-card-focused">
                    <header class="tournament-card-head">
                        <div>
                            <span>{{ __('admin.season') }}</span>
                            <h2>{{ $season['year'] }}</h2>
                            <p>{{ __(':count tournaments', ['count' => $summary['total']]) }}</p>
                        </div>

                        <dl>
                            <div>
                                <dt>{{ __('admin.leagues') }}</dt>
                                <dd>{{ $summary['leagues'] }}</dd>
                            </div>
                            <div>
                                <dt>{{ __('Competitions') }}</dt>
                                <dd>{{ $summary['competitions'] }}</dd>
                            </div>
                        </dl>
                    </header>

                    <div class="tournament-content-grid league-season-content-grid">
                        <section class="tournament-standings">
                            <div class="tournament-panel-title">
                                <h3>{{ __('admin.leagues') }}</h3>
                                <span>{{ $season['year'] }}</span>
                            </div>

                            <div class="market-table-shell country-page-table-shell">
                                <table class="market-table country-page-table">
                                    <thead>
                                        <tr>
                                            <th>{{ __('admin.league') }}</th>
                                            <th>{{ __('admin.country') }}</th>
                                            <th>{{ __('Status') }}</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @forelse($leagueRows as $row)
                                            <tr>
                                                <td><a class="country-page-table-link" href="{{ $row['url'] }}">{{ $row['name'] }}</a></td>
                                                <td>{{ $row['country'] ?: '-' }}</td>
                                                <td>{{ $row['current'] ? 'Current' : '-' }}</td>
                                            </tr>
                                        @empty
                                            <tr>
                                                <td colspan="3"><div class="market-empty">{{ __('admin.leagues') }}</div></td>
                                            </tr>
                                        @endforelse
                                    </tbody>
                                </table>
                            </div>
                        </section>

                        <aside class="tournaments-control-panel league-season-control-panel" aria-label="{{ __('Season navigation') }}">
                            <div class="standings-filter-field">
                                <span>{{ __('admin.years') }}</span>
                                <nav class="token-roadmap-intro-actions" aria-label="{{ __('admin.years') }}">
                                    @foreach($yearLinks as $link)
                                        <a @class(['active' => $link['active']]) href="{{ $link['url'] }}" @if($link['active']) aria-current="page" @endif>{{ $link['label'] }}</a>
                                    @endforeach
                                </nav>
                            </div>
                        </aside>
                    </div>

                    <section class="country-page-listing">
                        <div class="tournament-panel-title">
                            <h3>{{ __('Competitions') }}</h3>
                            <span>{{ $season['year'] }}</span>
                        </div>

                        <div class="market-table-shell country-page-table-shell">
                            <table class="market-table country-page-table">
                                <thead>
                                    <tr>
                                        <th>{{ __('Competition') }}</th>
                                        <th>{{ __('Region') }}</th>
                                        <th>{{ __('Status') }}</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse($competitionRows as $row)
                                        <tr>
                                            <td><a class="country-page-table-link" href="{{ $row['url'] }}">{{ $row['name'] }}</a></td>
                                            <td>{{ $row['region'] ?: '-' }}</td>
                                            <td>{{ $row['current'] ? 'Current' : '-' }}</td>
                                        </tr>
                                    @empty
                                        <tr>
                                            <td colspan="3"><div class="market-empty">{{ __('Competitions') }}</div></td>
                                        </tr>
                                    @endforelse
                                </tbody>
                            </table>
                        </div>
                    </section>
                </article>
            </div>
        </section>
    </main>
@stop
