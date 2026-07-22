@extends('v2.layout.layout')

@section('content')
    @php
        $presaleStatus = [
            'Presale Status' => __('Coming soon'),
            'Token Symbol' => '$SQUADEX',
            'Network' => 'TBC',
            'Presale Start Date' => 'TBC',
            'Presale End Date' => 'TBC',
            'Presale Price' => 'TBC',
            'Minimum Contribution' => 'TBC',
            'Maximum Contribution' => 'TBC',
            'Accepted Currency' => 'TBC',
            'Vesting' => 'TBC',
            'Claim Date' => 'TBC',
            'Official Contract Address' => __('Coming soon'),
        ];

        $presaleSteps = [
            [
                'step' => __('Step 1'),
                'title' => __('Official announcement'),
                'description' => __('Presale details will be announced through the Squadex website and official communication channels.'),
            ],
            [
                'step' => __('Step 2'),
                'title' => __('Wallet preparation'),
                'description' => __('Participants may need a compatible wallet and the correct network configured before interacting with any presale contract or official presale interface.'),
            ],
            [
                'step' => __('Step 3'),
                'title' => __('Verification'),
                'description' => __('Users should verify the official presale URL, contract address and network before taking any action.'),
            ],
            [
                'step' => __('Step 4'),
                'title' => __('Participation'),
                'description' => __('Eligible users may participate according to the published presale rules, contribution limits and accepted currency.'),
            ],
            [
                'step' => __('Step 5'),
                'title' => __('Token claim'),
                'description' => __('Token claim or distribution details will be confirmed before or during the launch process.'),
            ],
        ];

        $presaleStages = [
            [
                'stage' => __('Stage 1'),
                'title' => __('Early Access'),
                'status' => __('Planned'),
                'price' => 'TBC',
                'allocation' => 'TBC',
                'description' => __('An initial access phase intended for early community participants, subject to final eligibility and presale rules.'),
            ],
            [
                'stage' => __('Stage 2'),
                'title' => __('Community Round'),
                'status' => __('Planned'),
                'price' => 'TBC',
                'allocation' => 'TBC',
                'description' => __('A wider community participation phase designed to support broader ecosystem awareness and distribution.'),
            ],
            [
                'stage' => __('Stage 3'),
                'title' => __('Public Round'),
                'status' => __('Planned'),
                'price' => 'TBC',
                'allocation' => 'TBC',
                'description' => __('A final presale phase before public launch, subject to availability, contribution limits and official launch conditions.'),
            ],
        ];

        $presalePurposes = [ __('Product development'), __('Infrastructure and hosting'), __('Security and audits'), __('Liquidity preparation'), __('Community growth'), __('Partnerships'), __('Launch operations'), __('Ecosystem incentives'),
        ];

        $fundRows = [
            ['category' => __('Product Development'), 'allocation' => '35%'],
            ['category' => __('Liquidity Preparation'), 'allocation' => '25%'],
            ['category' => __('Marketing & Community Growth'), 'allocation' => '15%'],
            ['category' => __('Security, Audits & Legal Review'), 'allocation' => '10%'],
            ['category' => __('Infrastructure & Operations'), 'allocation' => '10%'],
            ['category' => __('Treasury Reserve'), 'allocation' => '5%'],
        ];

        $participationRequirements = [ __('Compatible crypto wallet'), __('Correct blockchain network'), __('Accepted contribution currency'), __('Verified official presale link'), __('Understanding of token risks'), __('Agreement with presale terms, if applicable'), __('Compliance with applicable local rules'), __('Avoidance of VPN or restricted-region misuse, if applicable'),
        ];

        $safetyItems = [ __('Only trust the official Squadex website.'), __('Never send funds to addresses shared by private message.'), __('Verify the network before interacting with any contract.'), __('Check the official contract address carefully.'), __('Avoid fake airdrop links.'), __('Do not sign unknown wallet transactions.'), __('Do not rely on screenshots from unofficial groups.'), __('Bookmark the official Squadex website.'), __('Be cautious of impersonators and fake support accounts.'),
        ];

        $riskItems = [ __('Token value may go down.'), __('Liquidity may be limited.'), __('Launch timelines may change.'), __('Smart contract risks may exist.'), __('Regulatory conditions may change.'), __('Presale participation does not guarantee future utility, listings or returns.'), __('Users are responsible for verifying official information before interacting with any contract.'),
        ];

        $officialLinks = [
            ['label' => __('Website'), 'value' => __('squadex.com'), 'href' => url('/')],
            ['label' => __('Presale Page'), 'value' => __('/presale'), 'href' => public_route('pages.presale')],
            ['label' => __('Tokenomics'), 'value' => __('/tokenomics'), 'href' => public_route('pages.tokenomics')],
            ['label' => __('Token Roadmap'), 'value' => __('/token-roadmap'), 'href' => public_route('pages.token-roadmap')],
            ['label' => __('Token Transparency'), 'value' => __('/token-transparency'), 'href' => public_route('pages.token-transparency')],
            ['label' => __('Whitepaper'), 'value' => __('Coming soon'), 'href' => public_route('pages.whitepaper')],
            ['label' => __('Contract Address'), 'value' => __('Coming soon'), 'href' => null],
            ['label' => __('Community'), 'value' => __('Coming soon'), 'href' => url('/community')],
        ];

        $faqItems = [
            [
                'question' => __('Is the Squadex presale live?'),
                'answer' => __('The presale is not live unless confirmed on the official Squadex website and official communication channels.'),
            ],
            [
                'question' => __('Where will the official presale link be published?'),
                'answer' => __('The official presale link will only be published on the Squadex website and verified Squadex communication channels.'),
            ],
            [
                'question' => __('What wallet do I need?'),
                'answer' => __('Wallet and network requirements will be confirmed before the presale opens.'),
            ],
            [
                'question' => __('What is the presale price?'),
                'answer' => __('The final presale price will be confirmed before launch.'),
            ],
            [
                'question' => __('Is there a minimum or maximum contribution?'),
                'answer' => __('Contribution limits are currently TBC and will be published with the final presale details.'),
            ],
            [
                'question' => __('Will presale tokens be vested?'),
                'answer' => __('Vesting or claim details will be confirmed before or during the presale process.'),
            ],
            [
                'question' => __('Does participating guarantee profit?'),
                'answer' => __('No. Token presale participation does not guarantee price performance, returns, liquidity or future listings.'),
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
                <section class="token-roadmap-intro" aria-labelledby="presale-title">
                    <span class="tokenomics-kicker">{{ __('Presale') }}</span>
                    <h1 id="presale-title">{{ __('Squadex Presale') }}</h1>
                    <p>
                        {{ __('The Squadex presale is planned as an early token access phase for users who want to follow the development of the Squadex ecosystem before the public launch.') }}
                    </p>
                    <strong>
                        {{ __('This page is for informational purposes only and does not constitute financial advice. Presale details, dates, pricing and participation rules may change before launch.') }}
                    </strong>
                    <nav class="token-roadmap-intro-actions" aria-label="{{ __('Presale quick links') }}">
                        <a href="{{ public_route('pages.tokenomics') }}">{{ __('View Tokenomics') }}</a>
                        <a href="#presale-safety-guide">{{ __('Read Presale Safety Guide') }}</a>
                    </nav>
                </section>

                <section class="tokenomics-panel" aria-labelledby="presale-status">
                    <div class="tokenomics-section-head">
                        <span class="tokenomics-kicker">{{ __('Status') }}</span>
                        <h2 id="presale-status">{{ __('Presale Status') }}</h2>
                    </div>
                    <dl class="tokenomics-overview-grid">
                        @foreach ($presaleStatus as $label => $value)
                            <div>
                                <dt>{{ $label }}</dt>
                                <dd>{{ $value }}</dd>
                            </div>
                        @endforeach
                    </dl>
                    <p class="tokenomics-note">
                        {{ __('Do not send funds to any address unless it is published on the official Squadex website and verified through official Squadex channels.') }}
                    </p>
                </section>

                <section class="tokenomics-panel" aria-labelledby="how-presale-works">
                    <span class="tokenomics-kicker">{{ __('Process') }}</span>
                    <h2 id="how-presale-works">{{ __('How the Presale Works') }}</h2>
                    <div class="token-roadmap-timeline">
                        @foreach ($presaleSteps as $step)
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

                <section class="tokenomics-panel" aria-labelledby="presale-stages">
                    <span class="tokenomics-kicker">{{ __('Stages') }}</span>
                    <h2 id="presale-stages">{{ __('Presale Stages') }}</h2>
                    <div class="token-roadmap-principles presale-stage-grid">
                        @foreach ($presaleStages as $stage)
                            <article>
                                <span class="tokenomics-kicker">{{ $stage['stage'] }}</span>
                                <h3>{{ $stage['title'] }}</h3>
                                <dl class="presale-stage-meta">
                                    <div>
                                        <dt>{{ __('Status') }}</dt>
                                        <dd>{{ $stage['status'] }}</dd>
                                    </div>
                                    <div>
                                        <dt>{{ __('Price') }}</dt>
                                        <dd>{{ $stage['price'] }}</dd>
                                    </div>
                                    <div>
                                        <dt>{{ __('Allocation') }}</dt>
                                        <dd>{{ $stage['allocation'] }}</dd>
                                    </div>
                                </dl>
                                <p>{{ $stage['description'] }}</p>
                            </article>
                        @endforeach
                    </div>
                    <p class="tokenomics-note">
                        {{ __('Presale stages, prices, allocations and eligibility criteria are provisional until officially confirmed.') }}
                    </p>
                </section>

                <section class="tokenomics-panel" aria-labelledby="purpose-of-presale">
                    <span class="tokenomics-kicker">{{ __('Purpose') }}</span>
                    <h2 id="purpose-of-presale">{{ __('Purpose of the Presale') }}</h2>
                    <p>
                        {{ __('The planned Squadex presale is intended to support early ecosystem development, product growth, liquidity preparation, infrastructure, security and community expansion.') }}
                    </p>
                    <ul class="tokenomics-check-list">
                        @foreach ($presalePurposes as $purpose)
                            <li>{{ $purpose }}</li>
                        @endforeach
                    </ul>
                </section>

                <section class="tokenomics-panel" aria-labelledby="planned-use-of-funds">
                    <div class="tokenomics-section-head">
                        <span class="tokenomics-kicker">{{ __('Allocation') }}</span>
                        <h2 id="planned-use-of-funds">{{ __('Planned Use of Presale Funds') }}</h2>
                    </div>
                    <div class="tokenomics-table-wrap">
                        <table class="tokenomics-table">
                            <thead>
                                <tr>
                                    <th scope="col">{{ __('Category') }}</th>
                                    <th scope="col">{{ __('Placeholder Allocation') }}</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($fundRows as $row)
                                    <tr>
                                        <th scope="row">{{ $row['category'] }}</th>
                                        <td>{{ $row['allocation'] }}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    <p class="tokenomics-note">
                        {{ __('The final use-of-funds structure may change before launch. Squadex intends to communicate material updates clearly through official channels.') }}
                    </p>
                </section>

                <section class="tokenomics-panel" aria-labelledby="participation-requirements">
                    <span class="tokenomics-kicker">{{ __('Requirements') }}</span>
                    <h2 id="participation-requirements">{{ __('Participation Requirements') }}</h2>
                    <ul class="tokenomics-check-list">
                        @foreach ($participationRequirements as $requirement)
                            <li>{{ $requirement }}</li>
                        @endforeach
                    </ul>
                    <p class="tokenomics-note">
                        {{ __('Eligibility requirements may depend on jurisdiction, technical setup and final presale terms.') }}
                    </p>
                </section>

                <section class="tokenomics-risk" id="presale-safety-guide" aria-labelledby="presale-safety-guide-title">
                    <span class="tokenomics-kicker">{{ __('Safety') }}</span>
                    <h2 id="presale-safety-guide-title">{{ __('Presale Safety Guide') }}</h2>
                    <ul class="tokenomics-check-list">
                        @foreach ($safetyItems as $item)
                            <li>{{ $item }}</li>
                        @endforeach
                    </ul>
                    <p class="tokenomics-note">
                        {{ __('Squadex will never ask users to send funds through private messages or unofficial wallet addresses.') }}
                    </p>
                </section>

                <section class="tokenomics-risk" aria-labelledby="presale-risk-notice">
                    <span class="tokenomics-kicker">{{ __('Risk Notice') }}</span>
                    <h2 id="presale-risk-notice">{{ __('Presale Risk Notice') }}</h2>
                    <p>
                        {{ __('Digital assets are volatile and involve significant risk. Participation in any token presale may involve technical, regulatory, liquidity, smart contract and market risks. Users should only participate after understanding these risks and should never contribute more than they can afford to lose.') }}
                    </p>
                    <ul class="tokenomics-check-list">
                        @foreach ($riskItems as $item)
                            <li>{{ $item }}</li>
                        @endforeach
                    </ul>
                </section>

                <section class="tokenomics-panel" aria-labelledby="official-presale-links">
                    <span class="tokenomics-kicker">{{ __('Official Links') }}</span>
                    <h2 id="official-presale-links">{{ __('Official Presale Links') }}</h2>
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
                        {{ __('Any presale link not listed on the official Squadex website should be treated as unverified.') }}
                    </p>
                </section>

                <section class="tokenomics-panel" aria-labelledby="presale-faq">
                    <span class="tokenomics-kicker">{{ __('FAQ') }}</span>
                    <h2 id="presale-faq">{{ __('Presale FAQ') }}</h2>
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

                <section class="tokenomics-cta" aria-labelledby="presale-cta">
                    <span class="tokenomics-kicker">{{ __('Next Steps') }}</span>
                    <h2 id="presale-cta">{{ __('Prepare safely for the Squadex presale') }}</h2>
                    <p>
                        {{ __('Follow official Squadex updates, verify all links carefully and review the tokenomics, roadmap and transparency information before participating.') }}
                    </p>
                    <nav aria-label="{{ __('Presale next steps') }}">
                        <a href="{{ public_route('pages.tokenomics') }}">{{ __('View Tokenomics') }}</a>
                        <a href="{{ public_route('pages.token-roadmap') }}">{{ __('View Token Roadmap') }}</a>
                        <a href="{{ public_route('pages.token-transparency') }}">{{ __('View Token Transparency') }}</a>
                    </nav>
                </section>
            </div>
        </section>
    </main>
@stop
