@extends('v2.layout.layout')

@section('content')
    @php
        $faqSections = [
            [
                'id' => 'getting-started',
                'label' => __('Getting Started'),
                'questions' => [
                    [
                        'question' => __('What is').config('app.name').'?',
                        'answer' => config('app.name').' is a football management platform where users can build clubs, manage squads, follow simulated competitions and interact with marketplace and token features.',
                    ],
                    [
                        'question' => __('Do I need football experience to start?'),
                        'answer' => __('No. The platform is designed so new managers can start with simple club decisions, then learn deeper squad, match and marketplace systems over time.'),
                    ],
                    [
                        'question' => __('What should I do first after joining?'),
                        'answer' => __('Complete your account setup, review your club, check player roles, follow upcoming fixtures and become familiar with the marketplace before making bigger changes.'),
                    ],
                    [
                        'question' => __('Can I use the public pages without an account?'),
                        'answer' => __('Yes. Public areas such as news, tournaments, leaderboards, match pages, marketplace previews and legal pages can be browsed without signing in.'),
                    ],
                ],
            ],
            [
                'id' => 'clubs-and-players',
                'label' => __('Clubs And Players'),
                'questions' => [
                    [
                        'question' => __('How do clubs work?'),
                        'answer' => __('A club represents your football operation. It connects players, fixtures, stadium context, results, marketplace activity and progression into one management experience.'),
                    ],
                    [
                        'question' => __('How are player attributes used?'),
                        'answer' => __('Attributes such as pace, shooting, passing, dribbling, defending and physicality help determine how players contribute in their positions and match situations.'),
                    ],
                    [
                        'question' => __('Can players get injured or suspended?'),
                        'answer' => __('Yes. Match and season systems can account for availability changes, including injuries, suspensions and other squad state that affects selection decisions.'),
                    ],
                    [
                        'question' => __('Why does formation matter?'),
                        'answer' => __('Formation affects role coverage, squad balance and tactical fit. Strong individual players still need to be placed in a structure that supports the team.'),
                    ],
                    [
                        'question' => __('Can player value change over time?'),
                        'answer' => __('Player value can be influenced by quality, performance context, age, scarcity, demand and the wider marketplace environment.'),
                    ],
                ],
            ],
            [
                'id' => 'matches-and-tournaments',
                'label' => __('Matches And Tournaments'),
                'questions' => [
                    [
                        'question' => __('How are matches decided?'),
                        'answer' => __('Matches are simulated from team strength, player roles, tactical context and match events. The goal is readable football logic rather than random score generation.'),
                    ],
                    [
                        'question' => __('Can a match go to extra time or penalties?'),
                        'answer' => __('Cup and knockout formats can require extra time or penalties when the competition rules need a winner after regular time.'),
                    ],
                    [
                        'question' => __('Where can I see results and fixtures?'),
                        'answer' => __('Public match, tournament and leaderboard pages show fixtures, results and competitive context. Signed-in users also have dashboard views for club-specific activity.'),
                    ],
                    [
                        'question' => __('Are standings updated automatically?'),
                        'answer' => __('Standings and public read models are updated as match and competition events are processed, so tables can reflect current season progress.'),
                    ],
                    [
                        'question' => __('What happens if a scheduled match is missed?'),
                        'answer' => __('Recovery workflows are designed to detect missed eligible matches and process them safely, so competition progress can continue without manual intervention.'),
                    ],
                ],
            ],
            [
                'id' => 'marketplace-and-token',
                'label' => __('Marketplace And Token'),
                'questions' => [
                    [
                        'question' => __('What can I find in the marketplace?'),
                        'answer' => __('The marketplace can include players, clubs and stadium-related assets depending on availability, listing rules and platform state.'),
                    ],
                    [
                        'question' => __('Do I need a wallet?'),
                        'answer' => __('Wallet requirements depend on the action. Some public browsing does not need a wallet, while token or ownership flows may require a connected blockchain address.'),
                    ],
                    [
                        'question' => __('What is the token used for?'),
                        'answer' => __('The token supports platform utility such as marketplace activity, ecosystem participation and future game economy features, subject to the live product rules.'),
                    ],
                    [
                        'question' => __('Are marketplace purchases instant?'),
                        'answer' => __('Purchases may involve validation, wallet checks, ledger updates and blockchain-related confirmation steps. The interface should show the relevant status when an action is in progress.'),
                    ],
                    [
                        'question' => __('Can prices change?'),
                        'answer' => __('Yes. Marketplace prices can change based on seller decisions, availability, player quality, scarcity and demand.'),
                    ],
                ],
            ],
            [
                'id' => 'account-and-security',
                'label' => __('Account And Security'),
                'questions' => [
                    [
                        'question' => __('How is my account protected?'),
                        'answer' => __('The platform uses Laravel authentication, session protection, CSRF protection and account-level safeguards. You should also use a strong password and keep wallet credentials private.'),
                    ],
                    [
                        'question' => __('Does the platform ask for my private key?'),
                        'answer' => __('No. You should never share private keys or seed phrases. Any wallet interaction should happen through secure wallet tooling, not by sending secrets to the platform.'),
                    ],
                    [
                        'question' => __('Why might KYC be required?'),
                        'answer' => __('KYC may be required for compliance, fraud prevention, restricted flows or other operational safeguards. The KYC Policy explains the platform approach in more detail.'),
                    ],
                    [
                        'question' => __('Can I change my email or password?'),
                        'answer' => __('Account settings are available after sign-in. Security-sensitive changes may require confirmation or current credentials.'),
                    ],
                    [
                        'question' => __('What should I do if I notice suspicious activity?'),
                        'answer' => __('Secure your account, disconnect unknown sessions where available, review wallet activity and contact support with concise details about what happened.'),
                    ],
                ],
            ],
            [
                'id' => 'policies-and-support',
                'label' => __('Policies And Support'),
                'questions' => [
                    [
                        'question' => __('Where can I read the legal policies?'),
                        'answer' => __('The Legal section in the footer links to the Privacy Policy, Cookie Policy, Terms of Service, Disclaimer, KYC Policy and this FAQ page.'),
                    ],
                    [
                        'question' => __('How does the Cookie Policy affect me?'),
                        'answer' => __('Cookies help keep sessions secure, remember preferences and understand public page usage. You can review the Cookie Policy for more detail.'),
                    ],
                    [
                        'question' => __('How can I contact the team?'),
                        'answer' => __('Use the Contact page for support or general messages. Include the relevant account, club, transaction or match context when it helps the team investigate.'),
                    ],
                    [
                        'question' => __('Will this FAQ change?'),
                        'answer' => __('Yes. The FAQ can be updated as the platform evolves, especially when new game, marketplace, token or compliance features are released.'),
                    ],
                ],
            ],
        ];
    @endphp

    <main class="whitepaper-page">
        <section class="whitepaper-hero">
            <div class="container">
                <h1>{{ __('FAQ') }}</h1>
                <p>
                    {{ __('Answers to common questions about :app, covering account setup, clubs, players, matches, tournaments, marketplace activity, tokens, security and platform policies.', ['app' => config('app.name')]) }}
                </p>
            </div>
        </section>

        <section class="whitepaper-body">
            <div class="container whitepaper-layout">
                <aside class="whitepaper-nav" aria-label="{{ __('FAQ contents') }}" data-faq-nav>
                    <strong>{{ __('Contents') }}</strong>
                    @foreach ($faqSections as $section)
                        <a
                            @class(['active' => $loop->first])
                            href="#{{ $section['id'] }}"
                            data-faq-nav-link
                            @if($loop->first) aria-current="true" @endif
                        >
                            {{ $section['label'] }}
                        </a>
                    @endforeach
                </aside>

                <article class="whitepaper-content faq-content">
                    @foreach ($faqSections as $section)
                        <section id="{{ $section['id'] }}">
                            <h2>{{ $section['label'] }}</h2>

                            <div class="faq-list">
                                @foreach ($section['questions'] as $item)
                                    <details class="faq-item" @if($loop->parent->first && $loop->first) open @endif>
                                        <summary>
                                            <span>{{ $item['question'] }}</span>
                                        </summary>
                                        <p>{{ $item['answer'] }}</p>
                                    </details>
                                @endforeach
                            </div>
                        </section>
                    @endforeach
                </article>
            </div>
        </section>
    </main>
@stop
