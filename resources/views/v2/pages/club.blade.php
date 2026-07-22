@extends('v2.layout.layout')

@section('content')
    @php
        $clubName = \Illuminate\Support\Arr::get($club, 'name');
        $clubLogo = \Illuminate\Support\Arr::get($club, 'logoUrl');
        $stadiumName = \Illuminate\Support\Arr::get($club, 'stadium.name');
        $stadiumImage = \Illuminate\Support\Arr::get($club, 'stadium.imageUrl');
        $players = collect(\Illuminate\Support\Arr::get($club, 'players', []));
        $compareOptions = collect(\Illuminate\Support\Arr::get($club, 'compareOptions', []));
        $squadMarketValue = $players->sum(fn (array $player): int => (int) \Illuminate\Support\Arr::get($player, 'market_value', 0));
        $location = collect([
            \Illuminate\Support\Arr::get($club, 'city.name'),
            \Illuminate\Support\Arr::get($club, 'country.name'),
        ])->filter()->implode(', ');
    @endphp

    <main class="club-detail-page">
        <section class="club-detail-hero">
            <div class="container club-detail-hero-grid">
                <header class="club-detail-heading">
                    <span>{{ trans('custom.club_details') }}</span>
                    <h1>{{ $clubName }}</h1>
                    @if($location !== '')
                        <p>{{ $location }}</p>
                    @endif

                    <dl class="club-detail-hero-stats">
                        @if(is_string($stadiumName) && $stadiumName !== '')
                            <div>
                                <dt>{{ trans('custom.stadium') }}</dt>
                                <dd>{{ $stadiumName }}</dd>
                            </div>
                        @endif
                        <div>
                            <dt>{{ trans('admin.players') }}</dt>
                            <dd>{{ $players->count() }}</dd>
                        </div>
                        <div>
                            <dt>{{ trans('custom.market_value') }}</dt>
                            <dd>{{ number_format($squadMarketValue) }}</dd>
                        </div>
                        @if($compareOptions->isNotEmpty())
                            <div class="club-detail-compare-stat">
                                <dt>{{ __('Compare') }}</dt>
                                <dd>
                                    <form class="club-compare-form" data-club-compare-form>
                                        <div class="club-compare-control">
                                            <input
                                                id="clubCompareSearch"
                                                type="text"
                                                name="opponent"
                                                list="clubCompareOptions"
                                                placeholder="{{ __('Search club') }}"
                                                aria-label="{{ __('Choose comparison club') }}"
                                                autocomplete="off"
                                                data-club-compare-input
                                            >
                                            <button type="submit">{{ __('Compare') }}</button>
                                        </div>

                                        <datalist id="clubCompareOptions">
                                            @foreach($compareOptions as $option)
                                                <option
                                                    value="{{ \Illuminate\Support\Arr::get($option, 'name') }}"
                                                    data-url="{{ \Illuminate\Support\Arr::get($option, 'compareUrl') }}"
                                                ></option>
                                            @endforeach
                                        </datalist>
                                    </form>
                                </dd>
                            </div>
                        @endif
                    </dl>
                </header>

                <aside class="club-detail-crest-card">
                    @if(is_string($clubLogo) && $clubLogo !== '')
                        <figure class="club-detail-crest">
                            <img src="{{ $clubLogo }}" alt="{{ $clubName }}">
                        </figure>
                    @endif
                    <strong>{{ $clubName }}</strong>
                    @if($location !== '')
                        <span>{{ $location }}</span>
                    @endif
                </aside>
            </div>
        </section>

        <section class="club-detail-section">
            <div class="container club-detail-layout">
                <article class="club-detail-main">
                    <header class="club-detail-section-head">
                        <span>{{ trans('custom.stadium') }}</span>
                        <h2>{{ $stadiumName }}</h2>
                    </header>

                    <dl class="club-detail-facts">
                        @if($location !== '')
                            <div>
                                <dt>{{ trans('custom.location') }}</dt>
                                <dd>{{ $location }}</dd>
                            </div>
                        @endif
                        @if(\Illuminate\Support\Arr::get($club, 'stadium.capacity'))
                            <div>
                                <dt>{{ trans('custom.capacity') }}</dt>
                                <dd>{{ number_format((int) \Illuminate\Support\Arr::get($club, 'stadium.capacity')) }}</dd>
                            </div>
                        @endif
                        @if(\Illuminate\Support\Arr::get($club, 'stadium.opening'))
                            <div>
                                <dt>{{ trans('custom.opening') }}</dt>
                                <dd>{{ \Illuminate\Support\Arr::get($club, 'stadium.opening') }}</dd>
                            </div>
                        @endif
                    </dl>

                    @if(is_string($stadiumImage) && $stadiumImage !== '')
                        <figure class="club-detail-stadium">
                            <img src="{{ $stadiumImage }}" alt="{{ $stadiumName }}" loading="lazy">
                        </figure>
                    @endif
                </article>

                <aside class="club-detail-summary">
                    <span>{{ trans('custom.squad') }}</span>
                    <dl>
                        <div>
                            <dt>{{ trans('admin.players') }}</dt>
                            <dd>{{ $players->count() }}</dd>
                        </div>
                        <div>
                            <dt>{{ trans('admin.total_players_market_value') }}</dt>
                            <dd>{{ number_format($squadMarketValue) }}</dd>
                        </div>
                    </dl>
                </aside>
            </div>
        </section>

        <section class="club-detail-section squad-section">
            <div class="container">
                <header class="club-detail-section-head">
                    <span>{{ trans('custom.squad') }}</span>
                    <h2>{{ $clubName }}</h2>
                </header>

                <div class="club-squad-list">
                    @forelse($players as $player)
                        <article class="club-player-row">
                            <a class="club-player-identity" href="{{ public_route('pages.player.details', ['uuid' => \Illuminate\Support\Arr::get($player, 'uuid')]) }}">
                                <img src="{{ \Illuminate\Support\Arr::get($player, 'imageUrl') }}" alt="{{ \Illuminate\Support\Arr::get($player, 'name') }}" loading="lazy">
                                <strong>{{ \Illuminate\Support\Arr::get($player, 'name') }}</strong>
                            </a>

                            <span>{{ \Illuminate\Support\Arr::get($player, 'player_position.short_name') }}</span>
                            <span>{{ \Illuminate\Support\Arr::get($player, 'age') }} {{ trans('custom.yo') }}</span>
                            <span class="club-player-value">{{ number_format((int) \Illuminate\Support\Arr::get($player, 'market_value', 0)) }}</span>
                            <span>{{ \Illuminate\Support\Arr::get($player, 'formattedHeight') }} / {{ \Illuminate\Support\Arr::get($player, 'formattedWeight') }}</span>
                            <span>{{ \Illuminate\Support\Arr::get($player, 'city.name') }}, {{ \Illuminate\Support\Arr::get($player, 'country.name') }}</span>
                        </article>
                    @empty
                        <p class="club-detail-empty">{{ trans('admin.no_results') }}</p>
                    @endforelse
                </div>
            </div>
        </section>
    </main>

@stop
