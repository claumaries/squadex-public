@extends('v2.layout.layout')

@section('content')
    <main class="whitepaper-page">
        <section class="whitepaper-hero">
            <div class="container">
                <h1>{{ __('Cookie Policy') }}</h1>
                <p>
                    {{ __('How :app uses cookies and similar browser technologies to keep the platform secure, remember preferences and understand how public pages are used.', ['app' => config('app.name')]) }}
                </p>
            </div>
        </section>

        <section class="whitepaper-body">
            <div class="container whitepaper-layout">
                <aside class="whitepaper-nav" aria-label="{{ __('Cookie policy contents') }}">
                    <strong>{{ __('Contents') }}</strong>
                    <a href="#overview" class="active">{{ __('Overview') }}</a>
                    <a href="#what-are-cookies">{{ __('What Are Cookies') }}</a>
                    <a href="#purposes">{{ __('Purposes') }}</a>
                    <a href="#lifespan">{{ __('Lifespan') }}</a>
                    <a href="#third-parties">{{ __('Third Parties') }}</a>
                    <a href="#cookies-used">{{ __('Cookies Used') }}</a>
                    <a href="#disable">{{ __('Disable Cookies') }}</a>
                    <a href="#types">{{ __('Types Used') }}</a>
                </aside>

                <article class="whitepaper-content">
                    <section id="overview">
                        <h2>{{ __(':app Cookie Policy', ['app' => config('app.name')]) }}</h2>
                        <p>
                            {{ __('This Cookie Policy applies to users of this website. The information below explains the placement, use and administration of cookies by TRDX Innovative Solutions SRL while users browse the website.') }}
                        </p>
                    </section>

                    <section id="what-are-cookies">
                        <h2>{{ __('1. What Are Cookies?') }}</h2>
                        <ul>
                            <li>{{ __('An internet cookie is a small file stored on the computer, mobile device or other equipment of a user accessing the internet.') }}</li>
                            <li>{{ __('Cookies are installed by a web server request to a browser such as Chrome, Firefox, Safari or Edge.') }}</li>
                            <li>{{ __('Once installed, cookies have a determined lifespan and remain passive. They do not contain software programs, viruses or spyware.') }}</li>
                            <li>{{ __('A cookie is made up of a cookie name and cookie content or value.') }}</li>
                            <li>{{ __('Technically, only the web server that sent the cookie can access it again when the user returns to the associated web page.') }}</li>
                        </ul>
                    </section>

                    <section id="purposes">
                        <h2>{{ __('2. Purposes Of Using Cookies') }}</h2>
                        <p>
                            {{ __('Cookies are used to provide a better browsing experience and services tailored to users\' needs and interests.') }}
                        </p>
                        <ul>
                            <li>{{ __('Improving use of the website, including identifying errors during visits or use.') }}</li>
                            <li>{{ __('Providing anonymous statistics on how the website is used.') }}</li>
                            <li>{{ __('Helping TRDX Innovative Solutions SRL make the website more efficient and accessible.') }}</li>
                        </ul>
                    </section>

                    <section id="lifespan">
                        <h2>{{ __('3. Cookie Lifespan') }}</h2>
                        <p>{{ __('The lifespan of cookies can vary depending on the purpose for which they are placed.') }}</p>
                        <ul>
                            <li><strong>{{ __('Session cookies:') }}</strong>{{ __('automatically deleted when the user closes the browser.') }}</li>
                            <li><strong>{{ __('Persistent cookies:') }}</strong>{{ __('remain stored until a set expiration date or until deleted by the user through browser settings.') }}</li>
                        </ul>
                    </section>

                    <section id="third-parties">
                        <h2>{{ __('4. Third-Party Cookies') }}</h2>
                        <p>
                            {{ __('Certain sections of the website may be provided through third parties. In those situations, cookies may be placed by those third parties.') }}
                        </p>
                        <p>{{ __('These cookies may come from third parties such as Google Analytics.') }}</p>
                    </section>

                    <section id="cookies-used">
                        <h2>{{ __('5. Cookies Used On This Website') }}</h2>
                        <p>{{ __('By using or visiting the website, the following cookies may be placed:') }}</p>
                        <ul>
                            <li><strong>{{ __('Registration cookies:') }}</strong>{{ __('generated when users register and used to identify the registered account.') }}</li>
                            <li><strong>{{ __('User preference cookies:') }}</strong>{{ __('used to understand whether a user has visited or used this website before.') }}</li>
                            <li><strong>{{ __('Security cookies:') }}</strong>{{ __('used to help prevent CSRF attacks and protect session integrity.') }}</li>
                        </ul>
                    </section>

                    <section id="disable">
                        <h2>{{ __('6. Disabling Cookies') }}</h2>
                        <p>
                            {{ __('Disabling or refusing cookies can make the website more difficult to use and may limit some functionality. Users can configure their browser to reject cookies or accept cookies from a particular website.') }}
                        </p>
                        <p>
                            {{ __('Refusing or disabling cookies does not mean users will no longer receive online advertising. It means advertising may no longer be tailored to preferences and interests indicated by browsing behavior.') }}
                        </p>
                    </section>

                    <section id="types">
                        <h2>{{ __('7. Types Of Cookies Used') }}</h2>
                        <h3>{{ __('Necessary Cookies') }}</h3>
                        <p>
                            {{ __('This website uses cookies to save user sessions and support activities strictly necessary for platform operation.') }}
                        </p>

                        <h3>{{ __('Analytics Cookies') }}</h3>
                        <p>
                            {{ __('Analytics services allow monitoring and analysis of website traffic. They may be used to understand user behavior and improve the public website experience.') }}
                        </p>

                        <h3>{{ __('Google Analytics') }}</h3>
                        <p>
                            {{ __('Google Analytics is a web analysis service provided by Google. It helps monitor website use, create reports and improve page experience.') }}
                        </p>

                        <p><strong>{{ __('By continuing to browse, you accept the use of cookies.') }}</strong></p>
                    </section>
                </article>
            </div>
        </section>
    </main>
@stop
