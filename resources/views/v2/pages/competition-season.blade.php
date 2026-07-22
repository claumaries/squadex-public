@extends('v2.layout.layout')

@section('content')
    <main class="tournaments-page league-season-page">
        <section class="tournaments-hero">
            <div class="container">
                <div>
                    <span class="tournaments-kicker">{{ $page['kicker'] }}</span>
                    <h1>{{ $season['league'] }} {{ $season['year'] }}</h1>
                    <p>
                        {{ $page['summary'] }}
                    </p>
                </div>
            </div>
        </section>

        <section class="tournaments-section">
            <div class="container">
                <article class="tournament-card tournament-card-focused">
                    <header class="tournament-card-head">
                        <div>
                            <span>{{ $season['country'] ?: $page['locationLabel'] }}</span>
                            <h2>{{ $season['league'] }}</h2>
                            <p>{{ $season['name'] }} / {{ $season['year'] }}</p>
                        </div>

                        <dl>
                            <div>
                                <dt>{{ __('Clubs') }}</dt>
                                <dd>{{ $summary['clubsRanked'] }}</dd>
                            </div>
                            <div>
                                <dt>{{ __('Played') }}</dt>
                                <dd>{{ $summary['playedMatches'] }}</dd>
                            </div>
                            <div>
                                <dt>{{ __('Upcoming') }}</dt>
                                <dd>{{ $summary['upcomingMatches'] }}</dd>
                            </div>
                        </dl>
                    </header>

                    <div class="tournament-content-grid league-season-content-grid">
                        <section class="tournament-standings">
                            <div class="tournament-panel-title">
                                <h3>{{ $page['tableTitle'] }}</h3>
                                <span>{{ $page['tableHint'] }}</span>
                            </div>

                            <div class="tournament-table-wrap">
                                <table class="tournament-standings-table">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>{{ __('Club') }}</th>
                                            <th>{{ __('MP') }}</th>
                                            <th>{{ __('W') }}</th>
                                            <th>{{ __('D') }}</th>
                                            <th>{{ __('L') }}</th>
                                            <th>{{ __('GF') }}</th>
                                            <th>{{ __('GA') }}</th>
                                            <th>{{ __('GD') }}</th>
                                            <th>{{ __('PTS') }}</th>
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
                                                <td colspan="10" class="tournament-empty">{{ __('No standing available yet.') }}</td>
                                            </tr>
                                        @endforelse
                                    </tbody>
                                </table>
                            </div>
                        </section>

                        <aside class="tournaments-control-panel league-season-control-panel" aria-label="{{ __('Competition season navigation') }}">
                            <div class="standings-filter-field">
                                <span>{{ $page['seasonLinksLabel'] }}</span>
                                <nav class="token-roadmap-intro-actions" aria-label="{{ __('Available seasons') }}">
                                    @foreach($seasonLinks as $link)
                                        <a @class(['active' => $link['active']]) href="{{ $link['url'] }}" @if($link['active']) aria-current="page" @endif>{{ $link['label'] }}</a>
                                    @endforeach
                                </nav>
                            </div>
                            <div class="standings-filter-field">
                                <span>{{ $page['peerLinksLabel'] }}</span>
                                <nav class="token-roadmap-intro-actions" aria-label="{{ $page['peerLinksAriaLabel'] }}">
                                    @foreach($leagueLinks as $link)
                                        <a @class(['active' => $link['active']]) href="{{ $link['url'] }}" @if($link['active']) aria-current="page" @endif>{{ $link['label'] }}</a>
                                    @endforeach
                                </nav>
                            </div>
                        </aside>
                    </div>

                    <section class="tournament-match-columns league-season-match-columns">
                        <div class="tournament-match-list">
                            <div class="tournament-panel-title">
                                <h3>{{ __('Results') }}</h3>
                                <span>{{ __('Latest completed matches') }}</span>
                            </div>
                            @forelse($playedMatches as $match)
                                @include('v2.partials.tournament-match-row', ['match' => $match])
                            @empty
                                <div class="tournament-empty">{{ __('No completed results yet.') }}</div>
                            @endforelse
                        </div>

                        <div class="tournament-match-list">
                            <div class="tournament-panel-title">
                                <h3>{{ __('Fixtures') }}</h3>
                                <span>{{ __('Upcoming matches') }}</span>
                            </div>
                            @forelse($upcomingMatches as $match)
                                @include('v2.partials.tournament-match-row', ['match' => $match])
                            @empty
                                <div class="tournament-empty">{{ __('No upcoming fixtures scheduled.') }}</div>
                            @endforelse
                        </div>
                    </section>
                </article>
            </div>
        </section>
    </main>
@stop
