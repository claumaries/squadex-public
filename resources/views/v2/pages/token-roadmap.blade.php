@extends('v2.layout.layout')

@section('content')
    @php
        $phases = [
            [
                'phase' => __('Phase 1'),
                'title' => __('Token Foundation'),
                'status' => __('In Progress'),
                'description' => __('This phase focuses on establishing the core economic model behind the Squadex token, including supply, allocation, utility and long-term sustainability principles.'),
                'milestones' => [ __('Define token supply and allocation model'), __('Finalise token utility framework'), __('Prepare tokenomics documentation'), __('Define vesting and lock-up structure'), __('Prepare official token contract requirements'), __('Review compliance and risk language'),
                ],
            ],
            [
                'phase' => __('Phase 2'),
                'title' => __('Pre-Launch Preparation'),
                'status' => __('Planned'),
                'description' => __('This phase prepares the public launch environment and ensures users have clear, official information before interacting with the token.'),
                'milestones' => [ __('Publish official Tokenomics page'), __('Publish official Token Roadmap page'), __('Prepare official contract address announcement process'), __('Prepare community education materials'), __('Prepare liquidity and launch strategy'), __('Finalise launch communication plan'), __('Add token information to the website and documentation'),
                ],
            ],
            [
                'phase' => __('Phase 3'),
                'title' => __('Token Launch'),
                'status' => __('Planned'),
                'description' => __('This phase covers the initial public availability of the Squadex token and the publication of verified launch information through official channels.'),
                'milestones' => [ __('Deploy official token contract'), __('Publish verified contract address'), __('Add initial liquidity'), __('Enable public token discovery through official channels'), __('Launch token-related website updates'), __('Monitor launch stability and community feedback'),
                ],
            ],
            [
                'phase' => __('Phase 4'),
                'title' => __('Utility Expansion'),
                'status' => __('Planned'),
                'description' => __('This phase focuses on connecting the token to real ecosystem functionality and practical use cases within the Squadex platform.'),
                'milestones' => [ __('Connect token utility to Squadex ecosystem features'), __('Explore token-based access to selected premium features'), __('Introduce user and creator incentive mechanisms'), __('Support campaign participation'), __('Expand partner-related token utility'), __('Improve token documentation based on user feedback'),
                ],
            ],
            [
                'phase' => __('Phase 5'),
                'title' => __('Ecosystem Growth'),
                'status' => __('Future'),
                'description' => __('This phase is focused on long-term growth, community engagement and responsible ecosystem development.'),
                'milestones' => [ __('Expand community programmes'), __('Launch ecosystem reward initiatives'), __('Support strategic partnerships'), __('Improve transparency reporting'), __('Expand educational content around token usage'), __('Strengthen treasury and sustainability processes'),
                ],
            ],
            [
                'phase' => __('Phase 6'),
                'title' => __('Long-Term Governance & Sustainability'),
                'status' => __('Future'),
                'description' => __('This phase explores long-term mechanisms that may help the Squadex ecosystem become more transparent, participatory and sustainable over time.'),
                'milestones' => [ __('Explore future governance functionality'), __('Review token utility performance'), __('Publish periodic ecosystem updates'), __('Maintain transparent treasury communication'), __('Review long-term sustainability mechanisms'), __('Continue improving token-related user experience'),
                ],
            ],
        ];

        $statusLegend = [
            'In Progress' => __('Currently being worked on.'),
            'Planned' => __('Intended for a future phase but not yet completed.'),
            'Future' => __('Long-term direction subject to further validation.'),
            'Completed' => __('Delivered and publicly available.'),
        ];

        $principles = [
            [
                'title' => __('Transparency'),
                'description' => __('Token-related updates should be clear, verifiable and published through official Squadex channels.'),
            ],
            [
                'title' => __('Utility First'),
                'description' => __('The token roadmap should focus on practical ecosystem utility rather than short-term speculation.'),
            ],
            [
                'title' => __('Sustainable Growth'),
                'description' => __('Distribution, liquidity and treasury decisions should support long-term ecosystem development.'),
            ],
            [
                'title' => __('Community Alignment'),
                'description' => __('Community incentives should be designed to reward meaningful participation and ecosystem contribution.'),
            ],
            [
                'title' => __('Security & Verification'),
                'description' => __('Users should always be able to verify official token details, contract addresses and launch information.'),
            ],
        ];

        $nonPromises = [ __('It does not guarantee token price performance.'), __('It does not guarantee exchange listings.'), __('It does not guarantee investment returns.'), __('It does not replace independent research.'), __('It does not constitute financial advice.'), __('It does not make final commitments until official launch details are confirmed.'),
        ];

        $faqItems = [
            [
                'question' => __('Is the Squadex token already launched?'),
                'answer' => __('Token launch details will be confirmed through the official Squadex website and official communication channels.'),
            ],
            [
                'question' => __('Where will the official contract address be published?'),
                'answer' => __('The official contract address will only be published through official Squadex channels. Users should avoid relying on unofficial links or third-party posts.'),
            ],
            [
                'question' => __('Can the roadmap change?'),
                'answer' => __('Yes. The roadmap may evolve as the project develops, technical requirements change, or new ecosystem opportunities are validated.'),
            ],
            [
                'question' => __('Does this roadmap guarantee token value?'),
                'answer' => __('No. The roadmap is informational only and does not guarantee price performance, returns or market outcomes.'),
            ],
            [
                'question' => __('What is the main goal of the token roadmap?'),
                'answer' => __('The goal is to provide a transparent plan for token preparation, launch, utility development and long-term ecosystem sustainability.'),
            ],
        ];
    @endphp

    <main class="token-roadmap-page">
        <section class="token-roadmap-body">
            <div class="container tokenomics-stack">
                <section class="token-roadmap-intro" aria-labelledby="token-roadmap-title">
                    <span class="tokenomics-kicker">{{ __('Token Planning') }}</span>
                    <h1 id="token-roadmap-title">{{ __('Token Roadmap') }}</h1>
                    <p>
                        {{ __('The Squadex token roadmap outlines the planned stages for token preparation, launch, utility development and long-term ecosystem growth. The roadmap is designed to provide transparency while allowing the project to adapt as the ecosystem develops.') }}
                    </p>
                    <strong>
                        {{ __('This roadmap is for informational purposes only. Timelines, milestones and token details may change as the project evolves.') }}
                    </strong>
                </section>

                <section class="tokenomics-panel" aria-labelledby="roadmap-overview">
                    <span class="tokenomics-kicker">{{ __('Overview') }}</span>
                    <h2 id="roadmap-overview">{{ __('Roadmap Overview') }}</h2>
                    <p>{{ __('The roadmap is split into practical phases:') }}</p>
                    <ol class="token-roadmap-phase-list">
                        @foreach ($phases as $phase)
                            <li>{{ $phase['phase'] }}: {{ $phase['title'] }}</li>
                        @endforeach
                    </ol>
                </section>

                <section class="tokenomics-panel" aria-labelledby="roadmap-timeline">
                    <span class="tokenomics-kicker">{{ __('Timeline') }}</span>
                    <h2 id="roadmap-timeline">{{ __('Main Roadmap Timeline') }}</h2>

                    <div class="token-roadmap-timeline">
                        @foreach ($phases as $phase)
                            <article class="token-roadmap-card">
                                <div class="token-roadmap-card-head">
                                    <span>{{ $phase['phase'] }}</span>
                                    <strong>{{ $phase['status'] }}</strong>
                                </div>
                                <h3>{{ $phase['phase'] }}: {{ $phase['title'] }}</h3>
                                <p>{{ $phase['description'] }}</p>
                                <ul class="tokenomics-check-list">
                                    @foreach ($phase['milestones'] as $milestone)
                                        <li>{{ $milestone }}</li>
                                    @endforeach
                                </ul>
                            </article>
                        @endforeach
                    </div>
                </section>

                <section class="tokenomics-panel" aria-labelledby="milestone-status">
                    <span class="tokenomics-kicker">{{ __('Status Legend') }}</span>
                    <h2 id="milestone-status">{{ __('Milestone Status Legend') }}</h2>
                    <dl class="token-roadmap-legend">
                        @foreach ($statusLegend as $status => $description)
                            <div>
                                <dt>{{ $status }}</dt>
                                <dd>{{ $description }}</dd>
                            </div>
                        @endforeach
                    </dl>
                </section>

                <section class="tokenomics-panel" aria-labelledby="roadmap-principles">
                    <span class="tokenomics-kicker">{{ __('Principles') }}</span>
                    <h2 id="roadmap-principles">{{ __('Roadmap Principles') }}</h2>
                    <div class="token-roadmap-principles">
                        @foreach ($principles as $principle)
                            <article>
                                <h3>{{ $principle['title'] }}</h3>
                                <p>{{ $principle['description'] }}</p>
                            </article>
                        @endforeach
                    </div>
                </section>

                <section class="tokenomics-risk" aria-labelledby="roadmap-does-not-promise">
                    <span class="tokenomics-kicker">{{ __('Boundaries') }}</span>
                    <h2 id="roadmap-does-not-promise">{{ __('What This Roadmap Does Not Promise') }}</h2>
                    <ul class="tokenomics-check-list">
                        @foreach ($nonPromises as $item)
                            <li>{{ $item }}</li>
                        @endforeach
                    </ul>
                </section>

                <section class="tokenomics-panel" aria-labelledby="token-roadmap-faq">
                    <span class="tokenomics-kicker">{{ __('FAQ') }}</span>
                    <h2 id="token-roadmap-faq">{{ __('Token Roadmap FAQ') }}</h2>
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

                <section class="tokenomics-cta" aria-labelledby="token-roadmap-cta">
                    <span class="tokenomics-kicker">{{ __('Next Steps') }}</span>
                    <h2 id="token-roadmap-cta">{{ __('Follow the Squadex token journey') }}</h2>
                    <p>
                        {{ __('Stay updated as Squadex publishes tokenomics, launch details, contract information and ecosystem milestones.') }}
                    </p>
                    <nav aria-label="{{ __('Token roadmap next steps') }}">
                        <a href="{{ public_route('pages.tokenomics') }}">{{ __('View Tokenomics') }}</a>
                        <a href="{{ public_route('pages.whitepaper') }}">{{ __('Read Whitepaper') }}</a>
                        <a href="{{ url('/community') }}">{{ __('Join Community') }}</a>
                    </nav>
                </section>
            </div>
        </section>
    </main>
@stop
