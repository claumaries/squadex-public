@extends('v2.layout.layout')

@section('content')
    @php
        $transparencyCards = [ __('Official contract verification'), __('Token supply and allocation'), __('Liquidity information'), __('Treasury communication'), __('Vesting and lock-up visibility'), __('Risk and security notices'),
        ];

        $tokenInformation = [
            'Token Name' => __('Squadex'),
            'Token Symbol' => '$SQUADEX',
            'Network' => 'TBC',
            'Total Supply' => 'TBC',
            'Contract Address' => __('Coming soon'),
            'Contract Verification' => 'TBC',
            'Launch Status' => __('Not launched'),
            'Official Announcement Channels' => __('Squadex website and official community channels'),
        ];

        $verificationChecklist = [ __('Contract address published on the Squadex website'), __('Token details confirmed on official channels'), __('Network clearly stated'), __('Token symbol clearly stated'), __('Contract verification status shown where applicable'), __('Warnings about fake tokens and impersonation attempts'),
        ];

        $supplyCards = [ __('Total supply'), __('Circulating supply at launch'), __('Allocation breakdown'), __('Team allocation'), __('Treasury allocation'), __('Liquidity allocation'), __('Vesting and lock-up schedule'),
        ];

        $supplyRows = [
            ['category' => __('Total Supply'), 'status' => 'TBC', 'notes' => __('Final value to be confirmed before launch')],
            ['category' => __('Circulating Supply'), 'status' => 'TBC', 'notes' => __('Initial circulating supply to be confirmed')],
            ['category' => __('Community Allocation'), 'status' => __('Planned'), 'notes' => __('Subject to final tokenomics')],
            ['category' => __('Liquidity Allocation'), 'status' => __('Planned'), 'notes' => __('Subject to final launch plan')],
            ['category' => __('Treasury Allocation'), 'status' => __('Planned'), 'notes' => __('Intended for long-term ecosystem development')],
            ['category' => __('Team Allocation'), 'status' => __('Planned'), 'notes' => __('Expected to be subject to vesting')],
            ['category' => __('Vesting Schedule'), 'status' => 'TBC', 'notes' => __('To be published before or around launch')],
        ];

        $liquidityItems = [ __('Initial liquidity plan'), __('Liquidity pool information'), __('Liquidity lock status'), __('Lock duration, if applicable'), __('Updates to liquidity structure'), __('Official links only'),
        ];

        $treasuryUseCases = [ __('Product development'), __('Infrastructure and hosting'), __('Security and audits'), __('Ecosystem growth'), __('Marketing and partnerships'), __('Community initiatives'), __('Operational reserves'),
        ];

        $securityWarnings = [ __('Never trust unofficial contract addresses'), __('Avoid private messages claiming to represent Squadex'), __('Verify links before connecting a wallet'), __('Do not sign unknown wallet transactions'), __('Check official website announcements first'), __('Be cautious of fake airdrops or fake launch links'),
        ];

        $channels = [
            ['label' => __('Website'), 'value' => __('squadex.com'), 'href' => url('/')],
            ['label' => __('Whitepaper'), 'value' => __('Coming soon'), 'href' => public_route('pages.whitepaper')],
            ['label' => __('Tokenomics'), 'value' => __('/tokenomics'), 'href' => public_route('pages.tokenomics')],
            ['label' => __('Token Roadmap'), 'value' => __('/token-roadmap'), 'href' => public_route('pages.token-roadmap')],
            ['label' => __('Community'), 'value' => __('Coming soon'), 'href' => public_route('pages.community')],
            ['label' => __('Contract Address'), 'value' => __('Coming soon'), 'href' => null],
        ];

        $updateItems = [ __('contract address'), __('network'), __('supply'), __('allocation'), __('vesting'), __('liquidity'), __('utility'), __('risk notices'), __('official links'),
        ];

        $transparencyBoundaries = [ __('It does not guarantee token price performance.'), __('It does not guarantee investment returns.'), __('It does not guarantee exchange listings.'), __('It does not remove market risk.'), __('It does not replace independent research.'), __('It does not constitute financial advice.'), __('It does not mean all future decisions are fixed before launch.'),
        ];

        $faqItems = [
            [
                'question' => __('Where will the official Squadex contract address be published?'),
                'answer' => __('The official contract address will be published only through the Squadex website and official Squadex communication channels.'),
            ],
            [
                'question' => __('Is the Squadex token already launched?'),
                'answer' => __('Token launch status and final details will be confirmed through official channels.'),
            ],
            [
                'question' => __('Can token details change before launch?'),
                'answer' => __('Yes. Token details may change before launch as technical, security and ecosystem decisions are finalised.'),
            ],
            [
                'question' => __('How can users avoid fake Squadex tokens?'),
                'answer' => __('Users should only trust contract information published on the official Squadex website and should avoid unofficial links, private messages and unverified third-party posts.'),
            ],
            [
                'question' => __('Does transparency guarantee token value?'),
                'answer' => __('No. Transparency helps users understand verified project information, but it does not guarantee price performance, returns or market outcomes.'),
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
                <section class="token-roadmap-intro" aria-labelledby="token-transparency-title">
                    <span class="tokenomics-kicker">{{ __('Token Information') }}</span>
                    <h1 id="token-transparency-title">{{ __('Token Transparency') }}</h1>
                    <p>
                        {{ __('Squadex is committed to publishing clear, verifiable and easy-to-understand token information through official channels. This page explains how token-related information will be shared, verified and updated as the Squadex ecosystem develops.') }}
                    </p>
                    <strong>
                        {{ __('This page is for informational purposes only and does not constitute financial advice. Token details may change before launch and should always be verified through official Squadex channels.') }}
                    </strong>
                </section>

                <section class="tokenomics-panel" aria-labelledby="what-token-transparency-means">
                    <span class="tokenomics-kicker">{{ __('Overview') }}</span>
                    <h2 id="what-token-transparency-means">{{ __('What Token Transparency Means') }}</h2>
                    <p>
                        {{ __('Token transparency means making key token information easy to find, easy to verify and easy to understand. For Squadex, this includes clear communication around token supply, allocation, contract details, liquidity, treasury use, vesting, risks and official announcements.') }}
                    </p>
                    <div class="tokenomics-allocation-grid">
                        @foreach ($transparencyCards as $card)
                            <article class="tokenomics-allocation-card">
                                <h3>{{ $card }}</h3>
                            </article>
                        @endforeach
                    </div>
                </section>

                <section class="tokenomics-panel" aria-labelledby="official-token-information">
                    <div class="tokenomics-section-head">
                        <span class="tokenomics-kicker">{{ __('Official Details') }}</span>
                        <h2 id="official-token-information">{{ __('Official Token Information') }}</h2>
                    </div>
                    <dl class="tokenomics-overview-grid">
                        @foreach ($tokenInformation as $label => $value)
                            <div>
                                <dt>{{ $label }}</dt>
                                <dd>{{ $value }}</dd>
                            </div>
                        @endforeach
                    </dl>
                    <p class="tokenomics-note">
                        {{ __('The official contract address will only be published through the Squadex website and official Squadex communication channels. Users should avoid interacting with unofficial links, copied contract addresses or third-party posts that cannot be verified.') }}
                    </p>
                </section>

                <section class="tokenomics-panel" aria-labelledby="contract-verification-process">
                    <span class="tokenomics-kicker">{{ __('Verification') }}</span>
                    <h2 id="contract-verification-process">{{ __('Contract Verification Process') }}</h2>
                    <p>
                        {{ __('Before launch, Squadex intends to publish the official contract address and supporting token information in a clear and verifiable format. Users should always cross-check the contract address from multiple official Squadex sources before interacting with the token.') }}
                    </p>
                    <ul class="tokenomics-check-list">
                        @foreach ($verificationChecklist as $item)
                            <li>{{ $item }}</li>
                        @endforeach
                    </ul>
                </section>

                <section class="tokenomics-panel" aria-labelledby="supply-allocation-vesting">
                    <div class="tokenomics-section-head">
                        <span class="tokenomics-kicker">{{ __('Supply') }}</span>
                        <h2 id="supply-allocation-vesting">{{ __('Supply, Allocation & Vesting Transparency') }}</h2>
                    </div>
                    <p>
                        {{ __('Squadex token supply, allocation and vesting details should be presented clearly so users can understand how the token economy is structured. Any allocation values shown before launch should be treated as provisional until final tokenomics are confirmed.') }}
                    </p>
                    <ul class="tokenomics-check-list">
                        @foreach ($supplyCards as $card)
                            <li>{{ $card }}</li>
                        @endforeach
                    </ul>
                    <div class="tokenomics-table-wrap">
                        <table class="tokenomics-table">
                            <thead>
                                <tr>
                                    <th scope="col">{{ __('Category') }}</th>
                                    <th scope="col">{{ __('Status') }}</th>
                                    <th scope="col">{{ __('Notes') }}</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($supplyRows as $row)
                                    <tr>
                                        <th scope="row">{{ $row['category'] }}</th>
                                        <td>{{ $row['status'] }}</td>
                                        <td>{{ $row['notes'] }}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </section>

                <section class="tokenomics-panel" aria-labelledby="liquidity-transparency">
                    <span class="tokenomics-kicker">{{ __('Liquidity') }}</span>
                    <h2 id="liquidity-transparency">{{ __('Liquidity Transparency') }}</h2>
                    <p>
                        {{ __('Liquidity information helps users understand how token trading may be supported at launch and over time. Squadex intends to communicate liquidity-related information clearly where applicable, including initial liquidity plans, liquidity lock status and relevant updates.') }}
                    </p>
                    <ul class="tokenomics-check-list">
                        @foreach ($liquidityItems as $item)
                            <li>{{ $item }}</li>
                        @endforeach
                    </ul>
                    <p class="tokenomics-note">
                        {{ __('Liquidity details may depend on the final launch strategy and network selection. Final information will be confirmed through official Squadex channels.') }}
                    </p>
                </section>

                <section class="tokenomics-panel" aria-labelledby="treasury-transparency">
                    <span class="tokenomics-kicker">{{ __('Treasury') }}</span>
                    <h2 id="treasury-transparency">{{ __('Treasury Transparency') }}</h2>
                    <p>
                        {{ __('The Squadex treasury is intended to support long-term ecosystem development, operations, partnerships, infrastructure and future product growth. Treasury-related communication should be clear, responsible and focused on sustainability.') }}
                    </p>
                    <ul class="tokenomics-check-list">
                        @foreach ($treasuryUseCases as $useCase)
                            <li>{{ $useCase }}</li>
                        @endforeach
                    </ul>
                    <p class="tokenomics-note">
                        {{ __('Treasury information should be communicated responsibly and may be updated as the project matures.') }}
                    </p>
                </section>

                <section class="tokenomics-risk" aria-labelledby="security-scam-prevention">
                    <span class="tokenomics-kicker">{{ __('Security') }}</span>
                    <h2 id="security-scam-prevention">{{ __('Security & Scam Prevention') }}</h2>
                    <p>
                        {{ __('Crypto projects are often targeted by impersonation, fake tokens and phishing attempts. Squadex will use this page and official communication channels to help users identify verified token information.') }}
                    </p>
                    <ul class="tokenomics-check-list">
                        @foreach ($securityWarnings as $warning)
                            <li>{{ $warning }}</li>
                        @endforeach
                    </ul>
                </section>

                <section class="tokenomics-panel" aria-labelledby="official-communication-channels">
                    <span class="tokenomics-kicker">{{ __('Channels') }}</span>
                    <h2 id="official-communication-channels">{{ __('Official Communication Channels') }}</h2>
                    <p>
                        {{ __('Token-related updates should only be trusted when published through official Squadex channels.') }}
                    </p>
                    <div class="token-roadmap-principles">
                        @foreach ($channels as $channel)
                            <article>
                                <h3>{{ $channel['label'] }}</h3>
                                @if ($channel['href'])
                                    <p><a href="{{ $channel['href'] }}">{{ $channel['value'] }}</a></p>
                                @else
                                    <p>{{ $channel['value'] }}</p>
                                @endif
                            </article>
                        @endforeach
                    </div>
                    <p class="tokenomics-note">
                        {{ __('If information appears outside official Squadex channels, users should verify it against the website before taking action.') }}
                    </p>
                </section>

                <section class="tokenomics-panel" aria-labelledby="token-information-update-policy">
                    <span class="tokenomics-kicker">{{ __('Updates') }}</span>
                    <h2 id="token-information-update-policy">{{ __('Token Information Update Policy') }}</h2>
                    <p>
                        {{ __('As the Squadex ecosystem develops, token information may be updated to reflect confirmed launch details, technical decisions, network selection, security reviews and ecosystem requirements.') }}
                    </p>
                    <ul class="tokenomics-check-list">
                        @foreach ($updateItems as $item)
                            <li>{{ ucfirst($item) }}</li>
                        @endforeach
                    </ul>
                    <p class="tokenomics-note">
                        {{ __('Material token updates should be reflected on the website so users have a reliable source of truth.') }}
                    </p>
                </section>

                <section class="tokenomics-risk" aria-labelledby="what-transparency-does-not-mean">
                    <span class="tokenomics-kicker">{{ __('Boundaries') }}</span>
                    <h2 id="what-transparency-does-not-mean">{{ __('What Transparency Does Not Mean') }}</h2>
                    <ul class="tokenomics-check-list">
                        @foreach ($transparencyBoundaries as $boundary)
                            <li>{{ $boundary }}</li>
                        @endforeach
                    </ul>
                </section>

                <section class="tokenomics-panel" aria-labelledby="token-transparency-faq">
                    <span class="tokenomics-kicker">{{ __('FAQ') }}</span>
                    <h2 id="token-transparency-faq">{{ __('Token Transparency FAQ') }}</h2>
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

                <section class="tokenomics-cta" aria-labelledby="token-transparency-cta">
                    <span class="tokenomics-kicker">{{ __('Verification') }}</span>
                    <h2 id="token-transparency-cta">{{ __('Verify before you interact') }}</h2>
                    <p>
                        {{ __('Always use official Squadex sources to confirm token details, contract addresses, roadmap updates and ecosystem information.') }}
                    </p>
                    <nav aria-label="{{ __('Token transparency next steps') }}">
                        <a href="{{ public_route('pages.tokenomics') }}">{{ __('View Tokenomics') }}</a>
                        <a href="{{ public_route('pages.token-roadmap') }}">{{ __('View Token Roadmap') }}</a>
                        <a href="{{ public_route('pages.whitepaper') }}">{{ __('Read Whitepaper') }}</a>
                    </nav>
                </section>
            </div>
        </section>
    </main>
@stop
