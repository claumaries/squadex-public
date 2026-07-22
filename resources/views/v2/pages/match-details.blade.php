@extends('v2.layout.layout')

@section('content')
    @php
        $homeClub = $match['home_club'] ?? [];
        $awayClub = $match['away_club'] ?? [];
        $homeName = $homeClub['name'] ?? '';
        $awayName = $awayClub['name'] ?? '';
        $homeLogoPath = $homeClub['logo'] ?? null;
        $awayLogoPath = $awayClub['logo'] ?? null;
        $homeLogo = $homeLogoPath ? asset('club/'.$homeLogoPath) : asset('blade/images/9.png');
        $awayLogo = $awayLogoPath ? asset('club/'.$awayLogoPath) : asset('blade/images/8.png');
        $matchEnded = (bool) ($match['match_ended'] ?? false);
        $scoreLabel = $matchEnded
            ? ($match['home_goals'] ?? 0).' - '.($match['away_goals'] ?? 0)
            : 'vs';
        $statusLabel = $matchEnded ? 'FT' : ($match['time'] ?? '0\'');
        $competitionName = $match['leagueName'] ?? $match['cupName'] ?? null;
        $seasonName = $match['league_season'] ?? $match['cup_season'] ?? null;
        $locationParts = array_filter([
            $homeClub['cityName'] ?? null,
            $homeClub['countryName'] ?? null,
        ]);
        $venueParts = array_filter([
            $homeClub['stadium']['name'] ?? null,
            $locationParts !== [] ? implode(', ', $locationParts) : null,
        ]);
        $venueSummary = implode(', ', $venueParts);
        $attendance = $match['attendance'] ?? null;
        $venueSummary = $attendance
            ? trim($venueSummary.' ('.number_format((int) $attendance).')')
            : $venueSummary;
        $homeGoals = $match['goals']['home'] ?? [];
        $awayGoals = $match['goals']['away'] ?? [];
        $homeLineup = $match['home_club_first_11'] ?? [];
        $awayLineup = $match['away_club_first_11'] ?? [];
        $events = $match['details'] ?? [];
        $homeClubUrl = public_route('page.club.details', club_route_parameters($homeClub));
        $awayClubUrl = public_route('page.club.details', club_route_parameters($awayClub));
        $statsUrl = public_route('page.match.stats', [
            'competition' => request()->route('competition'),
            'year' => request()->route('year'),
            'slug' => $match['seoSlug'] ?? request()->route('slug'),
        ]);
        $lineups = [
            ['club' => $homeClub, 'players' => $homeLineup],
            ['club' => $awayClub, 'players' => $awayLineup],
        ];
    @endphp

    <main class="match-detail-page">
        <section class="match-detail-hero">
            <div class="container">
                <header class="match-detail-heading">
                    <h1>{{ $homeName }} vs {{ $awayName }}</h1>
                    @if($competitionName)
                        <p>{{ $competitionName }} @if($seasonName) / {{ $seasonName }} @endif</p>
                    @endif
                </header>

                <article class="match-scoreboard">
                    <time class="match-score-date">{{ $match['match_start'] ?? '' }}</time>
                    @if($competitionName || $seasonName)
                        <div class="match-score-competition">
                            @if($competitionName)
                                <strong>{{ $competitionName }}</strong>
                            @endif
                            @if($seasonName)
                                <span>{{ $seasonName }}</span>
                            @endif
                        </div>
                    @endif

                    <section class="match-team-card">
                        <img src="{{ $homeLogo }}" alt="{{ $homeName }}">
                        <h2>
                            <a href="{{ $homeClubUrl }}">
                                {{ $homeName }}
                            </a>
                        </h2>
                        @if($homeGoals !== [])
                            <ul>
                                @foreach($homeGoals as $goal)
                                    <li>{{ $goal['minute'] ?? '' }}' {{ $goal['playerName'] ?? '' }}</li>
                                @endforeach
                            </ul>
                        @endif
                    </section>

                    <section class="match-score-center">
                        <strong>{{ $scoreLabel }}</strong>
                        <span>{{ $statusLabel }}</span>
                        @if($match['referee'] ?? null)
                            <p>{{ trans('custom.referee') }}: {{ $match['referee'] }}</p>
                        @endif
                        @if($venueSummary !== '')
                            <div class="match-score-venue">{{ $venueSummary }}</div>
                        @endif
                        <a class="match-score-stats-link" href="{{ $statsUrl }}">{{ __('Match Statistics') }}</a>
                    </section>

                    <section class="match-team-card away">
                        <img src="{{ $awayLogo }}" alt="{{ $awayName }}">
                        <h2>
                            <a href="{{ $awayClubUrl }}">
                                {{ $awayName }}
                            </a>
                        </h2>
                        @if($awayGoals !== [])
                            <ul>
                                @foreach($awayGoals as $goal)
                                    <li>{{ $goal['minute'] ?? '' }}' {{ $goal['playerName'] ?? '' }}</li>
                                @endforeach
                            </ul>
                        @endif
                    </section>
                </article>
            </div>
        </section>

        @if($homeLineup !== [] && $awayLineup !== [])
            <section class="match-detail-section">
                <div class="container match-lineups-grid">
                    @foreach($lineups as $lineup)
                        <article class="match-lineup-card">
                            <header>
                                <span>{{ __('Lineup') }}</span>
                                <h2>{{ $lineup['club']['name'] ?? '' }}</h2>
                                @if($lineup['club']['formationName'] ?? null)
                                    <p>{{ $lineup['club']['formationName'] }}</p>
                                @endif
                            </header>

                            <div class="match-player-list">
                                @foreach($lineup['players'] as $player)
                                    @php
                                        $positionName = $player['positionName'] ?? '';
                                        $playerData = $player['player'] ?? [];
                                        $playerUrl = $playerData['profileUrl'] ?? public_route('pages.player.details', ['uuid' => $playerData['uuid'] ?? '']);
                                    @endphp
                                    <article>
                                        <span>{{ $positionName }}</span>
                                        <a href="{{ $playerUrl }}">
                                            {{ $playerData['name'] ?? '' }}
                                        </a>
                                        <small>{{ $positionName === 'GK' ? 'GK' : 'XI' }}</small>
                                    </article>
                                @endforeach
                            </div>
                        </article>
                    @endforeach
                </div>
            </section>
        @endif

        @if($events !== [])
            <section class="match-detail-section match-events-section">
                <div class="container match-events-layout">
                    <header class="match-detail-section-head">
                        <span>{{ __('Timeline') }}</span>
                        <h2>{{ trans('custom.match_details') }}</h2>
                    </header>

                    <div class="match-event-list">
                        @foreach($events as $detail)
                            <article class="match-event-row">
                                <time>{{ $detail['minute'] ?? '' }}'</time>
                                <div>
                                    <h3>
                                        {{ $detail['eventName'] ?? '' }}
                                        @if($detail['playerName'] ?? null)
                                            <span>{{ $detail['playerName'] }}</span>
                                        @endif
                                    </h3>
                                    @if($detail['eventValue'] ?? null)
                                        <p>{{ $detail['eventValue'] }}</p>
                                    @endif
                                </div>
                            </article>
                        @endforeach
                    </div>
                </div>
            </section>
        @endif
    </main>
@stop
