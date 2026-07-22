@extends('v2.layout.layout')

@section('content')
    @php
        $tokenStatus = [
            'Token Status' => __('Coming soon'),
            'Token Symbol' => '$SQUADEX',
            'Network' => 'TBC',
            'Official Contract Address' => __('Coming soon'),
            'Presale Status' => __('Coming soon'),
            'Public Trading Status' => 'TBC',
            'Supported Wallets' => 'TBC',
            'Accepted Currency' => 'TBC',
            'Official Buying Link' => __('Coming soon'),
        ];

        $beforeYouBuy = [ __('Read the Tokenomics page'), __('Check the Token Roadmap'), __('Review the Token Transparency page'), __('Confirm the official contract address'), __('Verify the correct blockchain network'), __('Understand wallet and transaction fees'), __('Review presale or launch terms'), __('Never spend more than you can afford to lose'),
        ];

        $buyingSteps = [
            [
                'title' => __('Install a compatible wallet'),
                'content' => __('Install a compatible crypto wallet such as MetaMask, Trust Wallet or another wallet supported by the final Squadex network. Wallet compatibility will be confirmed before launch.'),
            ],
            [
                'title' => __('Add the correct network'),
                'content' => __('Make sure your wallet is connected to the correct blockchain network. The official network will be confirmed on the Squadex website before launch.'),
            ],
            [
                'title' => __('Fund your wallet'),
                'content' => __('Add the accepted currency required for the presale or token purchase, plus enough balance to cover network transaction fees.'),
            ],
            [
                'title' => __('Verify the official contract address'),
                'content' => __('Only use the contract address published on the official Squadex website and official Squadex communication channels. Do not rely on screenshots, private messages or copied addresses from unofficial sources.'),
            ],
            [
                'title' => __('Open the official buying link'),
                'content' => __('Use only the official Squadex presale or buying link listed on the Squadex website. Avoid links posted in private messages or unofficial groups.'),
            ],
            [
                'title' => __('Connect your wallet'),
                'content' => __('Connect your wallet only after confirming the website URL, network and contract information are correct.'),
            ],
            [
                'title' => __('Review the transaction'),
                'content' => __('Check the token amount, accepted currency, gas fees, contract interaction and wallet permissions before confirming any transaction.'),
            ],
            [
                'title' => __('Confirm and save transaction details'),
                'content' => __('After confirming a transaction, save the transaction hash and verify the result using the appropriate blockchain explorer.'),
            ],
        ];

        $presaleChecklist = [ __('Presale is officially live'), __('Presale URL is verified'), __('Network is correct'), __('Contribution limits are understood'), __('Vesting or claim rules are understood'), __('Risk notice has been reviewed'),
        ];

        $publicLaunchDetails = [
            'Official liquidity pool' => 'TBC',
            'Supported DEX' => 'TBC',
            'Supported network' => 'TBC',
            'Contract address' => __('Coming soon'),
            'Trading pair' => 'TBC',
        ];

        $walletImportDetails = [
            'Token Contract' => __('Coming soon'),
            'Token Symbol' => '$SQUADEX',
            'Token Decimals' => 'TBC',
            'Network' => 'TBC',
        ];

        $walletSteps = [ __('Open your wallet.'), __('Select the correct network.'), __('Choose "Import token" or "Add custom token".'), __('Paste the official Squadex contract address.'), __('Confirm the token symbol and decimals.'), __('Save the token to your wallet.'),
        ];

        $safetyChecklist = [ __('Only trust the official Squadex website.'), __('Do not use contract addresses from private messages.'), __('Avoid fake airdrops and fake presale links.'), __('Check the full website URL before connecting a wallet.'), __('Never share your seed phrase.'), __('Never sign transactions you do not understand.'), __('Verify the token contract before swapping.'), __('Bookmark the official Squadex website.'), __('Be careful with sponsored search results or fake ads.'), __('Report suspicious links to official Squadex channels.'),
        ];

        $commonMistakes = [ __('Buying a fake token with a similar name'), __('Using the wrong blockchain network'), __('Sending funds to an unofficial wallet address'), __('Connecting a wallet to a fake website'), __('Ignoring gas fees'), __('Not checking vesting or claim rules'), __('Trusting screenshots instead of official links'), __('Signing unlimited token approvals without understanding them'),
        ];

        $riskItems = [ __('Token price may go down.'), __('Liquidity may be limited.'), __('Launch details may change.'), __('Smart contract risks may exist.'), __('Transactions may be irreversible.'), __('Network fees may vary.'), __('Presale participation does not guarantee future access, listings or returns.'), __('This page does not constitute financial advice.'),
        ];

        $officialLinks = [
            ['label' => __('Website'), 'value' => __('squadex.com'), 'href' => public_route('pages.homepage')],
            ['label' => __('Presale'), 'value' => __('/presale'), 'href' => public_route('pages.presale')],
            ['label' => __('Tokenomics'), 'value' => __('/tokenomics'), 'href' => public_route('pages.tokenomics')],
            ['label' => __('Token Roadmap'), 'value' => __('/token-roadmap'), 'href' => public_route('pages.token-roadmap')],
            ['label' => __('Token Transparency'), 'value' => __('/token-transparency'), 'href' => public_route('pages.token-transparency')],
            ['label' => __('Whitepaper'), 'value' => __('Coming soon'), 'href' => public_route('pages.whitepaper')],
            ['label' => __('Contract Address'), 'value' => __('Coming soon'), 'href' => null],
            ['label' => __('Community'), 'value' => __('Coming soon'), 'href' => url('/community')],
        ];

        $faqItems = [
            [
                'question' => __('Can I buy Squadex now?'),
                'answer' => __('Squadex buying availability will be confirmed on the official website. Do not interact with any token claiming to be Squadex unless it is verified through official Squadex channels.'),
            ],
            [
                'question' => __('Where will the official contract address be published?'),
                'answer' => __('The official contract address will be published on the Squadex website and official Squadex communication channels.'),
            ],
            [
                'question' => __('What wallet do I need?'),
                'answer' => __('Supported wallets will be confirmed before launch based on the selected blockchain network.'),
            ],
            [
                'question' => __('What network will Squadex use?'),
                'answer' => __('The final network is currently TBC and will be confirmed before launch.'),
            ],
            [
                'question' => __('Can I buy Squadex during presale?'),
                'answer' => __('Presale participation details, if available, will be published on the official Presale page.'),
            ],
            [
                'question' => __('How do I avoid fake Squadex tokens?'),
                'answer' => __('Always verify the contract address, official website URL and official announcement channels before interacting with any token.'),
            ],
            [
                'question' => __('Is buying Squadex without risk?'),
                'answer' => __('No. Digital assets are volatile and can result in loss of funds.'),
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
                <section class="token-roadmap-intro" aria-labelledby="how-to-buy-title">
                    <span class="tokenomics-kicker">{{ __('Buying Guide') }}</span>
                    <h1 id="how-to-buy-title">{{ __('How to Buy Squadex') }}</h1>
                    <p>
                        {{ __('A simple, safety-first guide for buying or accessing the Squadex token once the official launch or presale is live.') }}
                    </p>
                    <strong>
                        {{ __('This page is for informational purposes only and does not constitute financial advice. Squadex token details, supported networks, contract addresses and purchase options may change before launch.') }}
                    </strong>
                    <nav class="token-roadmap-intro-actions" aria-label="{{ __('How to buy quick links') }}">
                        <a href="{{ public_route('pages.presale') }}">{{ __('View Presale') }}</a>
                        <a href="{{ public_route('pages.token-transparency') }}">{{ __('View Token Transparency') }}</a>
                    </nav>
                </section>

                <section class="tokenomics-panel" aria-labelledby="token-availability">
                    <span class="tokenomics-kicker">{{ __('Status') }}</span>
                    <h2 id="token-availability">{{ __('Token Availability') }}</h2>
                    <dl class="tokenomics-overview-grid how-to-buy-status-grid">
                        @foreach ($tokenStatus as $label => $value)
                            <div>
                                <dt>{{ $label }}</dt>
                                <dd>{{ $value }}</dd>
                            </div>
                        @endforeach
                    </dl>
                    <p class="tokenomics-note">
                        {{ __('Do not buy or interact with any token claiming to be Squadex unless the contract address and buying link are published on the official Squadex website.') }}
                    </p>
                </section>

                <section class="tokenomics-panel" aria-labelledby="before-you-buy">
                    <span class="tokenomics-kicker">{{ __('Preparation') }}</span>
                    <h2 id="before-you-buy">{{ __('Before You Buy') }}</h2>
                    <p>
                        {{ __('Before interacting with any token, users should understand the risks, verify the official information and make sure they are using the correct wallet, network and contract address.') }}
                    </p>
                    <ul class="tokenomics-check-list">
                        @foreach ($beforeYouBuy as $item)
                            <li>{{ $item }}</li>
                        @endforeach
                    </ul>
                </section>

                <section class="tokenomics-panel" aria-labelledby="buying-guide">
                    <span class="tokenomics-kicker">{{ __('Step By Step') }}</span>
                    <h2 id="buying-guide">{{ __('How to Buy Squadex') }}</h2>
                    <div class="token-roadmap-timeline how-to-buy-timeline">
                        @foreach ($buyingSteps as $step)
                            <article class="token-roadmap-card">
                                <div class="token-roadmap-card-head">
                                    <span>{{ __('Step :number', ['number' => $loop->iteration]) }}</span>
                                </div>
                                <h3>{{ $step['title'] }}</h3>
                                <p>{{ $step['content'] }}</p>
                            </article>
                        @endforeach
                    </div>
                </section>

                <section class="tokenomics-panel" aria-labelledby="buying-during-presale">
                    <span class="tokenomics-kicker">{{ __('Presale') }}</span>
                    <h2 id="buying-during-presale">{{ __('Buying During Presale') }}</h2>
                    <p>
                        {{ __('If Squadex offers a presale, participation details will be published on the official Presale page. Users should check the presale status, contribution limits, accepted currency, vesting rules and claim process before participating.') }}
                    </p>
                    <ul class="tokenomics-check-list">
                        @foreach ($presaleChecklist as $item)
                            <li>{{ $item }}</li>
                        @endforeach
                    </ul>
                    <p class="tokenomics-note">
                        <a href="{{ public_route('pages.presale') }}">{{ __('View Presale') }}</a>
                    </p>
                </section>

                <section class="tokenomics-panel" aria-labelledby="buying-after-launch">
                    <span class="tokenomics-kicker">{{ __('Public Launch') }}</span>
                    <h2 id="buying-after-launch">{{ __('Buying After Public Launch') }}</h2>
                    <p>
                        {{ __('After public launch, Squadex may become available through official liquidity pools, decentralised exchanges or other supported access points. Final buying options will be confirmed through official Squadex channels.') }}
                    </p>
                    <dl class="tokenomics-overview-grid">
                        @foreach ($publicLaunchDetails as $label => $value)
                            <div>
                                <dt>{{ $label }}</dt>
                                <dd>{{ $value }}</dd>
                            </div>
                        @endforeach
                    </dl>
                    <p class="tokenomics-note">
                        {{ __('Fake trading pairs and fake tokens are common. Always verify the official contract address before swapping.') }}
                    </p>
                </section>

                <section class="tokenomics-panel" aria-labelledby="add-token-wallet">
                    <span class="tokenomics-kicker">{{ __('Wallet Setup') }}</span>
                    <h2 id="add-token-wallet">{{ __('Add Squadex to Your Wallet') }}</h2>
                    <p>
                        {{ __('Once the official contract address is published, users may need to import the token manually into their wallet.') }}
                    </p>
                    <div class="tokenomics-split">
                        <ol class="how-to-buy-simple-steps">
                            @foreach ($walletSteps as $step)
                                <li>{{ $step }}</li>
                            @endforeach
                        </ol>
                        <dl class="tokenomics-overview-grid how-to-buy-wallet-fields">
                            @foreach ($walletImportDetails as $label => $value)
                                <div>
                                    <dt>{{ $label }}</dt>
                                    <dd>{{ $value }}</dd>
                                </div>
                            @endforeach
                        </dl>
                    </div>
                </section>

                <section class="tokenomics-risk" aria-labelledby="safety-checklist">
                    <span class="tokenomics-kicker">{{ __('Safety') }}</span>
                    <h2 id="safety-checklist">{{ __('Safety Checklist') }}</h2>
                    <ul class="tokenomics-check-list how-to-buy-warning-list">
                        @foreach ($safetyChecklist as $item)
                            <li>{{ $item }}</li>
                        @endforeach
                    </ul>
                    <p class="tokenomics-note">
                        {{ __('Squadex will never ask for your seed phrase, private key or wallet recovery phrase.') }}
                    </p>
                </section>

                <section class="tokenomics-panel" aria-labelledby="common-mistakes">
                    <span class="tokenomics-kicker">{{ __('Avoid') }}</span>
                    <h2 id="common-mistakes">{{ __('Common Mistakes to Avoid') }}</h2>
                    <div class="token-roadmap-principles how-to-buy-mistakes">
                        @foreach ($commonMistakes as $mistake)
                            <article>
                                <h3>{{ $mistake }}</h3>
                            </article>
                        @endforeach
                    </div>
                </section>

                <section class="tokenomics-risk" aria-labelledby="token-risk-notice">
                    <span class="tokenomics-kicker">{{ __('Risk Notice') }}</span>
                    <h2 id="token-risk-notice">{{ __('Token Risk Notice') }}</h2>
                    <p>
                        {{ __('Digital assets are volatile and involve significant risk. Buying or participating in any token launch may involve market risk, liquidity risk, smart contract risk, technical risk, regulatory risk and the risk of losing funds. Users should do their own research and should never spend more than they can afford to lose.') }}
                    </p>
                    <ul class="tokenomics-check-list">
                        @foreach ($riskItems as $item)
                            <li>{{ $item }}</li>
                        @endforeach
                    </ul>
                </section>

                <section class="tokenomics-panel" aria-labelledby="official-squadex-links">
                    <span class="tokenomics-kicker">{{ __('Official Links') }}</span>
                    <h2 id="official-squadex-links">{{ __('Official Squadex Links') }}</h2>
                    <div class="token-roadmap-principles">
                        @foreach ($officialLinks as $link)
                            <article>
                                <h3>{{ $link['label'] }}</h3>
                                @if ($link['href'])
                                    <p><a href="{{ $link['href'] }}">{{ $link['value'] }}</a></p>
                                @else
                                    <p>{{ $link['value'] }}</p>
                                @endif
                            </article>
                        @endforeach
                    </div>
                    <p class="tokenomics-note">
                        {{ __('If a buying link is not listed on the official Squadex website, treat it as unverified.') }}
                    </p>
                </section>

                <section class="tokenomics-panel" aria-labelledby="how-to-buy-faq">
                    <span class="tokenomics-kicker">{{ __('FAQ') }}</span>
                    <h2 id="how-to-buy-faq">{{ __('How to Buy FAQ') }}</h2>
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

                <section class="tokenomics-cta" aria-labelledby="how-to-buy-cta">
                    <span class="tokenomics-kicker">{{ __('Verify First') }}</span>
                    <h2 id="how-to-buy-cta">{{ __('Buy safely through official Squadex channels') }}</h2>
                    <p>
                        {{ __('Always verify the official contract address, network and buying link before connecting a wallet or confirming a transaction.') }}
                    </p>
                    <nav aria-label="{{ __('How to buy next steps') }}">
                        <a href="{{ public_route('pages.presale') }}">{{ __('View Presale') }}</a>
                        <a href="{{ public_route('pages.tokenomics') }}">{{ __('View Tokenomics') }}</a>
                        <a href="{{ public_route('pages.token-transparency') }}">{{ __('View Token Transparency') }}</a>
                    </nav>
                </section>
            </div>
        </section>
    </main>
@stop
