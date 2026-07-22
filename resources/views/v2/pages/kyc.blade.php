@extends('v2.layout.layout')

@section('content')
    <main class="whitepaper-page">
        <section class="whitepaper-hero">
            <div class="container">
                <h1>{{ __('KYC Policy') }}</h1>
                <p>
                    {{ __('How :app may verify user identity, assess account risk and protect the platform from fraud, abuse, money laundering and other prohibited activity.', ['app' => config('app.name')]) }}
                </p>
            </div>
        </section>

        <section class="whitepaper-body">
            <div class="container whitepaper-layout">
                <aside class="whitepaper-nav" aria-label="{{ __('KYC policy contents') }}">
                    <strong>{{ __('Contents') }}</strong>
                    <a href="#overview" class="active">{{ __('Overview') }}</a>
                    <a href="#when-required">{{ __('When KYC May Be Required') }}</a>
                    <a href="#information">{{ __('Information We May Request') }}</a>
                    <a href="#review">{{ __('Review Process') }}</a>
                    <a href="#ongoing-monitoring">{{ __('Ongoing Monitoring') }}</a>
                    <a href="#data">{{ __('Data Protection') }}</a>
                    <a href="#restrictions">{{ __('Restrictions') }}</a>
                    <a href="#updates">{{ __('Policy Updates') }}</a>
                    <a href="#contact">{{ __('Contact') }}</a>
                </aside>

                <article class="whitepaper-content">
                    <section id="overview">
                        <h2>{{ __('Know Your Customer Policy') }}</h2>
                        <p>
                            {{ __('This KYC Policy explains the identity verification and risk review standards that may apply to users of :app. The purpose of these checks is to help keep the platform secure, comply with applicable legal obligations and prevent misuse of accounts, payments, digital assets or marketplace features.', ['app' => config('app.name')]) }}
                        </p>
                        <p>
                            {{ __('Access to some features may be limited until the required checks are completed. We may apply different verification levels depending on account activity, transaction volume, geography, risk indicators or regulatory requirements.') }}
                        </p>
                    </section>

                    <section id="when-required">
                        <h2>{{ __('1. When KYC May Be Required') }}</h2>
                        <p>{{ __('We may request identity verification before or after a user accesses certain platform features, including:') }}</p>
                        <ul>
                            <li>{{ __('Buying, selling, withdrawing or transferring platform assets.') }}</li>
                            <li>{{ __('Participating in higher-value transactions, rewards, raffles or marketplace activity.') }}</li>
                            <li>{{ __('Recovering, securing or changing sensitive account information.') }}</li>
                            <li>{{ __('Investigating suspicious, unusual, automated or potentially prohibited activity.') }}</li>
                            <li>{{ __('Complying with sanctions, anti-money laundering, fraud prevention or legal obligations.') }}</li>
                        </ul>
                    </section>

                    <section id="information">
                        <h2>{{ __('2. Information We May Request') }}</h2>
                        <p>{{ __('Depending on the level of review, users may be asked to provide one or more of the following:') }}</p>
                        <ul>
                            <li>{{ __('Full legal name, date of birth, country of residence and contact details.') }}</li>
                            <li>{{ __('A government-issued identity document, such as a passport, national ID card or driving licence.') }}</li>
                            <li>{{ __('Proof of address, such as a utility bill, bank statement or official document.') }}</li>
                            <li>{{ __('A selfie, liveness check or other evidence that the account holder matches the identity document.') }}</li>
                            <li>{{ __('Information about the source of funds or purpose of platform activity where required.') }}</li>
                        </ul>
                        <p>
                            {{ __('Submitted information must be accurate, current and belong to the account holder. Providing false, incomplete or misleading information may result in account restrictions.') }}
                        </p>
                    </section>

                    <section id="review">
                        <h2>{{ __('3. Review Process') }}</h2>
                        <p>
                            {{ __('KYC checks may be performed by us or by trusted verification providers acting on our behalf. Reviews may include document authenticity checks, identity matching, sanctions screening, politically exposed person screening, fraud signals and other risk controls.') }}
                        </p>
                        <p>
                            {{ __('We may approve, reject, request additional information or place temporary restrictions on an account while a review is pending. Approval of one review does not guarantee continued access if new risk indicators appear later.') }}
                        </p>
                    </section>

                    <section id="ongoing-monitoring">
                        <h2>{{ __('4. Ongoing Monitoring') }}</h2>
                        <p>
                            {{ __('We may monitor account activity on an ongoing basis to detect fraud, abuse, sanctions risk, account takeover attempts, suspicious transaction patterns or breaches of our Terms of Service. Additional checks may be required if account activity changes materially.') }}
                        </p>
                    </section>

                    <section id="data">
                        <h2>{{ __('5. Data Protection And Retention') }}</h2>
                        <p>
                            {{ __('KYC information is handled in accordance with our') }}
                        <a href="{{ public_route('pages.privacy') }}">{{ __('Privacy Policy') }}</a>{{ __('. We use reasonable technical and organisational safeguards to protect verification information from unauthorised access, loss, misuse or disclosure.') }}</p>
                        <p>
                            {{ __('Verification information may be retained for as long as necessary to meet legal, regulatory, fraud prevention, dispute resolution and record-keeping requirements. When retention is no longer necessary, data will be deleted, anonymised or otherwise handled according to applicable law.') }}
                        </p>
                    </section>

                    <section id="restrictions">
                        <h2>{{ __('6. Account Restrictions') }}</h2>
                        <p>{{ __('We may restrict, suspend or close an account if:') }}</p>
                        <ul>
                            <li>{{ __('The user does not complete required KYC checks.') }}</li>
                            <li>{{ __('The submitted information cannot be verified.') }}</li>
                            <li>{{ __('The account is linked to fraud, sanctions, money laundering, abuse or prohibited conduct.') }}</li>
                            <li>{{ __('The user attempts to bypass verification, create duplicate identities or use another person\'s documents.') }}</li>
                            <li>{{ __('We are required to do so by law, a competent authority or a risk control obligation.') }}</li>
                        </ul>
                    </section>

                    <section id="updates">
                        <h2>{{ __('7. Policy Updates') }}</h2>
                        <p>
                            {{ __('We may update this KYC Policy from time to time to reflect changes in our platform, verification providers, risk controls, business operations or applicable legal requirements. The version published on this page is the current version.') }}
                        </p>
                    </section>

                    <section id="contact">
                        <h2>{{ __('8. Contact') }}</h2>
                        <p>
                            {{ __('For questions about this KYC Policy or an identity verification request, contact us through the official support channels listed on the website.') }}
                        </p>
                    </section>
                </article>
            </div>
        </section>
    </main>
@stop
