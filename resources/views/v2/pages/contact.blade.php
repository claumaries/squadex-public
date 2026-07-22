@extends('v2.layout.layout')

@section('content')
    <main class="contact-page">
        <section class="contact-hero">
            <div class="container">
                <div class="contact-heading">
                    <div>
                        <h1>{{ trans('custom.contact_title') }}</h1>
                        <p>
                            {{ __('Contact the :app team for platform questions, partnerships, marketplace support or general enquiries.', ['app' => config('app.name')]) }}
                        </p>
                    </div>

                </div>
            </div>
        </section>

        <section class="contact-section">
            <div class="container">
                <div class="contact-layout">
                    <aside class="contact-info-panel">
                        <h2>{{ __('How we can help') }}</h2>
                        <p>
                            {{ __('Send a clear message with the context we need. If your request is about a transaction, include the account email and any relevant marketplace or club details.') }}
                        </p>

                        <div class="contact-faq-list">
                            <details class="contact-faq-item" open>
                                <summary>
                                    <span>01</span>
                                    {{ __('Platform') }}
                                </summary>
                                <p>{{ __('Game features, account access and product questions.') }}</p>
                            </details>

                            <details class="contact-faq-item">
                                <summary>
                                    <span>02</span>
                                    {{ __('Marketplace') }}
                                </summary>
                                <p>{{ __('Player, club and stadium listing enquiries.') }}</p>
                            </details>

                            <details class="contact-faq-item">
                                <summary>
                                    <span>03</span>
                                    {{ __('Partnerships') }}
                                </summary>
                                <p>{{ __('Business, ecosystem and collaboration requests.') }}</p>
                            </details>
                        </div>
                    </aside>

                    <div class="contact-form-panel">
                        <h2>{{ __('Contact us directly') }}</h2>
                        <p>
                            {{ __('The public website is read-only. Send your enquiry by email and the appropriate team will respond.') }}
                        </p>
                        <a class="contact-submit-btn" href="mailto:{{ config('public_site.contact_address') }}">
                            {{ config('public_site.contact_address') }}
                        </a>

                        <div class="contact-policy">
                            {!! __('custom.contact_description', ['route' => public_route('pages.privacy')]) !!}
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </main>
@stop
