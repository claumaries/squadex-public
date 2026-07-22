@extends('v2.layout.layout')

@section('content')
    <main class="market-page">
        <section class="market-hero">
            <div class="container">
                <div class="market-heading">
                    <div>
                        <h1>{{ trans('custom.club_marketplace') }}</h1>
                        <p>{{ __('Acquire listed clubs with established locations, league access and operational football infrastructure.') }}</p>
                    </div>
                    <span class="market-count">
                        {{ __(':count assets', ['count' => \Illuminate\Support\Arr::get($results, 'total', 0)]) }}
                    </span>
                </div>

                @include('v2.partials.marketplace-tabs')
            </div>
        </section>

        <section class="market-section">
            <div class="container">
                <div class="market-table-shell">
                    <table class="market-table">
                        <thead>
                            <tr>
                                <th>{{ trans('custom.name') }}</th>
                                <th>{{ trans('custom.location') }}</th>
                                <th>{{ trans('custom.league') }}</th>
                                <th>{{ trans('custom.asking_price') }}</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse(\Illuminate\Support\Arr::get($results, 'data', []) as $result)
                                <tr>
                                    <td>
                                        <a class="market-identity" href="{{ public_route('page.club.details', club_route_parameters($result)) }}">
                                            <img src="{{ \Illuminate\Support\Arr::get($result, 'logoUrl') }}" alt="{{ \Illuminate\Support\Arr::get($result, 'name') }}" loading="lazy">
                                            <strong>{{ \Illuminate\Support\Arr::get($result, 'name') }}</strong>
                                        </a>
                                    </td>
                                    <td>{{ \Illuminate\Support\Arr::get($result, 'city.name') }}, {{ \Illuminate\Support\Arr::get($result, 'country.name') }}</td>
                                    <td>{{ \Illuminate\Support\Arr::get($result, 'league.name') }}</td>
                                    <td>
                                        <strong>
                                            @include('v2.partials.marketplace-price', ['price' => \Illuminate\Support\Arr::get($result, 'price')])
                                        </strong>
                                    </td>
                                    <td>
                                        <a href="{{ auth_app_url('register') }}" class="market-buy-btn compact">
                                            {{ trans('custom.buy') }} <span>&#8599;</span>
                                        </a>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="5">
                                        <div class="market-empty">{{ __('No clubs are currently listed.') }}</div>
                                    </td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>

                @include('v2.partials.marketplace-pagination')
            </div>
        </section>
    </main>
@stop
