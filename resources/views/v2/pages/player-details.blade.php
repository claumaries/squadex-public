@extends('v2.layout.layout')

@section('content')
    @php
        $playerName = \Illuminate\Support\Arr::get($player, 'name');
        $playerImage = \Illuminate\Support\Arr::get($player, 'imageUrl');
        $positionShort = \Illuminate\Support\Arr::get($player, 'player_position.short_name');
        $positionName = $positionShort ? trans('custom.'.$positionShort) : \Illuminate\Support\Arr::get($player, 'player_position.name');
        $clubName = \Illuminate\Support\Arr::get($player, 'club.name');
        $club = \Illuminate\Support\Arr::get($player, 'club', []);
        $birthPlace = collect([
            \Illuminate\Support\Arr::get($player, 'city.name'),
            \Illuminate\Support\Arr::get($player, 'country.name'),
        ])->filter()->implode(', ');
        $marketValue = number_format((int) \Illuminate\Support\Arr::get($player, 'market_value', 0));
        $overallRating = \Illuminate\Support\Arr::get($player, 'overallRating');
        $mainAttributes = collect(\Illuminate\Support\Arr::get($player, 'mainAttributes', []));
        $allStats = collect(\Illuminate\Support\Arr::get($player, 'stats', []));
        $dateOfBirth = \Illuminate\Support\Arr::get($player, 'dob')
            ? \Illuminate\Support\Carbon::parse(\Illuminate\Support\Arr::get($player, 'dob'))->toDateString()
            : null;
    @endphp

    <main class="player-detail-page">
        <section class="player-detail-hero">
            <div class="container player-detail-hero-grid">
                <figure class="player-detail-portrait">
                    @if(is_string($playerImage) && $playerImage !== '')
                        <img src="{{ $playerImage }}" alt="{{ $playerName }}">
                    @endif
                    @if($overallRating)
                        <figcaption>
                            <span>{{ trans('custom.overall_rating') }}</span>
                            <strong>{{ $overallRating }}</strong>
                        </figcaption>
                    @endif
                </figure>

                <header class="player-detail-heading">
                    <span>{{ trans('custom.player_profile') }}</span>
                    <h1>{{ $playerName }}</h1>

                    <div class="player-detail-tags">
                        @if($positionShort)
                            <strong>{{ $positionShort }}</strong>
                        @endif
                        @if($positionName)
                            <span>{{ $positionName }}</span>
                        @endif
                        @if($clubName)
                            @if($club)
                                <a href="{{ public_route('page.club.details', club_route_parameters($club)) }}">{{ $clubName }}</a>
                            @else
                                <span>{{ $clubName }}</span>
                            @endif
                        @endif
                    </div>

                    @if(\Illuminate\Support\Arr::get($player, 'playerOverview'))
                        <p>{{ \Illuminate\Support\Arr::get($player, 'playerOverview') }}</p>
                    @endif

                    @if(\Illuminate\Support\Arr::get($player, 'matchesUrl'))
                        <div class="token-roadmap-intro-actions">
                            <a href="{{ \Illuminate\Support\Arr::get($player, 'matchesUrl') }}">{{ trans('admin.matches_played') }}</a>
                            @if(\Illuminate\Support\Arr::get($player, 'statsUrl'))
                                <a href="{{ \Illuminate\Support\Arr::get($player, 'statsUrl') }}">{{ trans('admin.player_stats') }}</a>
                            @endif
                        </div>
                    @endif

                    <dl class="player-detail-hero-stats">
                        <div>
                            <dt>{{ trans('custom.market_value') }}</dt>
                            <dd>{{ $marketValue }}</dd>
                        </div>
                        <div>
                            <dt>{{ trans('admin.matches_played') }}</dt>
                            <dd>{{ \Illuminate\Support\Arr::get($player, 'matchFirst11Count', 0) }}</dd>
                        </div>
                        <div>
                            <dt>{{ __('Goals') }}</dt>
                            <dd>{{ \Illuminate\Support\Arr::get($player, 'goals', 0) }}</dd>
                        </div>
                    </dl>
                </header>
            </div>
        </section>

        <section class="player-detail-section">
            <div class="container player-detail-layout">
                <article class="player-detail-panel">
                    <header class="player-detail-section-head">
                        <span>{{ trans('custom.player_overview') }}</span>
                        <h2>{{ $playerName }}</h2>
                    </header>

                    <dl class="player-detail-facts">
                        @if($clubName)
                            <div>
                                <dt>{{ trans('custom.club') }}</dt>
                                <dd>{{ $clubName }}</dd>
                            </div>
                        @endif
                        @if($birthPlace !== '')
                            <div>
                                <dt>{{ trans('custom.place_of_birth') }}</dt>
                                <dd>{{ $birthPlace }}</dd>
                            </div>
                        @endif
                        @if($dateOfBirth || \Illuminate\Support\Arr::get($player, 'age') !== null)
                            <div>
                                <dt>{{ trans('custom.date_of_birth') }}</dt>
                                <dd>
                                    {{ $dateOfBirth }}
                                    @if(\Illuminate\Support\Arr::get($player, 'age') !== null)
                                        ({{ \Illuminate\Support\Arr::get($player, 'age') }} {{ trans('custom.yo') }})
                                    @endif
                                </dd>
                            </div>
                        @endif
                        @if(\Illuminate\Support\Arr::get($player, 'formattedHeight'))
                            <div>
                                <dt>{{ trans('custom.height') }}</dt>
                                <dd>{{ \Illuminate\Support\Arr::get($player, 'formattedHeight') }}</dd>
                            </div>
                        @endif
                        @if(\Illuminate\Support\Arr::get($player, 'formattedWeight'))
                            <div>
                                <dt>{{ trans('custom.weight') }}</dt>
                                <dd>{{ \Illuminate\Support\Arr::get($player, 'formattedWeight') }}</dd>
                            </div>
                        @endif
                        <div>
                            <dt>{{ trans('custom.market_value') }}</dt>
                            <dd>{{ $marketValue }}</dd>
                        </div>
                    </dl>
                </article>

                <aside class="player-detail-match-card">
                    <span>{{ trans('custom.players_performance') }}</span>
                    <dl>
                        <div>
                            <dt>{{ trans('admin.matches_played') }}</dt>
                            <dd>{{ \Illuminate\Support\Arr::get($player, 'matchFirst11Count', 0) }}</dd>
                        </div>
                        <div>
                            <dt>{{ __('Goals') }}</dt>
                            <dd>{{ \Illuminate\Support\Arr::get($player, 'goals', 0) }}</dd>
                        </div>
                        <div>
                            <dt>{{ __('Penalty goals') }}</dt>
                            <dd>{{ \Illuminate\Support\Arr::get($player, 'penaltyGoals', 0) }}</dd>
                        </div>
                        <div>
                            <dt>{{ __('Yellow cards') }}</dt>
                            <dd>{{ \Illuminate\Support\Arr::get($player, 'yellowCards', 0) }}</dd>
                        </div>
                        <div>
                            <dt>{{ __('Red cards') }}</dt>
                            <dd>{{ \Illuminate\Support\Arr::get($player, 'redCards', 0) }}</dd>
                        </div>
                    </dl>
                </aside>
            </div>
        </section>

        <section class="player-detail-section player-attributes-section">
            <div class="container">
                <header class="player-detail-section-head">
                    <span>{{ trans('custom.players_performance') }}</span>
                    <h2>{{ trans('custom.overall_rating') }} {{ $overallRating }}</h2>
                </header>

                @if($mainAttributes->isNotEmpty())
                    <div class="player-main-attributes">
                        @foreach($mainAttributes as $label => $attribute)
                            @php $value = (int) $attribute; @endphp
                            <article>
                                <span>{{ trans('custom.'.strtolower((string) $label)) }}</span>
                                <strong>{{ $value }}</strong>
                                <div style="--value: {{ $value }}%"></div>
                            </article>
                        @endforeach
                    </div>
                @endif

                <div class="player-stat-grid">
                    @foreach($allStats as $keyName => $stat)
                        @php $statValue = (int) $stat; @endphp
                        <article class="player-stat-row">
                            <div>
                                <strong>{{ trans('custom.'.strtolower((string) $keyName)) }}</strong>
                                <span>{{ $statValue }}</span>
                            </div>
                            <meter min="0" max="100" value="{{ $statValue }}">{{ $statValue }}</meter>
                        </article>
                    @endforeach
                </div>
            </div>
        </section>
    </main>
@stop
