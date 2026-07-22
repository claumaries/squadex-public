@extends('v2.layout.layout')

@section('content')
    <main class="whitepaper-page">
        <section class="whitepaper-hero">
            <div class="container">
                <h1>{{ trans('custom.terms_of_service') }}</h1>
                <p>
                    {{ __('The rules and conditions that govern access to :app, the public website and the related football management platform services.', ['app' => config('app.name')]) }}
                </p>
            </div>
        </section>

        <section class="whitepaper-body">
            <div class="container whitepaper-layout">
                <aside class="whitepaper-nav" aria-label="{{ __('Terms of service contents') }}">
                    <strong>{{ __('Contents') }}</strong>
                    <a href="#overview" class="active">{{ __('Overview') }}</a>
                    <a href="#agreement">{{ __('Agreement') }}</a>
                    <a href="#privacy">{{ __('Privacy') }}</a>
                    <a href="#license">{{ __('Use License') }}</a>
                    <a href="#disclaimer">{{ __('Disclaimer') }}</a>
                    <a href="#limitations">{{ __('Limitations') }}</a>
                    <a href="#corrections">{{ __('Corrections') }}</a>
                    <a href="#links">{{ __('Links') }}</a>
                    <a href="#changes">{{ __('Changes') }}</a>
                    <a href="#law">{{ __('Applicable Law') }}</a>
                    <a href="#contact">{{ __('Contact') }}</a>
                </aside>

                <article class="whitepaper-content">
                    <section id="overview">
                        <h2>{{ __(':app Terms And Conditions', ['app' => config('app.name')]) }}</h2>
                        <p><strong>{{ __('Last updated on 02/10/2022') }}</strong></p>
                        <p>
                            {{ __('These terms explain the conditions for viewing, accessing or using this website and related services. Please read them carefully before using the platform.') }}
                        </p>
                    </section>

                    <section id="agreement">
                        <h2>{{ __('1. Agreement To Terms') }}</h2>
                        <p>
                            {{ __('By viewing or using this website, you agree to be bound by these Terms of Use and any applicable local laws. If you disagree with any of these terms, you are prohibited from accessing this website or using the service.') }}
                        </p>
                        <p>
                            {{ __('All materials on this website are protected by trademark law and copyright. For purposes of these Terms of Use, the terms "company", "we" and "our" refer to :app, registered under Romanian jurisdiction.', ['app' => config('app.name')]) }}
                        </p>
                    </section>

                    <section id="privacy">
                        <h2>{{ __('2. Privacy Policy') }}</h2>
                        <p>
                            {{ __('We advise you to read our') }}
                        <a href="{{ public_route('pages.privacy') }}">{{ __('privacy policy') }}</a>
                            {{ __('regarding user data collection. It will help you better understand our practices.') }}
                        </p>
                    </section>

                    <section id="license">
                        <h2>{{ __('3. Use License') }}</h2>
                        <p>
                            {{ __('Permission is not granted to temporarily download or copy any materials on our website for personal, non-commercial or transitory viewing.') }}
                        </p>
                        <p>{{ __('You may not:') }}</p>
                        <ul>
                            <li>{{ __('Modify or copy the materials.') }}</li>
                            <li>{{ __('Use the materials for any commercial purpose or public display.') }}</li>
                            <li>{{ __('Attempt to reverse engineer any software contained on our website.') }}</li>
                            <li>{{ __('Remove copyright or other proprietary notations from the materials.') }}</li>
                            <li>{{ __('Transfer the materials to another person or mirror the materials on another server.') }}</li>
                        </ul>
                        <p>
                            {{ __('The company may terminate access upon violation of these restrictions. Upon termination, your viewing right will also be terminated and you should destroy downloaded materials in your possession, whether electronic or printed.') }}
                        </p>
                    </section>

                    <section id="disclaimer">
                        <h2>{{ __('4. Disclaimer') }}</h2>
                        <p>
                            {{ __('All materials on our website are provided on an "as is" basis. You agree that use of the website is at your own risk. We make no warranties, expressed or implied, and negate all other warranties.') }}
                        </p>
                        <p>
                            {{ __('The company does not make representations concerning the accuracy or reliability of materials on its website or materials on sites linked to this website.') }}
                        </p>
                    </section>

                    <section id="limitations">
                        <h2>{{ __('5. Limitations') }}</h2>
                        <p>
                            {{ __('The company or its suppliers will not be held accountable for damages arising from use or inability to use website materials, even if we or an authorized representative has been notified of the possibility of such damage.') }}
                        </p>
                        <p>
                            {{ __('Some jurisdictions do not allow limitations on implied warranties or limitations of liability for incidental damages, so these limitations may not apply to you.') }}
                        </p>
                    </section>

                    <section id="corrections">
                        <h2>{{ __('6. Corrections') }}</h2>
                        <p>
                            {{ __('Information or materials appearing on the website may contain technical, typographical or photographic errors. We do not promise that materials are accurate, complete or current.') }}
                        </p>
                        <p>
                            {{ __('We reserve the right to change and update materials contained on the website at any time without prior notice.') }}
                        </p>
                    </section>

                    <section id="links">
                        <h2>{{ __('7. Links') }}</h2>
                        <p>
                            {{ __('The company has no control over links provided on this website and is not responsible for the content of linked sites. The presence of any link does not imply endorsement by the company. Use of any linked website is at your own risk.') }}
                        </p>
                    </section>

                    <section id="changes">
                        <h2>{{ __('8. Modification Of Terms') }}</h2>
                        <p>
                            {{ __('The company may revise or include supplemental terms in these Terms of Use from time to time without prior notice. Please check the current Terms of Use every time you use the website.') }}
                        </p>
                        <p>
                            {{ __('By using this website, you agree to be bound by the current version of these Terms of Use.') }}
                        </p>
                    </section>

                    <section id="law">
                        <h2>{{ __('9. Applicable Law') }}</h2>
                        <p>
                            {{ __('Any claim related to our website shall be governed by Romanian laws, without regard to conflict of law provisions.') }}
                        </p>
                    </section>

                    <section id="contact">
                        <h2>{{ __('10. Contact') }}</h2>
                        <p>{{ __('In case of any questions or requests, please contact us at:') }}</p>
                        <p><strong>{{ config('public_site.contact_address') }}</strong></p>
                    </section>
                </article>
            </div>
        </section>
    </main>
@stop
