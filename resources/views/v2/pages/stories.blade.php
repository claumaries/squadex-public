@extends('v2.layout.layout')

@section('content')
    <main class="public-placeholder-page">
        <section class="container">
            <span class="eyebrow">{{ __('Community') }}</span>
            <h1>{{ __('Squadex stories') }}</h1>
            <p>{{ __('Discover official stories about clubs, competitions and the people building the Squadex football ecosystem.') }}</p>
            <p>{{ __('Use only links published on this website when joining community channels or verifying announcements.') }}</p>
            <a class="btn btn-primary" href="{{ public_route('pages.community') }}">{{ __('Visit the community hub') }}</a>
        </section>
    </main>
@endsection
