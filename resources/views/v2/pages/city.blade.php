@extends('v2.layout.layout')

@section('content')
    <main class="tournaments-page city-page">
        <section class="tournaments-hero">
            <div class="container">
                <div>
                    <span class="tournaments-kicker">{{ __('admin.city_overview') }}</span>
                    <h1>{{ $city['name'] }}</h1>
                    <p>
                        <a class="city-page-country-link" href="{{ $city['countryUrl'] }}">{{ $city['country'] }}</a>
                    </p>
                </div>
            </div>
        </section>

        <section class="tournaments-section">
            <div class="container">
                <article class="tournament-card tournament-card-focused">
                    <header class="tournament-card-head">
                        <div>
                            <span>{{ __('admin.city') }}</span>
                            <h2>{{ $city['name'] }}</h2>
                            <p>{{ $city['country'] }}</p>
                        </div>

                        <dl>
                            <div>
                                <dt>{{ __('admin.clubs') }}</dt>
                                <dd>{{ $summary['clubs'] }}</dd>
                            </div>
                            <div>
                                <dt>{{ __('admin.players') }}</dt>
                                <dd>{{ $summary['players'] }}</dd>
                            </div>
                        </dl>
                    </header>

                    <div class="country-page-grid">
                        <section class="country-page-main">
                            <div class="country-page-description">
                                {{ $city['descriptionHtml'] }}
                            </div>

                            <dl class="city-page-coordinates">
                                <div>
                                    <dt>{{ __('Latitude') }}</dt>
                                    <dd>{{ $city['latitude'] ?? '-' }}</dd>
                                </div>
                                <div>
                                    <dt>{{ __('Longitude') }}</dt>
                                    <dd>{{ $city['longitude'] ?? '-' }}</dd>
                                </div>
                            </dl>
                        </section>

                        <aside class="tournaments-control-panel country-page-side" aria-label="{{ __('admin.other_cities_in_country') }}">
                            <div class="standings-filter-field">
                                <span>{{ __('admin.other_cities_in_country') }}</span>
                                <nav class="token-roadmap-intro-actions" aria-label="{{ __('admin.other_cities_in_country') }}">
                                    @foreach($otherCityLinks as $link)
                                        <a @class(['active' => $link['active']]) href="{{ $link['url'] }}" @if($link['active']) aria-current="page" @endif>{{ $link['label'] }}</a>
                                    @endforeach
                                </nav>
                            </div>
                        </aside>
                    </div>

                    <section class="country-page-listing">
                        <div class="tournament-panel-title">
                            <h3>{{ $activeListing['title'] }}</h3>
                            <span>{{ __(':count total', ['count' => \Illuminate\Support\Arr::get($activeListing, 'results.total', 0)]) }}</span>
                        </div>

                        <nav class="market-tabs country-page-tabs" aria-label="{{ __('admin.city_overview') }}">
                            @foreach($listingTabs as $tab)
                                <a @class(['active' => $tab['active']]) href="{{ $tab['url'] }}" @if($tab['active']) aria-current="page" @endif>
                                    <span>{{ $tab['short'] }}</span>
                                    {{ $tab['label'] }}
                                </a>
                            @endforeach
                        </nav>

                        <div class="market-table-shell country-page-table-shell">
                            <table class="market-table country-page-table">
                                @if($activeListing['tab'] === 'clubs')
                                    <thead>
                                        <tr>
                                            <th>{{ __('admin.clubs') }}</th>
                                            <th>{{ __('admin.league') }}</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @forelse(\Illuminate\Support\Arr::get($activeListing, 'results.data', []) as $club)
                                            <tr>
                                                <td><a class="country-page-table-link" href="{{ $club['url'] }}">{{ $club['name'] }}</a></td>
                                                <td>{{ $club['league'] ?: '-' }}</td>
                                            </tr>
                                        @empty
                                            <tr>
                                                <td colspan="2"><div class="market-empty">{{ __('admin.clubs') }}</div></td>
                                            </tr>
                                        @endforelse
                                    </tbody>
                                @else
                                    <thead>
                                        <tr>
                                            <th>{{ __('admin.players') }}</th>
                                            <th>{{ __('admin.clubs') }}</th>
                                            <th>{{ __('Position') }}</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @forelse(\Illuminate\Support\Arr::get($activeListing, 'results.data', []) as $player)
                                            <tr>
                                                <td><a class="country-page-table-link" href="{{ $player['url'] }}">{{ $player['name'] }}</a></td>
                                                <td>{{ $player['club'] ?: '-' }}</td>
                                                <td>{{ $player['position'] ?: '-' }}</td>
                                            </tr>
                                        @empty
                                            <tr>
                                                <td colspan="3"><div class="market-empty">{{ __('admin.players') }}</div></td>
                                            </tr>
                                        @endforelse
                                    </tbody>
                                @endif
                            </table>
                        </div>

                        @include('v2.partials.marketplace-pagination', [
                            'results' => $activeListing['results'],
                            'paginationLabel' => $activeListing['title'].' pagination',
                        ])
                    </section>
                </article>
            </div>
        </section>
    </main>
@stop
