@extends('v2.layout.layout')

@section('content')
    <main class="whitepaper-page">
        <section class="whitepaper-hero">
            <div class="container">
                <h1>{{ trans('custom.privacy_policy') }}</h1>
                <p>
                    {{ __('How :app collects, uses, stores and protects personal information across the public website and related platform services.', ['app' => config('app.name')]) }}
                </p>
            </div>
        </section>

        <section class="whitepaper-body">
            <div class="container whitepaper-layout">
                <aside class="whitepaper-nav" aria-label="{{ __('Privacy policy contents') }}">
                    <strong>{{ __('Contents') }}</strong>
                    <a href="#overview" class="active">{{ __('Overview') }}</a>
                    <a href="#collect">{{ __('Information We Collect') }}</a>
                    <a href="#log-data">{{ __('Log Data') }}</a>
                    <a href="#personal">{{ __('Personal Information') }}</a>
                    <a href="#use">{{ __('Use Of Information') }}</a>
                    <a href="#security">{{ __('Security') }}</a>
                    <a href="#retention">{{ __('Retention') }}</a>
                    <a href="#disclosure">{{ __('Disclosure') }}</a>
                    <a href="#rights">{{ __('Your Rights') }}</a>
                    <a href="#cookies">{{ __('Cookies') }}</a>
                    <a href="#contact">{{ __('Contact') }}</a>
                </aside>

                <article class="whitepaper-content">
                    <section id="overview">
                        <h2>{{ __(':app Privacy Policy', ['app' => config('app.name')]) }}</h2>
                        <p>
                            {{ __('Your privacy is important to us. It is :app\'s policy to respect your privacy and comply with applicable law and regulation regarding personal information we may collect about you, including across our website and other sites we own and operate.', ['app' => config('app.name')]) }}
                        </p>
                        <p>{{ __('This policy is effective as of 2 October 2023 and was last updated on 2 October 2023.') }}</p>
                    </section>

                    <section id="collect">
                        <h2>{{ __('Information We Collect') }}</h2>
                        <p>
                            {{ __('Information we collect includes information you knowingly and actively provide when using or participating in our services and promotions, and information automatically sent by your devices while accessing our products and services.') }}
                        </p>
                    </section>

                    <section id="log-data">
                        <h2>{{ __('Log Data') }}</h2>
                        <p>
                            {{ __('When you visit our website, our servers may automatically log standard data provided by your web browser. This may include your IP address, browser type and version, pages visited, time and date of visit, time spent on each page, other visit details and technical details related to errors.') }}
                        </p>
                        <p>
                            {{ __('While this information may not identify you by itself, it may be possible to combine it with other data to identify individual persons.') }}
                        </p>
                    </section>

                    <section id="personal">
                        <h2>{{ __('Personal Information') }}</h2>
                        <p>{{ __('We may ask for personal information including one or more of the following:') }}</p>
                        <ul>
                            <li>{{ __('Name') }}</li>
                            <li>{{ __('Email') }}</li>
                        </ul>

                        <h3>{{ __('Legitimate Reasons For Processing') }}</h3>
                        <p>
                            {{ __('We only collect and use personal information when we have a legitimate reason to do so. In that instance, we only collect personal information reasonably necessary to provide services.') }}
                        </p>
                    </section>

                    <section id="use">
                        <h2>{{ __('Collection And Use Of Information') }}</h2>
                        <p>{{ __('We may collect personal information when you:') }}</p>
                        <ul>
                            <li>{{ __('Sign up to receive updates from us via email or social media channels.') }}</li>
                            <li>{{ __('Use a mobile device or web browser to access our content.') }}</li>
                            <li>{{ __('Contact us via email, social media or similar technologies.') }}</li>
                            <li>{{ __('Mention us on social media.') }}</li>
                        </ul>
                        <p>{{ __('We may collect, hold, use and disclose information for the following purposes:') }}</p>
                        <ul>
                            <li>{{ __('To enable you to customize or personalize your website experience.') }}</li>
                            <li>{{ __('To enable you to access and use the website, associated applications and social media platforms.') }}</li>
                        </ul>
                        <p>
                            {{ __('We may combine information we collect about you with general information or research data received from trusted sources.') }}
                        </p>
                    </section>

                    <section id="security">
                        <h2>{{ __('Security Of Your Personal Information') }}</h2>
                        <p>
                            {{ __('When we collect and process personal information, and while we retain it, we protect it within commercially acceptable means to prevent loss, theft, unauthorized access, disclosure, copying, use or modification.') }}
                        </p>
                        <p>
                            {{ __('No method of electronic transmission or storage is 100% secure, and no one can guarantee absolute data security. We will comply with laws applicable to us in respect of data breaches.') }}
                        </p>
                        <p>
                            {{ __('You are responsible for selecting any password and its overall security strength, ensuring the security of your own information within the bounds of our services.') }}
                        </p>
                    </section>

                    <section id="retention">
                        <h2>{{ __('How Long We Keep Personal Information') }}</h2>
                        <p>
                            {{ __('We keep personal information only for as long as needed. This period may depend on what we use the information for under this privacy policy.') }}
                        </p>
                        <p>
                            {{ __('If personal information is no longer required, we will delete it or make it anonymous by removing identifying details. If necessary, we may retain personal information for legal, accounting, reporting, archiving, research or statistical obligations.') }}
                        </p>
                    </section>

                    <section id="disclosure">
                        <h2>{{ __('Disclosure To Third Parties') }}</h2>
                        <p>{{ __('We may disclose personal information to:') }}</p>
                        <ul>
                            <li>{{ __('A parent, subsidiary or affiliate of our company.') }}</li>
                            <li>{{ __('Third-party service providers such as IT, storage, hosting, server, advertising or analytics providers.') }}</li>
                            <li>{{ __('Our employees, contractors and related entities.') }}</li>
                            <li>{{ __('Existing or potential agents and business partners.') }}</li>
                            <li>{{ __('Sponsors or promoters of competitions, sweepstakes or promotions we run.') }}</li>
                            <li>{{ __('Courts, tribunals, regulatory authorities and law enforcement officers as required by law.') }}</li>
                            <li>{{ __('Third parties who assist us in providing information, products, services or direct marketing.') }}</li>
                        </ul>

                        <h3>{{ __('International Transfers') }}</h3>
                        <p>
                            {{ __('Personal information may be stored or processed where we, partners, affiliates and third-party providers maintain facilities. Those locations may not have the same data protection laws as the country in which you initially provided the information.') }}
                        </p>
                    </section>

                    <section id="rights">
                        <h2>{{ __('Your Rights And Control') }}</h2>
                        <p>
                            {{ __('You may withhold personal information, with the understanding that your website experience may be affected. We will not discriminate against you for exercising rights over personal information.') }}
                        </p>
                        <p>
                            {{ __('You may request details of personal information we hold about you. You may also change your mind about direct marketing at any time, unsubscribe from email communications, or ask us to correct information that is inaccurate, out of date, incomplete, irrelevant or misleading.') }}
                        </p>
                        <p>
                            {{ __('If you believe we have breached a relevant data protection law, contact us with full details. We will investigate and respond. You may also contact a regulatory body or data protection authority.') }}
                        </p>
                    </section>

                    <section id="cookies">
                        <h2>{{ __('Use Of Cookies') }}</h2>
                        <p>
                            {{ __('We use cookies to collect information about you and your activity across the site. A cookie is a small piece of data stored on your computer and accessed each time you visit, helping us understand how you use the site and serve content based on preferences.') }}
                        </p>
                    </section>

                    <section id="contact">
                        <h2>{{ __('Contact Us') }}</h2>
                        <p>{{ __('For questions or concerns regarding your privacy, contact us using the details below.') }}</p>
                        <p><strong>{{ __('Support:') }}</strong> {{ config('public_site.contact_address') }}</p>
                    </section>
                </article>
            </div>
        </section>
    </main>
@stop
