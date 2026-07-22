@extends('v2.layout.layout')

@section('content')
    @php
        $contractStatus = [
            'Contract Status' => __('Coming soon'),
            'Token Name' => __('Squadex'),
            'Token Symbol' => '$SQUADEX',
            'Network' => 'TBC',
            'Contract Address' => __('Coming soon'),
            'Contract Verification' => 'TBC',
            'Token Standard' => 'TBC',
            'Decimals' => 'TBC',
            'Total Supply' => 'TBC',
            'Owner / Admin Status' => 'TBC',
            'Liquidity Status' => 'TBC',
            'Launch Status' => __('Not launched'),
        ];

        $tokenDetails = [
            ['field' => __('Token Name'), 'value' => __('Squadex')],
            ['field' => __('Token Symbol'), 'value' => '$SQUADEX'],
            ['field' => __('Network'), 'value' => 'TBC'],
            ['field' => __('Contract Address'), 'value' => __('Coming soon')],
            ['field' => __('Token Standard'), 'value' => 'TBC'],
            ['field' => __('Decimals'), 'value' => 'TBC'],
            ['field' => __('Total Supply'), 'value' => 'TBC'],
            ['field' => __('Circulating Supply at Launch'), 'value' => 'TBC'],
            ['field' => __('Launch Date'), 'value' => 'TBC'],
            ['field' => __('Official Explorer Link'), 'value' => __('Coming soon')],
        ];

        $verificationChecklist = [ __('Confirm the contract address is listed on the official Squadex website.'), __('Confirm the selected blockchain network is correct.'), __('Confirm the token name and symbol match the official details.'), __('Confirm the contract verification status where applicable.'), __('Check the official announcement channels.'), __('Avoid links shared through private messages.'), __('Do not rely on screenshots or copied addresses from unofficial groups.'), __('Verify the contract before connecting your wallet.'),
        ];

        $explorerDetails = [
            'Explorer' => 'TBC',
            'Contract Page' => __('Coming soon'),
            'Network' => 'TBC',
            'Verification Status' => 'TBC',
        ];

        $securityNotes = [
            ['title' => __('Contract verification status'), 'description' => __('TBC before launch')],
            ['title' => __('Network confirmation'), 'description' => __('TBC before launch')],
            ['title' => __('Token standard'), 'description' => __('TBC before launch')],
            ['title' => __('Ownership/admin status'), 'description' => __('TBC before launch')],
            ['title' => __('Liquidity information'), 'description' => __('TBC before launch')],
            ['title' => __('Audit status, if applicable'), 'description' => __('TBC before launch')],
            ['title' => __('Material contract updates'), 'description' => __('TBC before launch')],
            ['title' => __('Official announcement process'), 'description' => __('TBC before launch')],
        ];

        $auditRows = [
            ['field' => __('Audit Status'), 'value' => 'TBC'],
            ['field' => __('Audit Provider'), 'value' => 'TBC'],
            ['field' => __('Audit Report'), 'value' => __('Coming soon')],
            ['field' => __('Review Date'), 'value' => 'TBC'],
            ['field' => __('Known Issues'), 'value' => 'TBC'],
            ['field' => __('Resolution Status'), 'value' => 'TBC'],
        ];

        $fakeContractWarnings = [ __('Do not trust contract addresses sent by private message.'), __('Do not trust screenshots of contract addresses.'), __('Do not buy tokens from unverified trading pairs.'), __('Do not connect your wallet to unofficial websites.'), __('Do not sign unknown wallet transactions.'), __('Do not trust fake airdrop or presale links.'), __('Do not rely on search ads without verifying the URL.'), __('Always cross-check the official Squadex website first.'),
        ];

        $verificationSteps = [
            [
                'step' => __('Step 1'),
                'title' => __('Visit the official Squadex website'),
                'description' => __('Start from the official Squadex website and navigate to the Contract page directly.'),
            ],
            [
                'step' => __('Step 2'),
                'title' => __('Check the contract address'),
                'description' => __('Confirm the contract address shown on this page.'),
            ],
            [
                'step' => __('Step 3'),
                'title' => __('Confirm the network'),
                'description' => __('Make sure your wallet is connected to the same network listed on this page.'),
            ],
            [
                'step' => __('Step 4'),
                'title' => __('Open the official explorer link'),
                'description' => __('Use the official blockchain explorer link provided by Squadex once available.'),
            ],
            [
                'step' => __('Step 5'),
                'title' => __('Compare the token details'),
                'description' => __('Check the token name, symbol, decimals and total supply.'),
            ],
            [
                'step' => __('Step 6'),
                'title' => __('Avoid unofficial links'),
                'description' => __('Do not interact with contracts or buying links that are not published on official Squadex channels.'),
            ],
        ];

        $updateItems = [ __('contract address'), __('network'), __('token standard'), __('decimals'), __('explorer link'), __('audit status'), __('ownership/admin status'), __('liquidity information'), __('launch status'),
        ];

        $officialLinks = [
            ['label' => __('Website'), 'value' => __('squadex.com'), 'href' => url('/')],
            ['label' => __('Contract Page'), 'value' => __('/contract'), 'href' => public_route('pages.contract')],
            ['label' => __('How to Buy'), 'value' => __('/how-to-buy'), 'href' => public_route('pages.how-to-buy')],
            ['label' => __('Presale'), 'value' => __('/presale'), 'href' => public_route('pages.presale')],
            ['label' => __('Tokenomics'), 'value' => __('/tokenomics'), 'href' => public_route('pages.tokenomics')],
            ['label' => __('Token Roadmap'), 'value' => __('/token-roadmap'), 'href' => public_route('pages.token-roadmap')],
            ['label' => __('Token Transparency'), 'value' => __('/token-transparency'), 'href' => public_route('pages.token-transparency')],
            ['label' => __('Whitepaper'), 'value' => __('Coming soon'), 'href' => public_route('pages.whitepaper')],
            ['label' => __('Community'), 'value' => __('Coming soon'), 'href' => url('/community')],
        ];

        $faqItems = [
            [
                'question' => __('Is the Squadex contract live?'),
                'answer' => __('The official Squadex contract status will be confirmed on this page and through official Squadex communication channels.'),
            ],
            [
                'question' => __('Where will the official contract address be published?'),
                'answer' => __('The official contract address will be published on the Squadex Contract page and official Squadex communication channels.'),
            ],
            [
                'question' => __('Can I copy the contract address from social media?'),
                'answer' => __('Users should not rely on copied contract addresses from social media, screenshots or private messages. Always verify against the official Squadex website.'),
            ],
            [
                'question' => __('What network will Squadex use?'),
                'answer' => __('The final network is currently TBC and will be confirmed before launch.'),
            ],
            [
                'question' => __('Will there be an audit?'),
                'answer' => __('Audit or review information will be published if and when it is available.'),
            ],
            [
                'question' => __('Does contract verification remove all risk?'),
                'answer' => __('No. Contract verification can help users inspect the contract, but it does not remove smart contract, market, liquidity or technical risk.'),
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
                <section class="token-roadmap-intro" aria-labelledby="contract-title">
                    <span class="tokenomics-kicker">{{ __('Contract Verification') }}</span>
                    <h1 id="contract-title">{{ __('Squadex Token Contract') }}</h1>
                    <p>
                        {{ __('Use this page to verify the official Squadex token contract address, network and token details before interacting with the token.') }}
                    </p>
                    <strong>
                        {{ __('This page is for informational purposes only and does not constitute financial advice. Always verify the official contract address through Squadex channels before connecting a wallet or making any transaction.') }}
                    </strong>
                    <nav class="token-roadmap-intro-actions" aria-label="{{ __('Contract quick links') }}">
                        <a href="{{ public_route('pages.token-transparency') }}">{{ __('View Token Transparency') }}</a>
                        <a href="{{ public_route('pages.how-to-buy') }}">{{ __('How to Buy') }}</a>
                    </nav>
                </section>

                <section class="tokenomics-panel" aria-labelledby="contract-status">
                    <div class="tokenomics-section-head">
                        <span class="tokenomics-kicker">{{ __('Status') }}</span>
                        <h2 id="contract-status">{{ __('Contract Status') }}</h2>
                    </div>
                    <dl class="tokenomics-overview-grid">
                        @foreach ($contractStatus as $label => $value)
                            <div>
                                <dt>{{ $label }}</dt>
                                <dd>{{ $value }}</dd>
                            </div>
                        @endforeach
                    </dl>
                    <p class="tokenomics-note">
                        {{ __('Do not interact with any contract claiming to be Squadex unless the address is published on this page and confirmed through official Squadex communication channels.') }}
                    </p>
                </section>

                <section class="tokenomics-panel" aria-labelledby="official-contract-address">
                    <span class="tokenomics-kicker">{{ __('Address') }}</span>
                    <h2 id="official-contract-address">{{ __('Official Contract Address') }}</h2>
                    <p>
                        {{ __('The official Squadex token contract address will be published here once it has been finalised and verified. Until then, any contract address claiming to represent Squadex should be treated as unverified.') }}
                    </p>
                    <div class="contract-address-box">
                        <span>{{ __('Official Contract Address') }}</span>
                        <strong>{{ __('Coming soon') }}</strong>
                        <button type="button" disabled>{{ __('Copy Address') }}</button>
                    </div>
                    <p class="tokenomics-note">
                        {{ __('The copy button will be enabled only after the official contract address is published.') }}
                    </p>
                </section>

                <section class="tokenomics-panel" aria-labelledby="contract-verification-checklist">
                    <span class="tokenomics-kicker">{{ __('Checklist') }}</span>
                    <h2 id="contract-verification-checklist">{{ __('Contract Verification Checklist') }}</h2>
                    <ul class="tokenomics-check-list">
                        @foreach ($verificationChecklist as $item)
                            <li>{{ $item }}</li>
                        @endforeach
                    </ul>
                </section>

                <section class="tokenomics-panel" aria-labelledby="token-details">
                    <div class="tokenomics-section-head">
                        <span class="tokenomics-kicker">{{ __('Details') }}</span>
                        <h2 id="token-details">{{ __('Token Details') }}</h2>
                    </div>
                    <div class="tokenomics-table-wrap">
                        <table class="tokenomics-table">
                            <thead>
                                <tr>
                                    <th scope="col">{{ __('Field') }}</th>
                                    <th scope="col">{{ __('Value') }}</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($tokenDetails as $row)
                                    <tr>
                                        <th scope="row">{{ $row['field'] }}</th>
                                        <td>{{ $row['value'] }}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    <p class="tokenomics-note">
                        {{ __('Final token details will be confirmed before launch. Users should always verify this information before interacting with any token contract.') }}
                    </p>
                </section>

                <section class="tokenomics-panel" aria-labelledby="blockchain-explorer">
                    <span class="tokenomics-kicker">{{ __('Explorer') }}</span>
                    <h2 id="blockchain-explorer">{{ __('Blockchain Explorer') }}</h2>
                    <p>
                        {{ __('Once the official contract is live, Squadex will provide a link to the relevant blockchain explorer so users can independently verify token information, transactions, supply and contract details.') }}
                    </p>
                    <dl class="tokenomics-overview-grid">
                        @foreach ($explorerDetails as $label => $value)
                            <div>
                                <dt>{{ $label }}</dt>
                                <dd>{{ $value }}</dd>
                            </div>
                        @endforeach
                    </dl>
                    <div class="contract-disabled-action">
                        <button type="button" disabled>{{ __('Open Explorer') }}</button>
                    </div>
                </section>

                <section class="tokenomics-panel" aria-labelledby="contract-security-notes">
                    <span class="tokenomics-kicker">{{ __('Security') }}</span>
                    <h2 id="contract-security-notes">{{ __('Contract Security Notes') }}</h2>
                    <p>
                        {{ __('Smart contracts can involve technical and security risks. Squadex intends to communicate relevant contract information clearly, including verification status, network details and any material updates where applicable.') }}
                    </p>
                    <div class="token-roadmap-principles">
                        @foreach ($securityNotes as $note)
                            <article>
                                <h3>{{ $note['title'] }}</h3>
                                <p>{{ $note['description'] }}</p>
                            </article>
                        @endforeach
                    </div>
                </section>

                <section class="tokenomics-panel" aria-labelledby="audit-review-status">
                    <div class="tokenomics-section-head">
                        <span class="tokenomics-kicker">{{ __('Audit') }}</span>
                        <h2 id="audit-review-status">{{ __('Audit & Review Status') }}</h2>
                    </div>
                    <p>
                        {{ __('If an audit, external review or internal security review is completed, relevant information will be published through official Squadex channels.') }}
                    </p>
                    <div class="tokenomics-table-wrap">
                        <table class="tokenomics-table">
                            <tbody>
                                @foreach ($auditRows as $row)
                                    <tr>
                                        <th scope="row">{{ $row['field'] }}</th>
                                        <td>{{ $row['value'] }}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    <p class="tokenomics-note">
                        {{ __('An audit does not remove all smart contract risk. Users should always do their own research before interacting with any token contract.') }}
                    </p>
                </section>

                <section class="tokenomics-risk" aria-labelledby="avoid-fake-contracts">
                    <span class="tokenomics-kicker">{{ __('Warning') }}</span>
                    <h2 id="avoid-fake-contracts">{{ __('Avoid Fake Squadex Contracts') }}</h2>
                    <p>
                        {{ __('Fake tokens and impersonation attempts are common in crypto markets. Users should treat any contract address as suspicious unless it is published on the official Squadex website.') }}
                    </p>
                    <ul class="tokenomics-check-list">
                        @foreach ($fakeContractWarnings as $warning)
                            <li>{{ $warning }}</li>
                        @endforeach
                    </ul>
                    <p class="tokenomics-note">
                        {{ __('Squadex will never ask for your seed phrase, private key or wallet recovery phrase.') }}
                    </p>
                </section>

                <section class="tokenomics-panel" aria-labelledby="how-to-verify-contract">
                    <span class="tokenomics-kicker">{{ __('Verification') }}</span>
                    <h2 id="how-to-verify-contract">{{ __('How to Verify the Contract') }}</h2>
                    <div class="token-roadmap-timeline">
                        @foreach ($verificationSteps as $step)
                            <article class="token-roadmap-card">
                                <div class="token-roadmap-card-head">
                                    <span>{{ $step['step'] }}</span>
                                </div>
                                <h3>{{ $step['title'] }}</h3>
                                <p>{{ $step['description'] }}</p>
                            </article>
                        @endforeach
                    </div>
                </section>

                <section class="tokenomics-panel" aria-labelledby="contract-update-policy">
                    <span class="tokenomics-kicker">{{ __('Updates') }}</span>
                    <h2 id="contract-update-policy">{{ __('Contract Information Update Policy') }}</h2>
                    <p>
                        {{ __('Contract-related information may be updated when official launch details, network selection, verification status, audit status or token information are confirmed. Material updates should be reflected on this page so users have a clear source of truth.') }}
                    </p>
                    <ul class="tokenomics-check-list">
                        @foreach ($updateItems as $item)
                            <li>{{ ucfirst($item) }}</li>
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
                                <p><a href="{{ $link['href'] }}">{{ $link['value'] }}</a></p>
                            </article>
                        @endforeach
                    </div>
                    <p class="tokenomics-note">
                        {{ __('If a contract address or buying link is not listed on the official Squadex website, treat it as unverified.') }}
                    </p>
                </section>

                <section class="tokenomics-panel" aria-labelledby="contract-faq">
                    <span class="tokenomics-kicker">{{ __('FAQ') }}</span>
                    <h2 id="contract-faq">{{ __('Contract FAQ') }}</h2>
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

                <section class="tokenomics-cta" aria-labelledby="contract-cta">
                    <span class="tokenomics-kicker">{{ __('Safety First') }}</span>
                    <h2 id="contract-cta">{{ __('Verify before you interact') }}</h2>
                    <p>
                        {{ __('Always confirm the official Squadex contract address, network and explorer link before connecting your wallet or making a transaction.') }}
                    </p>
                    <nav aria-label="{{ __('Contract next steps') }}">
                        <a href="{{ public_route('pages.how-to-buy') }}">{{ __('How to Buy') }}</a>
                        <a href="{{ public_route('pages.token-transparency') }}">{{ __('View Token Transparency') }}</a>
                        <a href="{{ public_route('pages.tokenomics') }}">{{ __('View Tokenomics') }}</a>
                    </nav>
                </section>
            </div>
        </section>
    </main>
@stop
