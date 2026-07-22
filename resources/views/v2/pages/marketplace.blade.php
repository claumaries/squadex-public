@extends('v2.layout.layout')

@section('content')
    <main class="market-page">
        <section class="market-hero">
            <div class="container">
                <div class="market-heading">
                    <div>
                        <h1>{{ trans('custom.player_marketplace') }}</h1>
                        <p>{{ __('Scout listed players, compare ratings, review market value and secure new talent for your club.') }}</p>
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
                <div class="market-card-grid">
                    @forelse(\Illuminate\Support\Arr::get($results, 'data', []) as $result)
                        <article class="market-asset-card player-card">
                            <figure class="market-asset-media">
                                <img src="{{ \Illuminate\Support\Arr::get($result, 'imageUrl') }}" alt="{{ \Illuminate\Support\Arr::get($result, 'name') }}" loading="lazy">
                                <figcaption>{{ trans('custom.overall_rating') }} {{ \Illuminate\Support\Arr::get($result, 'overallRating') }}</figcaption>
                            </figure>

                            <div class="market-asset-body">
                                <div>
                                    <h2>
                                        <a href="{{ public_route('pages.player.details', ['uuid' => \Illuminate\Support\Arr::get($result, 'uuid')]) }}">
                                            {{ \Illuminate\Support\Arr::get($result, 'name') }}
                                        </a>
                                    </h2>
                                    <p>{{ \Illuminate\Support\Arr::get($result, 'age') }} {{ trans('custom.yo') }}</p>
                                </div>

                                <dl class="market-asset-stats">
                                    <div>
                                        <dt>{{ trans('custom.asking_price') }}</dt>
                                        <dd>
                                            @include('v2.partials.marketplace-price', ['price' => \Illuminate\Support\Arr::get($result, 'price')])
                                        </dd>
                                    </div>
                                    <div>
                                        <dt>{{ trans('custom.market_value') }}</dt>
                                        <dd>{{ \Illuminate\Support\Arr::get($result, 'marketValueFormatted') }}</dd>
                                    </div>
                                </dl>

                                <a href="{{ auth_app_url('register') }}" class="market-buy-btn">
                                    {{ trans('custom.buy') }} <span>&#8599;</span>
                                </a>
                            </div>
                        </article>
                    @empty
                        <div class="market-empty">{{ __('No players are currently listed.') }}</div>
                    @endforelse
                </div>

                @include('v2.partials.marketplace-pagination')
            </div>
        </section>
    </main>
@stop
