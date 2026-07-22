@extends('v2.layout.layout')

@section('content')
    @php
        $tokenName = config('app.token_name');
        $tokenSymbol = config('blockchain.token_name_short') ?: $tokenName;
        $tokenPrice = (float) config('blockchain.token_price');
        $contractAddress = data_get($smartContract ?? [], 'contract_eth_address');
        $contractIsReady = filled($contractAddress) && filled(data_get($smartContract ?? [], 'abi'));
        $tokenUtilities = [ __('Club ownership and long-term squad development'), __('Marketplace activity for players, clubs and ecosystem assets'), __('Tournament participation and platform reward mechanics'), __('Future access to selected premium ecosystem features'),
        ];
        $tokenNotices = [ __('Token information should always be verified through official Squadex channels.'), __('Digital assets can be volatile and involve market, technical and regulatory risk.'), __('This page is informational and does not constitute financial advice.'),
        ];
    @endphp

    <main class="public-token-page" data-token-calculator data-token-price="{{ $tokenPrice }}">
        <section class="public-token-body">
            <div class="container tokenomics-stack">
                <section class="public-token-intro" aria-labelledby="public-token-title">
                    <div>
                        <span class="tokenomics-kicker">{{ __(':symbol Token', ['symbol' => $tokenSymbol]) }}</span>
                        <h1 id="public-token-title">{{ trans('custom.token_name_buy', ['token_name' => $tokenName]) }}</h1>
                        <div class="public-token-copy">
                            {!! trans('custom.token_name_description', ['token_name' => $tokenName]) !!}
                        </div>
                    </div>
                    <aside class="public-token-status" aria-label="{{ __('Token status') }}">
                        <x-token-logo class="public-token-logo" :size="82" />
                        <dl>
                            <div>
                                <dt>{{ __('Network') }}</dt>
                                <dd>{{ __('BNB Smart Chain') }}</dd>
                            </div>
                            <div>
                                <dt>{{ __('Token symbol') }}</dt>
                                <dd>{{ $tokenSymbol }}</dd>
                            </div>
                            <div>
                                <dt>{{ __('Contract') }}</dt>
                                <dd>{{ $contractIsReady ? 'Configured' : 'Coming soon' }}</dd>
                            </div>
                        </dl>
                    </aside>
                </section>

                <section class="public-token-grid" aria-label="{{ $tokenName }} token purchase information">
                    <article class="tokenomics-panel public-token-calculator" aria-labelledby="token-calculator-title">
                        <div class="tokenomics-section-head">
                            <span class="tokenomics-kicker">{{ __('Calculator') }}</span>
                            <h2 id="token-calculator-title">{{ trans('custom.token_name', ['token_name' => $tokenName]) }}</h2>
                        </div>

                        <div id="amountNotSet" class="public-token-alert" role="alert" hidden>
                            {{ trans('custom.token_select_amount') }}
                        </div>

                        <div class="public-token-form-grid">
                            <label class="public-token-field" for="youPayEth">
                                <span>{{ trans('custom.token_pay') }}</span>
                                <input
                                    id="youPayEth"
                                    min="{{ $tokenPrice }}"
                                    step="{{ $tokenPrice }}"
                                    type="number"
                                    inputmode="decimal"
                                    placeholder="0.00"
                                >
                            </label>
                            <div class="public-token-asset">
                                <span class="public-token-coin" aria-hidden="true">{{ __('BNB') }}</span>
                                <strong>{{ __('BNB') }}</strong>
                            </div>

                            <label class="public-token-field" for="youReceiveToken">
                                <span>{{ trans('custom.token_receive') }}</span>
                                <input
                                    id="youReceiveToken"
                                    min="1"
                                    type="number"
                                    inputmode="decimal"
                                    placeholder="0"
                                >
                            </label>
                            <div class="public-token-asset">
                                <x-token-logo :size="30" />
                                <strong>{{ $tokenSymbol }}</strong>
                            </div>
                        </div>

                        <div class="public-token-rate">
                            <span>{{ __('Current rate') }}</span>
                            <strong>{{ __('1 :symbol = :price BNB', ['symbol' => $tokenSymbol, 'price' => config('blockchain.token_price')]) }}</strong>
                        </div>

                        <p class="tokenomics-note">
                            {{ trans('custom.token_minimum_text', ['token_name' => $tokenName]) }}
                        </p>

                        <div class="public-token-actions">
                            <a class="buy-token-btn" href="{{ auth_app_url('login') }}">
                                {{ trans('custom.top_menu.login') }}
                            </a>
                        </div>
                    </article>

                    <aside class="tokenomics-panel public-token-info" aria-labelledby="token-details-title">
                        <span class="tokenomics-kicker">{{ __('Utility') }}</span>
                        <h2 id="token-details-title">{{ __(':token in the Squadex ecosystem', ['token' => $tokenName]) }}</h2>
                        <p>
                            {{ __(':token is intended to support practical activity inside the Squadex football management ecosystem. Token details, contract information and launch updates should be verified through official Squadex sources.', ['token' => $tokenName]) }}
                        </p>

                        <ul class="tokenomics-check-list">
                            @foreach ($tokenUtilities as $utility)
                                <li>{{ $utility }}</li>
                            @endforeach
                        </ul>
                    </aside>
                </section>

                <section class="tokenomics-panel" aria-labelledby="official-token-links">
                    <div class="tokenomics-section-head">
                        <span class="tokenomics-kicker">{{ __('Official Information') }}</span>
                        <h2 id="official-token-links">{{ __('Verify before you interact') }}</h2>
                    </div>
                    <div class="token-roadmap-principles">
                        <article>
                            <h3>{{ __('Tokenomics') }}</h3>
                            <p><a href="{{ public_route('pages.tokenomics') }}">{{ __('View token supply and allocation') }}</a></p>
                        </article>
                        <article>
                            <h3>{{ __('Roadmap') }}</h3>
                            <p><a href="{{ public_route('pages.token-roadmap') }}">{{ __('Review planned token milestones') }}</a></p>
                        </article>
                        <article>
                            <h3>{{ __('Transparency') }}</h3>
                            <p><a href="{{ public_route('pages.token-transparency') }}">{{ __('Check official update policy') }}</a></p>
                        </article>
                        <article>
                            <h3>{{ __('Whitepaper') }}</h3>
                            <p><a href="{{ public_route('pages.whitepaper') }}">{{ __('Read the project overview') }}</a></p>
                        </article>
                    </div>
                </section>

                <section class="tokenomics-risk" aria-labelledby="token-risk-notice">
                    <span class="tokenomics-kicker">{{ __('Risk Notice') }}</span>
                    <h2 id="token-risk-notice">{{ __('Important token notice') }}</h2>
                    <ul class="tokenomics-check-list">
                        @foreach ($tokenNotices as $notice)
                            <li>{{ $notice }}</li>
                        @endforeach
                    </ul>
                </section>
            </div>
        </section>
    </main>

@stop
