@extends('v2.layout.layout')

@section('content')
    <main class="tournaments-page country-page">
        <section class="tournaments-hero">
            <div class="container">
                <div>
                    <span class="tournaments-kicker">{{ __('admin.country_overview') }}</span>
                    <h1>
                        @if($country['flagUrl'])
                            <img class="country-page-flag" src="{{ $country['flagUrl'] }}" alt="" loading="eager">
                        @endif
                        {{ $country['name'] }}
                    </h1>
                    <p>
                        {{ trim($country['region'].' / '.$country['code'], ' /') }}
                    </p>
                </div>
            </div>
        </section>

        <section class="tournaments-section">
            <div class="container">
                <article class="tournament-card tournament-card-focused">
                    <header class="tournament-card-head">
                        <div>
                            <span>{{ __('admin.country') }}</span>
                            <h2>{{ $country['name'] }}</h2>
                            <p>{{ __('admin.code') }}: {{ $country['code'] }}</p>
                        </div>

                        <dl>
                            <div>
                                <dt>{{ __('admin.cities') }}</dt>
                                <dd>{{ $summary['cities'] }}</dd>
                            </div>
                            <div>
                                <dt>{{ __('admin.leagues') }}</dt>
                                <dd>{{ $summary['leagues'] }}</dd>
                            </div>
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
                            @if($country['imageUrl'])
                                <img class="country-page-image" src="{{ $country['imageUrl'] }}" alt="{{ $country['name'] }}" loading="eager">
                            @endif

                            <div class="country-page-description">
                                {{ $country['descriptionHtml'] }}
                            </div>
                        </section>

                        <aside class="tournaments-control-panel country-page-side" aria-label="{{ __('admin.countries') }}">
                            <div class="standings-filter-field">
                                <span>{{ __('admin.leagues_in_country') }}</span>
                                <nav class="token-roadmap-intro-actions" aria-label="{{ __('admin.leagues_in_country') }}">
                                    @forelse($leagueLinks as $link)
                                        @if($link['url'])
                                            <a href="{{ $link['url'] }}">{{ $link['label'] }}</a>
                                        @else
                                            <span>{{ $link['label'] }}</span>
                                        @endif
                                    @empty
                                        <span>{{ __('admin.league') }}</span>
                                    @endforelse
                                </nav>
                            </div>

                            <div class="standings-filter-field">
                                <span>{{ __('admin.countries') }}</span>
                                <nav class="token-roadmap-intro-actions" aria-label="{{ __('admin.countries') }}">
                                    @foreach($countryLinks as $link)
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

                        <nav class="market-tabs country-page-tabs" aria-label="{{ __('admin.country_overview') }}">
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
                                            <th>{{ __('admin.city') }}</th>
                                            <th>{{ __('admin.league') }}</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @forelse(\Illuminate\Support\Arr::get($activeListing, 'results.data', []) as $club)
                                            <tr>
                                                <td><a class="country-page-table-link" href="{{ $club['url'] }}">{{ $club['name'] }}</a></td>
                                                <td>{{ $club['city'] ?: '-' }}</td>
                                                <td>{{ $club['league'] ?: '-' }}</td>
                                            </tr>
                                        @empty
                                            <tr>
                                                <td colspan="3"><div class="market-empty">{{ __('admin.clubs') }}</div></td>
                                            </tr>
                                        @endforelse
                                    </tbody>
                                @elseif($activeListing['tab'] === 'players')
                                    <thead>
                                        <tr>
                                            <th>{{ __('admin.players') }}</th>
                                            <th>{{ __('admin.clubs') }}</th>
                                            <th>{{ __('admin.city') }}</th>
                                            <th>{{ __('Position') }}</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @forelse(\Illuminate\Support\Arr::get($activeListing, 'results.data', []) as $player)
                                            <tr>
                                                <td><a class="country-page-table-link" href="{{ $player['url'] }}">{{ $player['name'] }}</a></td>
                                                <td>{{ $player['club'] ?: '-' }}</td>
                                                <td>{{ $player['city'] ?: '-' }}</td>
                                                <td>{{ $player['position'] ?: '-' }}</td>
                                            </tr>
                                        @empty
                                            <tr>
                                                <td colspan="4"><div class="market-empty">{{ __('admin.players') }}</div></td>
                                            </tr>
                                        @endforelse
                                    </tbody>
                                @else
                                    <thead>
                                        <tr>
                                            <th>{{ __('admin.city') }}</th>
                                            <th>{{ __('Latitude') }}</th>
                                            <th>{{ __('Longitude') }}</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @forelse(\Illuminate\Support\Arr::get($activeListing, 'results.data', []) as $city)
                                            <tr>
                                                <td><a class="country-page-table-link" href="{{ $city['url'] }}">{{ $city['name'] }}</a></td>
                                                <td>{{ $city['latitude'] ?? '-' }}</td>
                                                <td>{{ $city['longitude'] ?? '-' }}</td>
                                            </tr>
                                        @empty
                                            <tr>
                                                <td colspan="3"><div class="market-empty">{{ __('admin.city') }}</div></td>
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
