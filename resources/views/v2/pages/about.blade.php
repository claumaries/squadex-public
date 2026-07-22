@extends('v2.layout.layout')

@section('content')
    <main class="about-classic-page">
        <section class="about-classic-banner">
            <div class="container">
                <h1>{{ trans('custom.about.title') }}</h1>
            </div>
        </section>

        <section class="about-classic-main">
            <div class="container">
                <div class="about-classic-intro">
                    <figure>
                        <img src="{{ asset('blade/images/about-us-nft-eleven.png') }}" alt="{{ trans('custom.about.title') }}">
                    </figure>

                    <div class="about-classic-copy">
                        <h2>{{ trans('custom.about.subtitle') }}</h2>
                        <p>{!! trans('custom.about.description') !!}</p>
                    </div>
                </div>

                <div class="about-classic-tabs">
                    <article>
                        <img src="{{ asset('blade/images/our-mission.png') }}" alt="{{ trans('custom.about.mission') }}">
                        <div>
                            <h3>{{ trans('custom.about.mission') }}</h3>
                            <p>{{ trans('custom.about.mission_text') }}</p>
                        </div>
                    </article>

                    <article>
                        <img src="{{ asset('blade/images/our-solution.png') }}" alt="{{ trans('custom.about.solution') }}">
                        <div>
                            <h3>{{ trans('custom.about.solution') }}</h3>
                            <p>{{ trans('custom.about.solution_text') }}</p>
                        </div>
                    </article>

                    <article>
                        <img src="{{ asset('blade/images/our-vision.png') }}" alt="{{ trans('custom.about.vision') }}">
                        <div>
                            <h3>{{ trans('custom.about.vision') }}</h3>
                            <p>{{ trans('custom.about.vision_text') }}</p>
                        </div>
                    </article>
                </div>
            </div>
        </section>
    </main>
@stop
