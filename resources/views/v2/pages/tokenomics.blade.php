@extends('v2.layout.layout')

@section('content')
    @php
        $tokenOverview = [
            'Token Name' => __('Squadex'),
            'Token Symbol' => '$SQUADEX',
            'Network' => 'TBC',
            'Total Supply' => 'TBC',
            'Contract Address' => __('Coming soon'),
            'Launch Type' => 'TBC',
            'Initial Liquidity' => 'TBC',
            'Tax Model' => 'TBC',
        ];

        $allocations = [
            [
                'label' => __('Community & Ecosystem'),
                'percentage' => 40,
                'description' => __('Reserved for community growth, platform incentives, campaigns, ecosystem rewards and future user engagement programmes.'),
            ],
            [
                'label' => __('Liquidity'),
                'percentage' => 20,
                'description' => __('Allocated to support initial and ongoing market liquidity.'),
            ],
            [
                'label' => __('Treasury'),
                'percentage' => 15,
                'description' => __('Reserved for long-term project development, operations, infrastructure and future ecosystem expansion.'),
            ],
            [
                'label' => __('Marketing & Partnerships'),
                'percentage' => 10,
                'description' => __('Used for brand awareness, strategic partnerships, creator campaigns and launch activities.'),
            ],
            [
                'label' => __('Team'),
                'percentage' => 10,
                'description' => __('Allocated to core contributors, subject to vesting to support long-term alignment.'),
            ],
            [
                'label' => __('Advisors & Strategic Contributors'),
                'percentage' => 5,
                'description' => __('Reserved for selected contributors who support the project with technical, strategic or growth expertise.'),
            ],
        ];

        $vestingRows = [
            ['allocation' => __('Community & Ecosystem'), 'lockup' => 'TBC', 'vesting' => 'TBC'],
            ['allocation' => __('Liquidity'), 'lockup' => 'TBC', 'vesting' => 'TBC'],
            ['allocation' => __('Treasury'), 'lockup' => 'TBC', 'vesting' => 'TBC'],
            ['allocation' => __('Marketing & Partnerships'), 'lockup' => 'TBC', 'vesting' => 'TBC'],
            ['allocation' => __('Team'), 'lockup' => 'TBC', 'vesting' => 'TBC'],
            ['allocation' => __('Advisors'), 'lockup' => 'TBC', 'vesting' => 'TBC'],
        ];

        $utilities = [ __('Access to premium ecosystem features'), __('Community participation'), __('Creator and user incentives'), __('Platform rewards'), __('Future governance-related functionality'), __('Campaign participation'), __('Ecosystem partner benefits'),
        ];

        $sustainabilityItems = [ __('Transparent supply'), __('Controlled distribution'), __('Responsible treasury use'), __('Liquidity planning'), __('Ecosystem-driven demand'), __('Gradual release of locked allocations'), __('Avoiding short-term hype mechanics'),
        ];

        $faqItems = [
            [
                'question' => __('What does tokenomics mean?'),
                'answer' => __('Tokenomics is the economic structure of a crypto token, including supply, distribution, utility, incentives and circulation.'),
            ],
            [
                'question' => __('What is the total supply of Squadex?'),
                'answer' => __('The final total supply will be confirmed before launch.'),
            ],
            [
                'question' => __('Where can I find the official contract address?'),
                'answer' => __('The official contract address will only be published through the Squadex website and official communication channels.'),
            ],
            [
                'question' => __('Is Squadex tokenomics final?'),
                'answer' => __('Some details may be updated before launch as the project develops.'),
            ],
            [
                'question' => __('Is this financial advice?'),
                'answer' => __('No. The information on this page is for educational and informational purposes only.'),
            ],
        ];
    @endphp

    <main class="tokenomics-page">
        <section class="tokenomics-hero">
            <div class="container">
                <span class="tokenomics-kicker">{{ __('Token Economy') }}</span>
                <h1>{{ __('Squadex Tokenomics') }}</h1>
                <p>
                    {{ __('A transparent overview of the Squadex token economy, including supply, allocation, utility and long-term ecosystem design.') }}
                </p>
                <strong>{{ __('This page is for informational purposes only and does not constitute financial advice.') }}</strong>
            </div>
        </section>

        <section class="tokenomics-body">
            <div class="container tokenomics-stack">
                <section class="tokenomics-panel tokenomics-intro" aria-labelledby="what-is-tokenomics">
                    <span class="tokenomics-kicker">{{ __('Foundation') }}</span>
                    <h2 id="what-is-tokenomics">{{ __('What is Tokenomics?') }}</h2>
                    <p>
                        {{ __('Tokenomics describes the economic design of a crypto token. It includes how the token is created, distributed, used, circulated and managed across the ecosystem.') }}
                    </p>
                    <p>{{ __('Strong tokenomics should focus on:') }}</p>
                    <ul class="tokenomics-check-list">
                        <li>{{ __('Clear supply rules') }}</li>
                        <li>{{ __('Fair distribution') }}</li>
                        <li>{{ __('Real utility') }}</li>
                        <li>{{ __('Sustainable incentives') }}</li>
                        <li>{{ __('Transparent treasury management') }}</li>
                        <li>{{ __('Long-term ecosystem growth') }}</li>
                    </ul>
                </section>

                <section class="tokenomics-panel" aria-labelledby="token-overview">
                    <div class="tokenomics-section-head">
                        <span class="tokenomics-kicker">{{ __('Overview') }}</span>
                        <h2 id="token-overview">{{ __('Token Overview') }}</h2>
                    </div>

                    <dl class="tokenomics-overview-grid">
                        @foreach ($tokenOverview as $label => $value)
                            <div>
                                <dt>{{ $label }}</dt>
                                <dd>{{ $value }}</dd>
                            </div>
                        @endforeach
                    </dl>

                    <p class="tokenomics-note">
                        {{ __('Final token details will be published before launch. Always verify the official contract address through the Squadex website and official channels.') }}
                    </p>
                </section>

                <section class="tokenomics-panel" aria-labelledby="token-allocation">
                    <div class="tokenomics-section-head">
                        <span class="tokenomics-kicker">{{ __('Distribution') }}</span>
                        <h2 id="token-allocation">{{ __('Token Allocation') }}</h2>
                    </div>

                    <div class="tokenomics-allocation-grid">
                        @foreach ($allocations as $allocation)
                            <article class="tokenomics-allocation-card">
                                <div class="tokenomics-allocation-top">
                                    <h3>{{ $allocation['label'] }}</h3>
                                    <strong>{{ $allocation['percentage'] }}%</strong>
                                </div>
                                <div class="tokenomics-bar tokenomics-bar-{{ $allocation['percentage'] }}" aria-hidden="true">
                                    <span></span>
                                </div>
                                <p>{{ $allocation['description'] }}</p>
                            </article>
                        @endforeach
                    </div>
                </section>

                <section class="tokenomics-panel" aria-labelledby="vesting-lockup">
                    <div class="tokenomics-section-head">
                        <span class="tokenomics-kicker">{{ __('Release Schedule') }}</span>
                        <h2 id="vesting-lockup">{{ __('Vesting & Lock-up') }}</h2>
                    </div>
                    <p>
                        {{ __('Vesting helps align contributors with the long-term success of the project by releasing certain allocations gradually over time instead of making them available immediately.') }}
                    </p>

                    <div class="tokenomics-table-wrap">
                        <table class="tokenomics-table">
                            <thead>
                                <tr>
                                    <th scope="col">{{ __('Allocation') }}</th>
                                    <th scope="col">{{ __('Lock-up') }}</th>
                                    <th scope="col">{{ __('Vesting') }}</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($vestingRows as $row)
                                    <tr>
                                        <th scope="row">{{ $row['allocation'] }}</th>
                                        <td>{{ $row['lockup'] }}</td>
                                        <td>{{ $row['vesting'] }}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </section>

                <section class="tokenomics-split">
                    <div class="tokenomics-panel" aria-labelledby="token-utility">
                        <span class="tokenomics-kicker">{{ __('Utility') }}</span>
                        <h2 id="token-utility">{{ __('Token Utility') }}</h2>
                        <p>
                            {{ __('Planned utility may evolve as the Squadex ecosystem develops. The token is intended to support practical ecosystem participation where token usage improves the user experience.') }}
                        </p>
                        <ul class="tokenomics-check-list">
                            @foreach ($utilities as $utility)
                                <li>{{ $utility }}</li>
                            @endforeach
                        </ul>
                    </div>

                    <div class="tokenomics-panel" aria-labelledby="sustainability-model">
                        <span class="tokenomics-kicker">{{ __('Sustainability') }}</span>
                        <h2 id="sustainability-model">{{ __('Sustainability Model') }}</h2>
                        <p>
                            {{ __('The Squadex token economy is designed around transparent mechanics, responsible release planning and ecosystem use cases rather than short-term hype mechanics.') }}
                        </p>
                        <ul class="tokenomics-check-list">
                            @foreach ($sustainabilityItems as $item)
                                <li>{{ $item }}</li>
                            @endforeach
                        </ul>
                    </div>
                </section>

                <section class="tokenomics-risk" aria-labelledby="risk-transparency">
                    <span class="tokenomics-kicker">{{ __('Risk Notice') }}</span>
                    <h2 id="risk-transparency">{{ __('Risk & Transparency Notice') }}</h2>
                    <p>
                        {{ __('Digital assets are volatile and involve risk. Squadex token information is provided for transparency and educational purposes only. Users should always do their own research and verify all contract details through official sources before interacting with any token.') }}
                    </p>
                </section>

                <section class="tokenomics-panel" aria-labelledby="tokenomics-faq">
                    <div class="tokenomics-section-head">
                        <span class="tokenomics-kicker">{{ __('FAQ') }}</span>
                        <h2 id="tokenomics-faq">{{ __('Tokenomics FAQ') }}</h2>
                    </div>

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

                <section class="tokenomics-cta" aria-labelledby="tokenomics-cta">
                    <span class="tokenomics-kicker">{{ __('Launch Updates') }}</span>
                    <h2 id="tokenomics-cta">{{ __('Follow the Squadex launch') }}</h2>
                    <p>
                        {{ __('Stay updated as Squadex releases more details about token supply, utility, launch mechanics and ecosystem development.') }}
                    </p>
                    <nav aria-label="{{ __('Tokenomics next steps') }}">
                        <a href="{{ public_route('pages.whitepaper') }}">{{ __('Read the Whitepaper') }}</a>
                        <a href="{{ public_route('pages.token-roadmap') }}">{{ __('View Roadmap') }}</a>
                        <a href="{{ url('/community') }}">{{ __('Join the Community') }}</a>
                    </nav>
                </section>
            </div>
        </section>
    </main>
@stop
