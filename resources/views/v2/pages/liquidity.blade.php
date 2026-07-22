@extends('v2.layout.layout')

@section('content')
    @php
        $liquidityStatus = [
            'Liquidity Status' => __('Coming soon'),
            'Token Symbol' => '$SQUADEX',
            'Network' => 'TBC',
            'Official Token Contract' => __('Coming soon'),
            'Primary Trading Pair' => 'TBC',
            'Liquidity Pool Address' => __('Coming soon'),
            'DEX / Platform' => 'TBC',
            'Initial Liquidity' => 'TBC',
            'Liquidity Lock Status' => 'TBC',
            'Lock Duration' => 'TBC',
            'Lock Provider' => 'TBC',
            'Launch Status' => __('Not launched'),
        ];

        $liquidityMeaning = [ __('Enables token swaps'), __('Supports trading pairs'), __('Helps reduce extreme slippage'), __('Requires verified pool information'), __('Can change over time'), __('Does not remove market risk'),
        ];

        $officialLiquidity = [
            'Network' => 'TBC',
            'DEX / Platform' => 'TBC',
            'Trading Pair' => 'TBC',
            'Token Contract' => __('Coming soon'),
            'Pool Address' => __('Coming soon'),
            'Initial Liquidity' => 'TBC',
            'Liquidity Lock Status' => 'TBC',
            'Lock Expiry' => 'TBC',
            'Explorer Link' => __('Coming soon'),
            'DEX Link' => __('Coming soon'),
        ];

        $verificationChecklist = [ __('Confirm the pool is listed on the official Squadex website.'), __('Confirm the token contract address matches the Contract page.'), __('Confirm the blockchain network is correct.'), __('Confirm the trading pair is official.'), __('Confirm the DEX or platform link is official.'), __('Confirm the pool address matches the published details.'), __('Check the explorer link where available.'), __('Avoid unofficial pool links shared in private messages or groups.'),
        ];

        $lockInformation = [
            'Lock Status' => 'TBC',
            'Lock Provider' => 'TBC',
            'Lock Duration' => 'TBC',
            'Lock Start Date' => 'TBC',
            'Lock End Date' => 'TBC',
            'Locked Percentage' => 'TBC',
            'Lock Proof Link' => __('Coming soon'),
        ];

        $tradingPairInformation = [
            'Primary Pair' => 'TBC',
            'Secondary Pair' => 'TBC',
            'Base Asset' => '$SQUADEX',
            'Quote Asset' => 'TBC',
            'DEX' => 'TBC',
            'Network' => 'TBC',
        ];

        $slippageGuidance = [ __('Review slippage before confirming a swap.'), __('Check the final token amount received.'), __('Avoid rushing transactions.'), __('Be careful with very small or unknown liquidity pools.'), __('Understand that network fees and market volatility can affect the final outcome.'),
        ];

        $liquidityRisks = [ __('Liquidity may be limited.'), __('Slippage may be high.'), __('Price impact may be significant.'), __('Trading may be volatile.'), __('Pools may change over time.'), __('DEX links can be impersonated.'), __('Smart contract risks may exist.'), __('Transactions may be irreversible.'),
        ];

        $providerRisks = [ __('Impermanent loss'), __('Smart contract risk'), __('Token volatility'), __('Pool imbalance'), __('Reward uncertainty'), __('Withdrawal timing'), __('Fake pool links'),
        ];

        $officialLinks = [
            ['label' => __('Token Contract'), 'value' => __('/contract'), 'href' => public_route('pages.contract')],
            ['label' => __('How to Buy'), 'value' => __('/how-to-buy'), 'href' => public_route('pages.how-to-buy')],
            ['label' => __('Token Transparency'), 'value' => __('/token-transparency'), 'href' => public_route('pages.token-transparency')],
            ['label' => __('Tokenomics'), 'value' => __('/tokenomics'), 'href' => public_route('pages.tokenomics')],
            ['label' => __('Presale'), 'value' => __('/presale'), 'href' => public_route('pages.presale')],
            ['label' => __('DEX Link'), 'value' => __('Coming soon'), 'href' => null],
            ['label' => __('Pool Address'), 'value' => __('Coming soon'), 'href' => null],
            ['label' => __('Lock Proof'), 'value' => __('Coming soon'), 'href' => null],
            ['label' => __('Explorer Link'), 'value' => __('Coming soon'), 'href' => null],
        ];

        $scamWarnings = [ __('Do not trust pool links from private messages.'), __('Do not rely on screenshots of liquidity pool addresses.'), __('Do not buy from unverified trading pairs.'), __('Do not connect your wallet to unofficial DEX links.'), __('Do not sign unknown wallet permissions.'), __('Do not assume a token is official because it has the same name.'), __('Do not rely only on token logos or tickers.'), __('Always check the official Squadex Contract page first.'),
        ];

        $faqItems = [
            [
                'question' => __('Is Squadex liquidity live?'),
                'answer' => __('Official liquidity status will be confirmed on this page and through official Squadex communication channels.'),
            ],
            [
                'question' => __('Where will the official liquidity pool be published?'),
                'answer' => __('Official pool details will be published on the Squadex website, including the token contract, network, trading pair and pool address where applicable.'),
            ],
            [
                'question' => __('What is a liquidity lock?'),
                'answer' => __('A liquidity lock is a mechanism that restricts access to liquidity for a defined period. It can improve transparency, but it does not remove all risk.'),
            ],
            [
                'question' => __('Does liquidity guarantee token price stability?'),
                'answer' => __('No. Liquidity can support trading, but it does not guarantee price stability, returns or market performance.'),
            ],
            [
                'question' => __('What is slippage?'),
                'answer' => __('Slippage is the difference between the expected swap price and the final executed price. It can increase when liquidity is low or market movement is high.'),
            ],
            [
                'question' => __('Can I provide liquidity to Squadex?'),
                'answer' => __('Community liquidity provision details, if supported, will be published through official Squadex channels.'),
            ],
            [
                'question' => __('How do I avoid fake liquidity pools?'),
                'answer' => __('Always verify the official contract address, trading pair, pool address and DEX link through the Squadex website before interacting.'),
            ],
            [
                'question' => __('Is this financial advice?'),
                'answer' => __('No. This page is for informational purposes only.'),
            ],
        ];
    @endphp

    <main class="token-roadmap-page">
        <section class="token-roadmap-body">
            <div class="container tokenomics-stack">
                <section class="token-roadmap-intro" aria-labelledby="liquidity-title">
                    <span class="tokenomics-kicker">{{ __('Liquidity') }}</span>
                    <h1 id="liquidity-title">{{ __('Squadex Liquidity') }}</h1>
                    <p>
                        {{ __('This page explains how Squadex plans to publish official liquidity information, including liquidity pools, trading pairs, lock status and related token market risks.') }}
                    </p>
                    <strong>
                        {{ __('This page is for informational purposes only and does not constitute financial advice. Liquidity details, trading pairs, DEX links and lock information may change before launch.') }}
                    </strong>
                    <nav class="token-roadmap-intro-actions" aria-label="{{ __('Liquidity quick links') }}">
                        <a href="{{ public_route('pages.token-transparency') }}">{{ __('View Token Transparency') }}</a>
                        <a href="{{ public_route('pages.contract') }}">{{ __('View Contract') }}</a>
                    </nav>
                </section>

                <section class="tokenomics-panel" aria-labelledby="liquidity-status">
                    <span class="tokenomics-kicker">{{ __('Status') }}</span>
                    <h2 id="liquidity-status">{{ __('Liquidity Status') }}</h2>
                    <dl class="tokenomics-overview-grid liquidity-status-grid">
                        @foreach ($liquidityStatus as $label => $value)
                            <div>
                                <dt>{{ $label }}</dt>
                                <dd>{{ $value }}</dd>
                            </div>
                        @endforeach
                    </dl>
                    <p class="tokenomics-note">
                        {{ __('Do not interact with any liquidity pool claiming to be Squadex unless the pool address, token contract and trading pair are published on the official Squadex website.') }}
                    </p>
                </section>

                <section class="tokenomics-panel" aria-labelledby="what-liquidity-means">
                    <span class="tokenomics-kicker">{{ __('Overview') }}</span>
                    <h2 id="what-liquidity-means">{{ __('What Liquidity Means') }}</h2>
                    <p>
                        {{ __('Liquidity refers to the availability of tokens and paired assets in a trading pool or market. Higher liquidity can make it easier for users to buy and sell a token, but it does not guarantee price stability, returns or market performance.') }}
                    </p>
                    <ul class="tokenomics-check-list">
                        @foreach ($liquidityMeaning as $item)
                            <li>{{ $item }}</li>
                        @endforeach
                    </ul>
                </section>

                <section class="tokenomics-panel" aria-labelledby="official-liquidity-information">
                    <span class="tokenomics-kicker">{{ __('Official Details') }}</span>
                    <h2 id="official-liquidity-information">{{ __('Official Liquidity Information') }}</h2>
                    <div class="tokenomics-table-wrap">
                        <table class="tokenomics-table">
                            <thead>
                                <tr>
                                    <th scope="col">{{ __('Field') }}</th>
                                    <th scope="col">{{ __('Value') }}</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($officialLiquidity as $field => $value)
                                    <tr>
                                        <th scope="row">{{ $field }}</th>
                                        <td>{{ $value }}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    <p class="tokenomics-note">
                        {{ __('Final liquidity details will be published only through official Squadex channels. Users should verify the token contract, pool address and trading pair before interacting with any market.') }}
                    </p>
                </section>

                <section class="tokenomics-panel" aria-labelledby="liquidity-pool-verification">
                    <span class="tokenomics-kicker">{{ __('Verification') }}</span>
                    <h2 id="liquidity-pool-verification">{{ __('Liquidity Pool Verification') }}</h2>
                    <p>
                        {{ __('Before interacting with any Squadex liquidity pool, users should verify that the pool uses the official token contract, correct network and official trading pair.') }}
                    </p>
                    <ul class="tokenomics-check-list">
                        @foreach ($verificationChecklist as $item)
                            <li>{{ $item }}</li>
                        @endforeach
                    </ul>
                </section>

                <section class="tokenomics-panel" aria-labelledby="liquidity-lock-information">
                    <span class="tokenomics-kicker">{{ __('Lock Status') }}</span>
                    <h2 id="liquidity-lock-information">{{ __('Liquidity Lock Information') }}</h2>
                    <p>
                        {{ __('Liquidity lock information helps users understand whether a liquidity position is locked, for how long, and through which lock provider. If Squadex uses a liquidity lock, the official lock information will be published here once confirmed.') }}
                    </p>
                    <dl class="tokenomics-overview-grid">
                        @foreach ($lockInformation as $label => $value)
                            <div>
                                <dt>{{ $label }}</dt>
                                <dd>{{ $value }}</dd>
                            </div>
                        @endforeach
                    </dl>
                    <p class="tokenomics-note">
                        {{ __('A liquidity lock can improve transparency, but it does not remove all market, technical or smart contract risk.') }}
                    </p>
                </section>

                <section class="tokenomics-panel" aria-labelledby="trading-pair-information">
                    <span class="tokenomics-kicker">{{ __('Pairs') }}</span>
                    <h2 id="trading-pair-information">{{ __('Trading Pair Information') }}</h2>
                    <p>
                        {{ __('A trading pair defines which asset Squadex may be paired with for swaps, such as a stablecoin or network-native asset. The final trading pair will be confirmed before launch.') }}
                    </p>
                    <dl class="tokenomics-overview-grid">
                        @foreach ($tradingPairInformation as $label => $value)
                            <div>
                                <dt>{{ $label }}</dt>
                                <dd>{{ $value }}</dd>
                            </div>
                        @endforeach
                    </dl>
                    <p class="tokenomics-note">
                        {{ __('Fake trading pairs may appear before or after launch. Always verify the official pair against the Squadex website before swapping.') }}
                    </p>
                </section>

                <section class="tokenomics-panel" aria-labelledby="slippage-price-impact">
                    <span class="tokenomics-kicker">{{ __('Execution') }}</span>
                    <h2 id="slippage-price-impact">{{ __('Slippage & Price Impact') }}</h2>
                    <p>
                        {{ __('Slippage is the difference between the expected price of a swap and the final executed price. Price impact refers to how much a trade may move the market price based on available liquidity. Both can increase when liquidity is low or trade size is large.') }}
                    </p>
                    <ul class="tokenomics-check-list">
                        @foreach ($slippageGuidance as $item)
                            <li>{{ $item }}</li>
                        @endforeach
                    </ul>
                    <p class="tokenomics-note">
                        {{ __('Squadex cannot guarantee trade execution price, liquidity depth or future market conditions.') }}
                    </p>
                </section>

                <section class="tokenomics-risk" aria-labelledby="liquidity-risk-notice">
                    <span class="tokenomics-kicker">{{ __('Risk Notice') }}</span>
                    <h2 id="liquidity-risk-notice">{{ __('Liquidity Risk Notice') }}</h2>
                    <p>
                        {{ __('Token liquidity can change over time and may be affected by market conditions, trading activity, network congestion, pool structure, token distribution and external factors. Users should understand liquidity risk before buying, selling or providing liquidity.') }}
                    </p>
                    <ul class="tokenomics-check-list">
                        @foreach ($liquidityRisks as $risk)
                            <li>{{ $risk }}</li>
                        @endforeach
                    </ul>
                </section>

                <section class="tokenomics-panel" aria-labelledby="providing-liquidity">
                    <span class="tokenomics-kicker">{{ __('Participation') }}</span>
                    <h2 id="providing-liquidity">{{ __('Providing Liquidity') }}</h2>
                    <p>
                        {{ __('If Squadex supports community liquidity provision in the future, users should understand the risks involved before adding assets to any liquidity pool.') }}
                    </p>
                    <ul class="tokenomics-check-list">
                        @foreach ($providerRisks as $risk)
                            <li>{{ $risk }}</li>
                        @endforeach
                    </ul>
                    <p class="tokenomics-note">
                        {{ __('Providing liquidity involves risk and may result in loss of funds. Squadex will publish official guidance if community liquidity provision becomes supported.') }}
                    </p>
                </section>

                <section class="tokenomics-panel" aria-labelledby="official-liquidity-links">
                    <span class="tokenomics-kicker">{{ __('Official Links') }}</span>
                    <h2 id="official-liquidity-links">{{ __('Official Liquidity Links') }}</h2>
                    <div class="token-roadmap-principles liquidity-link-grid">
                        @foreach ($officialLinks as $link)
                            <article>
                                <h3>{{ $link['label'] }}</h3>
                                @if ($link['href'])
                                    <p><a href="{{ $link['href'] }}">{{ $link['value'] }}</a></p>
                                @else
                                    <p>{{ $link['value'] }}</p>
                                    <div class="contract-disabled-action">
                                        <button type="button" disabled>{{ __('Not available yet') }}</button>
                                    </div>
                                @endif
                            </article>
                        @endforeach
                    </div>
                    <p class="tokenomics-note">
                        {{ __('If a liquidity pool, DEX link or lock proof is not listed on the official Squadex website, treat it as unverified.') }}
                    </p>
                </section>

                <section class="tokenomics-risk" aria-labelledby="avoid-fake-liquidity-pools">
                    <span class="tokenomics-kicker">{{ __('Scam Prevention') }}</span>
                    <h2 id="avoid-fake-liquidity-pools">{{ __('Avoid Fake Liquidity Pools') }}</h2>
                    <p>
                        {{ __('Fake liquidity pools and fake token pairs are common in crypto markets. Users should verify every link, contract and pool before connecting a wallet or confirming a transaction.') }}
                    </p>
                    <ul class="tokenomics-check-list">
                        @foreach ($scamWarnings as $warning)
                            <li>{{ $warning }}</li>
                        @endforeach
                    </ul>
                    <p class="tokenomics-note">
                        {{ __('Squadex will never ask for your seed phrase, private key or wallet recovery phrase.') }}
                    </p>
                </section>

                <section class="tokenomics-panel" aria-labelledby="liquidity-faq">
                    <span class="tokenomics-kicker">{{ __('FAQ') }}</span>
                    <h2 id="liquidity-faq">{{ __('Liquidity FAQ') }}</h2>
                    <div class="faq-list">
                        @foreach ($faqItems as $item)
                            <details class="faq-item">
                                <summary>
                                    <span>{{ $item['question'] }}</span>
                                </summary>
                                <p>{{ $item['answer'] }}</p>
                            </details>
                        @endforeach
                    </div>
                </section>

                <section class="tokenomics-cta" aria-labelledby="liquidity-cta">
                    <span class="tokenomics-kicker">{{ __('Verify First') }}</span>
                    <h2 id="liquidity-cta">{{ __('Verify liquidity before you trade') }}</h2>
                    <p>
                        {{ __('Always confirm the official token contract, trading pair, pool address and DEX link before connecting your wallet or making a swap.') }}
                    </p>
                    <nav aria-label="{{ __('Liquidity next steps') }}">
                        <a href="{{ public_route('pages.contract') }}">{{ __('View Contract') }}</a>
                        <a href="{{ public_route('pages.how-to-buy') }}">{{ __('How to Buy') }}</a>
                        <a href="{{ public_route('pages.token-transparency') }}">{{ __('View Token Transparency') }}</a>
                    </nav>
                </section>
            </div>
        </section>
    </main>
@stop
