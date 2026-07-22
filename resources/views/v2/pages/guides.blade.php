@extends('v2.layout.layout')

@section('content')
    <main class="public-placeholder-page">
        <section class="container">
            <span class="eyebrow">{{ __('Official guidance') }}</span>
            <h1>{{ __('Squadex guides') }}</h1>
            <p>{{ __('Start with the public game overview, learn how football simulations are presented, and review official safety information before using token-related features.') }}</p>
            <p>{{ __('Account-specific actions, purchases and team management continue in the authenticated Squadex application.') }}</p>
            <a class="btn btn-primary" href="{{ public_route('pages.game') }}">{{ __('Explore the game') }}</a>
        </section>
    </main>
@endsection
