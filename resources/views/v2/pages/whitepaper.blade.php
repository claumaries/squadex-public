@extends('v2.layout.layout')

@section('content')
    @php
        $tokenName = config('app.token_name');
    @endphp

    <main class="whitepaper-page">
        <section class="whitepaper-hero">
            <div class="container">
                <h1>{{ __(':app Whitepaper', ['app' => config('app.name')]) }}</h1>
                <p>
                    {{ __('A practical overview of the :app football management ecosystem, its product model, token utility, marketplace economy, roadmap and long-term operating principles.', ['app' => config('app.name')]) }}
                </p>
            </div>
        </section>

        <section class="whitepaper-body">
            <div class="container whitepaper-layout">
                <aside class="whitepaper-nav" aria-label="{{ __('Whitepaper table of contents') }}" data-whitepaper-nav>
                    <strong>{{ __('Contents') }}</strong>
                    <a href="#summary" class="active">{{ __('Executive Summary') }}</a>
                    <a href="#problem">{{ __('Problem') }}</a>
                    <a href="#solution">{{ __('Solution') }}</a>
                    <a href="#product">{{ __('Product') }}</a>
                    <a href="#token">{{ __('Token Utility') }}</a>
                    <a href="#economy">{{ __('Economy') }}</a>
                    <a href="#roadmap">{{ __('Roadmap') }}</a>
                    <a href="#governance">{{ __('Governance') }}</a>
                    <a href="#risks">{{ __('Risk Framework') }}</a>
                    <a href="#disclaimer">{{ __('Disclaimer') }}</a>
                </aside>

                <article class="whitepaper-content">
                    <section id="summary">
                        <h2>{{ __('1. Executive Summary') }}</h2>
                        <p>
                            {{ __(':app is a football management platform designed around competitive gameplay, digital club ownership, player assets, marketplace activity and token-based utility. The project aims to combine the familiar depth of a football manager experience with transparent digital ownership and a long-term ecosystem economy.', ['app' => config('app.name')]) }}
                        </p>
                        <p>
                            {{ __('The platform is built for users who want to manage clubs, make tactical decisions, compete in leagues and tournaments, improve their squad, participate in marketplace activity and use the :token token as a practical in-platform utility asset.', ['token' => $tokenName]) }}
                        </p>
                    </section>

                    <section id="problem">
                        <h2>{{ __('2. Market Problem') }}</h2>
                        <p>
                            {{ __('Traditional football management games are engaging, but most user progress remains locked inside closed systems. Players may spend time building clubs, squads and achievements, yet those assets usually have limited portability, ownership clarity or economic interaction.') }}
                        </p>
                        <p>
                            {{ __('Many Web3 gaming products have taken the opposite approach: they focus heavily on tokens before building a strong game loop. This often creates short-term speculation without a sustainable product foundation. :app is designed to solve this by keeping football gameplay at the center and using blockchain utility only where it adds practical value.', ['app' => config('app.name')]) }}
                        </p>
                    </section>

                    <section id="solution">
                        <h2>{{ __('3. The :app Solution', ['app' => config('app.name')]) }}</h2>
                        <p>
                            {{ __(':app connects football simulation, ownership mechanics, marketplace utility and token rewards inside one ecosystem. Managers can build clubs, compete against other clubs, acquire or improve assets and participate in an economy that supports long-term progression.', ['app' => config('app.name')]) }}
                        </p>
                        <ul>
                            <li>{{ __('Football-first gameplay with fixtures, standings, results and tactical decisions.') }}</li>
                            <li>{{ __('Digital ownership of selected clubs, players, packs or ecosystem assets.') }}</li>
                            <li>{{ __('Marketplace activity for assets and consumables.') }}</li>
                            <li>{{ __(':token utility for rewards, purchases, upgrades and future participation.', ['token' => $tokenName]) }}</li>
                            <li>{{ __('A staged roadmap that prioritizes product quality before aggressive expansion.') }}</li>
                        </ul>
                    </section>

                    <section id="product">
                        <h2>{{ __('4. Product Architecture') }}</h2>
                        <p>
                            {{ __('The product is organized around several connected modules. Each module should be useful on its own while also contributing to the wider ecosystem.') }}
                        </p>

                        <h3>{{ __('Club Management') }}</h3>
                        <p>
                            {{ __('Managers control football clubs, review performance, follow league tables, prepare for fixtures and make decisions that affect long-term progression.') }}
                        </p>

                        <h3>{{ __('Match and Competition Layer') }}</h3>
                        <p>
                            {{ __('The match layer supports competitive results, fixtures, standings and tournament structures. Over time, this layer can support deeper tactical tools, seasonal formats and manager-vs-manager competition.') }}
                        </p>

                        <h3>{{ __('Marketplace Layer') }}</h3>
                        <p>
                            {{ __('The marketplace is intended to support player assets, packs, club upgrades and consumables. Marketplace design should prioritize usability, transparent pricing and practical gameplay benefits.') }}
                        </p>

                        <h3>{{ __('Asset Layer') }}</h3>
                        <p>
                            {{ __('Digital assets may include players, clubs, packs, stadium-related assets or other future utility items. Asset design must remain tied to gameplay value rather than empty collection.') }}
                        </p>
                    </section>

                    <section id="token">
                        <h2>{{ __('5. :token Token Utility', ['token' => $tokenName]) }}</h2>
                        <p>
                            {{ __('The :token token is designed as an ecosystem utility token. Its purpose is to support platform activity, not to replace the core football manager experience.', ['token' => $tokenName]) }}
                        </p>
                        <ul>
                            <li>{{ __('Purchase selected packs, assets, upgrades or consumables.') }}</li>
                            <li>{{ __('Support tournament rewards and performance-based incentives.') }}</li>
                            <li>{{ __('Enable marketplace activity where token settlement is appropriate.') }}</li>
                            <li>{{ __('Provide access to future governance or ecosystem participation features.') }}</li>
                            <li>{{ __('Support promotional campaigns, rewards and community events.') }}</li>
                        </ul>
                        <p>
                            {{ __('Token utility should grow with the product. New use cases should be added only when they improve gameplay, liquidity, user experience or ecosystem sustainability.') }}
                        </p>
                    </section>

                    <section id="economy">
                        <h2>{{ __('6. Ecosystem Economy') }}</h2>
                        <p>
                            {{ __('The economy is designed around real product activity: competition, asset demand, marketplace transactions and user progression. A healthy economy should avoid relying only on speculative token demand.') }}
                        </p>
                        <p>
                            {{ __('Economic sinks may include asset purchases, upgrades, tournament entries, marketplace fees, premium utility and future club development mechanics. Economic rewards may include tournament payouts, seasonal achievements, promotional incentives and ecosystem participation rewards.') }}
                        </p>
                        <p>
                            {{ __('The long-term objective is balance: enough utility to make the token useful, enough friction to protect the economy and enough product value to keep users engaged beyond short-term cycles.') }}
                        </p>
                    </section>

                    <section id="roadmap">
                        <h2>{{ __('7. Roadmap') }}</h2>
                        <p>
                            {{ __('The roadmap is intentionally phased. Each phase should strengthen the product before the ecosystem expands into more advanced features.') }}
                        </p>
                        <ol>
                            <li><strong>{{ __('Foundation:') }}</strong>{{ __('public website, core platform, club pages, fixtures, results and token page.') }}</li>
                            <li><strong>{{ __('Gameplay Expansion:') }}</strong>{{ __('richer club management, improved match reporting and deeper tactical tools.') }}</li>
                            <li><strong>{{ __('Marketplace Utility:') }}</strong>{{ __('player packs, assets, consumables and improved purchase flows.') }}</li>
                            <li><strong>{{ __('Competitive Layer:') }}</strong>{{ __('tournament formats, leaderboards and performance-based rewards.') }}</li>
                            <li><strong>{{ __('Governance and Community:') }}</strong>{{ __('future voting, proposals and community participation mechanisms.') }}</li>
                        </ol>
                    </section>

                    <section id="governance">
                        <h2>{{ __('8. Governance Principles') }}</h2>
                        <p>
                            {{ __('Governance should be introduced gradually. Early-stage projects need product stability before governance becomes meaningful. Future governance may allow the community to participate in ecosystem decisions such as tournament formats, feature priorities, marketplace rules or selected reward parameters.') }}
                        </p>
                        <p>
                            {{ __('Governance should not compromise platform security, regulatory compliance, game integrity or operational stability. Critical infrastructure and risk controls must remain professionally managed.') }}
                        </p>
                    </section>

                    <section id="risks">
                        <h2>{{ __('9. Risk Framework') }}</h2>
                        <p>
                            {{ __(':app operates in a market with product, technical, regulatory and economic risks. A sustainable ecosystem requires these risks to be acknowledged clearly.', ['app' => config('app.name')]) }}
                        </p>
                        <ul>
                            <li><strong>{{ __('Product risk:') }}</strong>{{ __('features must be useful and enjoyable enough to retain users.') }}</li>
                            <li><strong>{{ __('Economic risk:') }}</strong>{{ __('token utility must be balanced to avoid unhealthy speculation.') }}</li>
                            <li><strong>{{ __('Technical risk:') }}</strong>{{ __('smart-contract and platform components must be secured and monitored.') }}</li>
                            <li><strong>{{ __('Regulatory risk:') }}</strong>{{ __('token-related features may require regional restrictions or compliance controls.') }}</li>
                            <li><strong>{{ __('Operational risk:') }}</strong>{{ __('the platform must handle growth, abuse prevention and user support responsibly.') }}</li>
                        </ul>
                    </section>

                    <section id="disclaimer">
                        <h2>{{ __('10. Disclaimer') }}</h2>
                        <p>
                            {{ __('This whitepaper is provided for informational purposes only. It does not constitute financial, investment, legal or tax advice. The :token token is intended for platform utility where supported by the product and applicable law. Roadmap items, features and token utility may change based on development priorities, security considerations, user feedback, market conditions and regulatory requirements.', ['token' => $tokenName]) }}
                        </p>
                    </section>
                </article>
            </div>
        </section>
    </main>
@stop
