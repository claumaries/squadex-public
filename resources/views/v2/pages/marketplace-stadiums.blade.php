@extends('v2.layout.layout')

@section('content')
    <main class="market-page">
        <section class="market-hero">
            <div class="container">
                <div class="market-heading">
                    <div>
                        <h1>{{ trans('custom.stadium_marketplace') }}</h1>
                        <p>{{ __('Browse stadium assets by capacity, opening year and asking price for long-term club growth.') }}</p>
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
                <div class="market-card-grid stadium-grid">
                    @forelse(\Illuminate\Support\Arr::get($results, 'data', []) as $result)
                        <article class="market-asset-card stadium-card">
                            <figure class="market-asset-media">
                                <img src="{{ \Illuminate\Support\Arr::get($result, 'imageUrl') }}" alt="{{ \Illuminate\Support\Arr::get($result, 'name') }}" loading="lazy">
                                <figcaption>{{ trans('custom.capacity') }} {{ number_format((int) \Illuminate\Support\Arr::get($result, 'capacity', 0)) }}</figcaption>
                            </figure>

                            <div class="market-asset-body">
                                <div>
                                    <h2>{{ \Illuminate\Support\Arr::get($result, 'name') }}</h2>
                                    <p>{{ trans('custom.opening') }} {{ \Illuminate\Support\Arr::get($result, 'opening') }}</p>
                                </div>

                                <dl class="market-asset-stats">
                                    <div>
                                        <dt>{{ trans('custom.capacity') }}</dt>
                                        <dd>{{ number_format((int) \Illuminate\Support\Arr::get($result, 'capacity', 0)) }}</dd>
                                    </div>
                                    <div>
                                        <dt>{{ trans('custom.asking_price') }}</dt>
                                        <dd>
                                            @include('v2.partials.marketplace-price', ['price' => \Illuminate\Support\Arr::get($result, 'price')])
                                        </dd>
                                    </div>
                                </dl>

                                <a href="{{ auth_app_url('register') }}" class="market-buy-btn">
                                    {{ trans('custom.buy') }} <span>&#8599;</span>
                                </a>
                            </div>
                        </article>
                    @empty
                        <div class="market-empty">{{ __('No stadiums are currently listed.') }}</div>
                    @endforelse
                </div>

                @include('v2.partials.marketplace-pagination')
            </div>
        </section>
    </main>
@stop
