@extends('v2.layout.layout')

@section('content')
    @php
        $vestingStatus = [
            'Vesting Status' => __('Coming soon'),
            'Token Symbol' => '$SQUADEX',
            'Network' => 'TBC',
            'Official Token Contract' => __('Coming soon'),
            'Vesting Contract' => __('Coming soon'),
            'Vesting Start Date' => 'TBC',
            'First Unlock Date' => 'TBC',
            'Total Vesting Duration' => 'TBC',
            'Cliff Period' => 'TBC',
            'Unlock Frequency' => 'TBC',
            'Launch Status' => __('Not launched'),
        ];

        $vestingMeaningCards = [ __('Gradual token release'), __('Allocation lock-ups'), __('Contributor alignment'), __('Treasury planning'), __('Ecosystem incentives'), __('Does not remove market risk'),
        ];

        $officialVestingInformation = [
            ['field' => __('Network'), 'value' => 'TBC'],
            ['field' => __('Token Contract'), 'value' => __('Coming soon')],
            ['field' => __('Vesting Contract'), 'value' => __('Coming soon')],
            ['field' => __('Vesting Start Date'), 'value' => 'TBC'],
            ['field' => __('First Unlock Date'), 'value' => 'TBC'],
            ['field' => __('Cliff Period'), 'value' => 'TBC'],
            ['field' => __('Unlock Frequency'), 'value' => 'TBC'],
            ['field' => __('Total Vesting Duration'), 'value' => 'TBC'],
            ['field' => __('Claim Method'), 'value' => 'TBC'],
            ['field' => __('Explorer Link'), 'value' => __('Coming soon')],
        ];

        $allocationSchedule = [
            ['category' => __('Community & Ecosystem'), 'allocation' => 'TBC', 'cliff' => 'TBC', 'duration' => 'TBC', 'frequency' => 'TBC', 'status' => __('Planned')],
            ['category' => __('Liquidity'), 'allocation' => 'TBC', 'cliff' => 'TBC', 'duration' => 'TBC', 'frequency' => 'TBC', 'status' => __('Planned')],
            ['category' => __('Treasury'), 'allocation' => 'TBC', 'cliff' => 'TBC', 'duration' => 'TBC', 'frequency' => 'TBC', 'status' => __('Planned')],
            ['category' => __('Marketing & Partnerships'), 'allocation' => 'TBC', 'cliff' => 'TBC', 'duration' => 'TBC', 'frequency' => 'TBC', 'status' => __('Planned')],
            ['category' => __('Team'), 'allocation' => 'TBC', 'cliff' => 'TBC', 'duration' => 'TBC', 'frequency' => 'TBC', 'status' => __('Planned')],
            ['category' => __('Advisors & Strategic Contributors'), 'allocation' => 'TBC', 'cliff' => 'TBC', 'duration' => 'TBC', 'frequency' => 'TBC', 'status' => __('Planned')],
            ['category' => __('Presale'), 'allocation' => 'TBC', 'cliff' => 'TBC', 'duration' => 'TBC', 'frequency' => 'TBC', 'status' => __('Planned')],
        ];

        $unlockTimeline = [
            [
                'phase' => __('Phase 1'),
                'title' => __('Launch Allocation'),
                'status' => 'TBC',
                'description' => __('Initial circulating allocation available at or around launch, subject to final tokenomics.'),
            ],
            [
                'phase' => __('Phase 2'),
                'title' => __('Cliff Period'),
                'status' => 'TBC',
                'description' => __('A period during which selected locked allocations may not be released.'),
            ],
            [
                'phase' => __('Phase 3'),
                'title' => __('Gradual Unlocks'),
                'status' => 'TBC',
                'description' => __('Scheduled token releases according to the final vesting model.'),
            ],
            [
                'phase' => __('Phase 4'),
                'title' => __('Long-Term Release Completion'),
                'status' => 'TBC',
                'description' => __('Completion of planned vesting schedules for applicable allocations.'),
            ],
        ];

        $verificationChecklist = [ __('Confirm the vesting contract is listed on the official Squadex website.'), __('Confirm the token contract matches the official Contract page.'), __('Confirm the blockchain network is correct.'), __('Confirm the claim method is official.'), __('Confirm the explorer link is published by Squadex.'), __('Confirm the unlock schedule matches official documentation.'), __('Avoid claim links shared in private messages or unofficial groups.'), __('Do not sign unknown wallet transactions.'),
        ];

        $claimSteps = [
            [
                'step' => __('Step 1'),
                'title' => __('Confirm claim availability'),
                'description' => __('Check the official Squadex website to confirm whether claiming is live.'),
            ],
            [
                'step' => __('Step 2'),
                'title' => __('Verify the claim link'),
                'description' => __('Use only the claim link published on the official Squadex website.'),
            ],
            [
                'step' => __('Step 3'),
                'title' => __('Connect the correct wallet'),
                'description' => __('Connect the wallet used for the relevant allocation or participation round, if applicable.'),
            ],
            [
                'step' => __('Step 4'),
                'title' => __('Review the transaction'),
                'description' => __('Check the contract interaction, token amount, network fees and wallet permissions.'),
            ],
            [
                'step' => __('Step 5'),
                'title' => __('Confirm and save transaction details'),
                'description' => __('After claiming, save the transaction hash and verify it through the official explorer link.'),
            ],
        ];

        $supplyImpactCards = [ __('Initial circulating supply'), __('Locked supply'), __('Scheduled unlocks'), __('Treasury releases'), __('Team/adviser releases'), __('Ecosystem incentives'), __('Market conditions'), __('Transparency reporting'),
        ];

        $riskCards = [ __('Unlocks may increase circulating supply.'), __('Market conditions may change.'), __('Liquidity may be limited.'), __('Claim processes may involve smart contract risk.'), __('Wallet transactions may be irreversible.'), __('Timelines may change before launch.'), __('Vesting does not guarantee price stability.'), __('Users should verify all official information.'),
        ];

        $officialLinks = [
            ['label' => __('Tokenomics'), 'value' => __('/tokenomics'), 'href' => public_route('pages.tokenomics')],
            ['label' => __('Token Transparency'), 'value' => __('/token-transparency'), 'href' => public_route('pages.token-transparency')],
            ['label' => __('Contract'), 'value' => __('/contract'), 'href' => public_route('pages.contract')],
            ['label' => __('Liquidity'), 'value' => __('/liquidity'), 'href' => public_route('pages.liquidity')],
            ['label' => __('Presale'), 'value' => __('/presale'), 'href' => public_route('pages.presale')],
            ['label' => __('Vesting Contract'), 'value' => __('Coming soon'), 'href' => null],
            ['label' => __('Claim Link'), 'value' => __('Coming soon'), 'href' => null],
            ['label' => __('Explorer Link'), 'value' => __('Coming soon'), 'href' => null],
        ];

        $scamWarnings = [ __('Do not trust claim links from private messages.'), __('Do not rely on screenshots of vesting contracts.'), __('Do not connect your wallet to unofficial claim pages.'), __('Do not sign unknown wallet permissions.'), __('Do not assume a claim is official because it uses the Squadex name.'), __('Do not share your seed phrase or private key.'), __('Always check the official Squadex Contract page first.'), __('Bookmark the official Squadex website.'),
        ];

        $faqItems = [
            [
                'question' => __('What is token vesting?'),
                'answer' => __('Token vesting is a release schedule where certain token allocations are locked and released gradually over time.'),
            ],
            [
                'question' => __('Is the Squadex vesting schedule final?'),
                'answer' => __('Final vesting details will be confirmed through official Squadex channels before or around launch.'),
            ],
            [
                'question' => __('What is a cliff period?'),
                'answer' => __('A cliff period is an initial lock-up period before tokens begin to unlock.'),
            ],
            [
                'question' => __('Where will the official vesting contract be published?'),
                'answer' => __('If a vesting contract is used, it will be published on the official Squadex website and official Squadex communication channels.'),
            ],
            [
                'question' => __('Will all tokens be unlocked at launch?'),
                'answer' => __('Final circulating supply and locked allocation details will be confirmed in the official tokenomics and vesting information.'),
            ],
            [
                'question' => __('Does vesting guarantee price stability?'),
                'answer' => __('No. Vesting can support transparency and alignment, but it does not guarantee price stability, returns or market performance.'),
            ],
            [
                'question' => __('How do I avoid fake claim links?'),
                'answer' => __('Only use claim links published on the official Squadex website. Avoid links from private messages, screenshots or unofficial groups.'),
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
                <section class="token-roadmap-intro" aria-labelledby="vesting-title">
                    <span class="tokenomics-kicker">{{ __('Vesting') }}</span>
                    <h1 id="vesting-title">{{ __('Squadex Vesting') }}</h1>
                    <p>
                        {{ __('This page explains how Squadex plans to communicate token vesting, allocation lock-ups, unlock schedules and long-term token release transparency.') }}
                    </p>
                    <strong>
                        {{ __('This page is for informational purposes only and does not constitute financial advice. Vesting details, lock-up periods, unlock dates and allocation schedules may change before launch.') }}
                    </strong>
                    <nav class="token-roadmap-intro-actions" aria-label="{{ __('Vesting quick links') }}">
                        <a href="{{ public_route('pages.tokenomics') }}">{{ __('View Tokenomics') }}</a>
                        <a href="{{ public_route('pages.token-transparency') }}">{{ __('View Token Transparency') }}</a>
                    </nav>
                </section>

                <section class="tokenomics-panel" aria-labelledby="vesting-status">
                    <div class="tokenomics-section-head">
                        <span class="tokenomics-kicker">{{ __('Status') }}</span>
                        <h2 id="vesting-status">{{ __('Vesting Status') }}</h2>
                    </div>
                    <dl class="tokenomics-overview-grid">
                        @foreach ($vestingStatus as $label => $value)
                            <div>
                                <dt>{{ $label }}</dt>
                                <dd>{{ $value }}</dd>
                            </div>
                        @endforeach
                    </dl>
                    <p class="tokenomics-note">
                        {{ __('Do not trust any vesting contract, unlock schedule or claim link unless it is published on the official Squadex website and confirmed through official Squadex communication channels.') }}
                    </p>
                </section>

                <section class="tokenomics-panel" aria-labelledby="what-vesting-means">
                    <span class="tokenomics-kicker">{{ __('Foundation') }}</span>
                    <h2 id="what-vesting-means">{{ __('What Vesting Means') }}</h2>
                    <p>
                        {{ __('Vesting is a token release mechanism where certain token allocations are locked and released gradually over time. It is commonly used to align contributors, teams, advisers, ecosystem incentives and treasury allocations with the long-term development of a project.') }}
                    </p>
                    <ul class="tokenomics-check-list">
                        @foreach ($vestingMeaningCards as $card)
                            <li>{{ $card }}</li>
                        @endforeach
                    </ul>
                    <p class="tokenomics-note">
                        {{ __('Vesting can improve transparency and long-term alignment, but it does not guarantee token price stability or future market performance.') }}
                    </p>
                </section>

                <section class="tokenomics-panel" aria-labelledby="official-vesting-information">
                    <div class="tokenomics-section-head">
                        <span class="tokenomics-kicker">{{ __('Official Information') }}</span>
                        <h2 id="official-vesting-information">{{ __('Official Vesting Information') }}</h2>
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
                                @foreach ($officialVestingInformation as $row)
                                    <tr>
                                        <th scope="row">{{ $row['field'] }}</th>
                                        <td>{{ $row['value'] }}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    <p class="tokenomics-note">
                        {{ __('Final vesting details will be published only through official Squadex channels. Users should verify the token contract, vesting contract, claim process and unlock schedule before interacting with any token-related contract.') }}
                    </p>
                </section>

                <section class="tokenomics-panel" aria-labelledby="allocation-vesting-schedule">
                    <div class="tokenomics-section-head">
                        <span class="tokenomics-kicker">{{ __('Schedule') }}</span>
                        <h2 id="allocation-vesting-schedule">{{ __('Allocation Vesting Schedule') }}</h2>
                    </div>
                    <p>
                        {{ __('The final vesting schedule will be confirmed before or around launch. Any placeholder values shown before launch should be treated as provisional until official tokenomics are finalised.') }}
                    </p>
                    <div class="tokenomics-table-wrap">
                        <table class="tokenomics-table">
                            <thead>
                                <tr>
                                    <th scope="col">{{ __('Category') }}</th>
                                    <th scope="col">{{ __('Allocation') }}</th>
                                    <th scope="col">{{ __('Cliff') }}</th>
                                    <th scope="col">{{ __('Vesting Duration') }}</th>
                                    <th scope="col">{{ __('Unlock Frequency') }}</th>
                                    <th scope="col">{{ __('Status') }}</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($allocationSchedule as $row)
                                    <tr>
                                        <th scope="row">{{ $row['category'] }}</th>
                                        <td>{{ $row['allocation'] }}</td>
                                        <td>{{ $row['cliff'] }}</td>
                                        <td>{{ $row['duration'] }}</td>
                                        <td>{{ $row['frequency'] }}</td>
                                        <td>{{ $row['status'] }}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </section>

                <section class="tokenomics-panel" aria-labelledby="unlock-timeline">
                    <span class="tokenomics-kicker">{{ __('Timeline') }}</span>
                    <h2 id="unlock-timeline">{{ __('Unlock Timeline') }}</h2>
                    <p>
                        {{ __('The unlock timeline will show when locked token allocations are expected to become available. Once finalised, Squadex intends to publish a clear release schedule so users can understand planned token circulation over time.') }}
                    </p>
                    <div class="token-roadmap-timeline">
                        @foreach ($unlockTimeline as $phase)
                            <article class="token-roadmap-card">
                                <div class="token-roadmap-card-head">
                                    <span>{{ $phase['phase'] }}</span>
                                    <strong>{{ $phase['status'] }}</strong>
                                </div>
                                <h3>{{ $phase['title'] }}</h3>
                                <p>{{ $phase['description'] }}</p>
                            </article>
                        @endforeach
                    </div>
                    <p class="tokenomics-note">
                        {{ __('Unlock timelines may affect circulating supply and market conditions. Users should consider unlock schedules as part of their own research.') }}
                    </p>
                </section>

                <section class="tokenomics-panel" aria-labelledby="vesting-contract-verification">
                    <span class="tokenomics-kicker">{{ __('Verification') }}</span>
                    <h2 id="vesting-contract-verification">{{ __('Vesting Contract Verification') }}</h2>
                    <p>
                        {{ __('If Squadex uses a vesting contract, users should verify that the contract address, network and claim process are listed on the official Squadex website before interacting with it.') }}
                    </p>
                    <ul class="tokenomics-check-list">
                        @foreach ($verificationChecklist as $item)
                            <li>{{ $item }}</li>
                        @endforeach
                    </ul>
                    <div class="contract-disabled-action">
                        <button type="button" disabled>{{ __('Open Vesting Contract') }}</button>
                    </div>
                </section>

                <section class="tokenomics-panel" aria-labelledby="token-claim-process">
                    <span class="tokenomics-kicker">{{ __('Claim Process') }}</span>
                    <h2 id="token-claim-process">{{ __('Token Claim Process') }}</h2>
                    <p>
                        {{ __('If token claiming is required, the official claim process will be published through Squadex channels. Users should only use official claim links and should carefully review wallet permissions before confirming any transaction.') }}
                    </p>
                    <div class="token-roadmap-timeline">
                        @foreach ($claimSteps as $step)
                            <article class="token-roadmap-card">
                                <div class="token-roadmap-card-head">
                                    <span>{{ $step['step'] }}</span>
                                </div>
                                <h3>{{ $step['title'] }}</h3>
                                <p>{{ $step['description'] }}</p>
                            </article>
                        @endforeach
                    </div>
                    <div class="contract-disabled-action">
                        <button type="button" disabled>{{ __('Open Claim Link') }}</button>
                    </div>
                    <p class="tokenomics-note">
                        {{ __('Squadex will never ask for your seed phrase, private key or wallet recovery phrase.') }}
                    </p>
                </section>

                <section class="tokenomics-panel" aria-labelledby="circulating-supply-impact">
                    <span class="tokenomics-kicker">{{ __('Supply') }}</span>
                    <h2 id="circulating-supply-impact">{{ __('Circulating Supply Impact') }}</h2>
                    <p>
                        {{ __('Vesting and unlock schedules may affect circulating supply over time. As tokens unlock, the amount of available supply may increase according to the published schedule.') }}
                    </p>
                    <ul class="tokenomics-check-list">
                        @foreach ($supplyImpactCards as $card)
                            <li>{{ $card }}</li>
                        @endforeach
                    </ul>
                    <p class="tokenomics-note">
                        {{ __('Vesting information helps users understand potential supply changes, but it does not predict market price or trading behaviour.') }}
                    </p>
                </section>

                <section class="tokenomics-risk" aria-labelledby="vesting-risk-notice">
                    <span class="tokenomics-kicker">{{ __('Risk Notice') }}</span>
                    <h2 id="vesting-risk-notice">{{ __('Vesting Risk Notice') }}</h2>
                    <p>
                        {{ __('Vesting can support long-term alignment and transparency, but it does not remove token-related risks. Users should understand how unlocks, circulating supply, market conditions and liquidity may affect token dynamics.') }}
                    </p>
                    <ul class="tokenomics-check-list">
                        @foreach ($riskCards as $risk)
                            <li>{{ $risk }}</li>
                        @endforeach
                    </ul>
                </section>

                <section class="tokenomics-panel" aria-labelledby="official-vesting-links">
                    <span class="tokenomics-kicker">{{ __('Official Links') }}</span>
                    <h2 id="official-vesting-links">{{ __('Official Vesting Links') }}</h2>
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
                    <div class="contract-disabled-action">
                        <button type="button" disabled>{{ __('Open Explorer') }}</button>
                    </div>
                    <p class="tokenomics-note">
                        {{ __('If a vesting contract, claim link or unlock schedule is not listed on the official Squadex website, treat it as unverified.') }}
                    </p>
                </section>

                <section class="tokenomics-risk" aria-labelledby="avoid-fake-vesting-claim-links">
                    <span class="tokenomics-kicker">{{ __('Scam Prevention') }}</span>
                    <h2 id="avoid-fake-vesting-claim-links">{{ __('Avoid Fake Vesting & Claim Links') }}</h2>
                    <p>
                        {{ __('Fake claim pages, fake unlock links and impersonation attempts are common in crypto markets. Users should verify every vesting link, claim link and contract address before connecting a wallet or confirming a transaction.') }}
                    </p>
                    <ul class="tokenomics-check-list">
                        @foreach ($scamWarnings as $warning)
                            <li>{{ $warning }}</li>
                        @endforeach
                    </ul>
                    <p class="tokenomics-note">
                        {{ __('Squadex will never contact users privately to request wallet recovery phrases, seed phrases or private keys.') }}
                    </p>
                </section>

                <section class="tokenomics-panel" aria-labelledby="vesting-faq">
                    <span class="tokenomics-kicker">{{ __('FAQ') }}</span>
                    <h2 id="vesting-faq">{{ __('Vesting FAQ') }}</h2>
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

                <section class="tokenomics-cta" aria-labelledby="vesting-cta">
                    <span class="tokenomics-kicker">{{ __('Transparency') }}</span>
                    <h2 id="vesting-cta">{{ __('Track token releases transparently') }}</h2>
                    <p>
                        {{ __('Review the official Squadex tokenomics, contract and transparency pages to understand confirmed token allocation and vesting information before interacting with any claim or vesting contract.') }}
                    </p>
                    <nav aria-label="{{ __('Vesting next steps') }}">
                        <a href="{{ public_route('pages.tokenomics') }}">{{ __('View Tokenomics') }}</a>
                        <a href="{{ public_route('pages.contract') }}">{{ __('View Contract') }}</a>
                        <a href="{{ public_route('pages.token-transparency') }}">{{ __('View Token Transparency') }}</a>
                    </nav>
                </section>
            </div>
        </section>
    </main>
@stop
