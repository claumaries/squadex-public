@extends('v2.layout.layout')

@section('content')
    <main class="tournaments-page standings-page">
        <section class="tournaments-hero">
            <div class="container">
                <div>
                    <span class="tournaments-kicker">{{ __('admin.standings') }}</span>
                    <h1>{{ $season['league'] }} {{ $season['year'] }}</h1>
                    <p>
                        {{ trans('custom.league_table_schedule') }}
                    </p>
                </div>
            </div>
        </section>

        <section class="tournaments-section">
            <div class="container">
                <article class="tournament-card tournament-card-focused">
                    <header class="tournament-card-head">
                        <div>
                            <span>{{ $season['country'] ?: __('admin.league') }}</span>
                            <h2>{{ __('admin.standings') }}</h2>
                            <p>{{ $season['league'] }} / {{ $season['year'] }}</p>
                        </div>

                        <dl>
                            <div>
                                <dt>{{ __('admin.clubs') }}</dt>
                                <dd>{{ $summary['clubsRanked'] }}</dd>
                            </div>
                            <div>
                                <dt>{{ __('admin.results') }}</dt>
                                <dd>{{ $summary['playedMatches'] }}</dd>
                            </div>
                            <div>
                                <dt>{{ __('admin.next_matches') }}</dt>
                                <dd>{{ $summary['upcomingMatches'] }}</dd>
                            </div>
                        </dl>
                    </header>

                    <div class="tournament-content-grid league-season-content-grid">
                        <section class="tournament-standings">
                            <div class="tournament-panel-title">
                                <h3>{{ __('admin.standings') }}</h3>
                                <span>{{ $season['league'] }} {{ $season['year'] }}</span>
                            </div>

                            <div class="tournament-table-wrap">
                                <table class="tournament-standings-table">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>{{ __('admin.club') }}</th>
                                            <th>{{ __('admin.mp') }}</th>
                                            <th>{{ __('admin.w') }}</th>
                                            <th>{{ __('admin.d') }}</th>
                                            <th>{{ __('admin.l') }}</th>
                                            <th>{{ __('admin.gf') }}</th>
                                            <th>{{ __('admin.ga') }}</th>
                                            <th>{{ __('admin.gd') }}</th>
                                            <th>{{ __('admin.pts') }}</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @forelse($standingRows as $index => $standing)
                                            <tr>
                                                <td>{{ $index + 1 }}</td>
                                                <td>
                                                    @if($standing['details_url'])
                                                        <a href="{{ $standing['details_url'] }}">{{ $standing['club'] }}</a>
                                                    @else
                                                        {{ $standing['club'] }}
                                                    @endif
                                                </td>
                                                <td>{{ $standing['MP'] }}</td>
                                                <td>{{ $standing['W'] }}</td>
                                                <td>{{ $standing['D'] }}</td>
                                                <td>{{ $standing['L'] }}</td>
                                                <td>{{ $standing['GF'] }}</td>
                                                <td>{{ $standing['GA'] }}</td>
                                                <td>{{ $standing['GD'] }}</td>
                                                <td>{{ $standing['PTS'] }}</td>
                                            </tr>
                                        @empty
                                            <tr>
                                                <td colspan="10" class="tournament-empty">{{ __('admin.no_results') }}</td>
                                            </tr>
                                        @endforelse
                                    </tbody>
                                </table>
                            </div>
                        </section>

                        <aside class="tournaments-control-panel league-season-control-panel" aria-label="{{ __('admin.standings') }}">
                            <div class="standings-filter-field">
                                <span>{{ __('admin.years') }}</span>
                                <nav class="token-roadmap-intro-actions" aria-label="{{ __('admin.years') }}">
                                    @foreach($seasonLinks as $link)
                                        <a @class(['active' => $link['active']]) href="{{ $link['url'] }}" @if($link['active']) aria-current="page" @endif>{{ $link['label'] }}</a>
                                    @endforeach
                                </nav>
                            </div>
                            <div class="standings-filter-field">
                                <span>{{ __('admin.leagues') }} {{ $season['year'] }}</span>
                                <nav class="token-roadmap-intro-actions" aria-label="{{ __('admin.leagues') }}">
                                    @foreach($leagueLinks as $link)
                                        <a @class(['active' => $link['active']]) href="{{ $link['url'] }}" @if($link['active']) aria-current="page" @endif>{{ $link['label'] }}</a>
                                    @endforeach
                                </nav>
                            </div>
                            <div class="standings-filter-field">
                                <span>{{ __('admin.league') }}</span>
                                <nav class="token-roadmap-intro-actions" aria-label="{{ __('admin.league') }}">
                                    <a href="{{ $leaguePageUrl }}">{{ __('admin.view_details') }}</a>
                                </nav>
                            </div>
                        </aside>
                    </div>
                </article>
            </div>
        </section>
    </main>
@stop
