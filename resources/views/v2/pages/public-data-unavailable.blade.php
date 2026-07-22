@extends('v2.layout.layout')

@section('content')
    <main class="public-placeholder-page">
        <section class="container">
            <span class="eyebrow">{{ __('Public data') }}</span>
            <h1>{{ $title }}</h1>
            <p>{{ __('This public data is temporarily unavailable. Please try again shortly.') }}</p>
            <a class="btn btn-primary" href="{{ public_route('pages.homepage') }}">{{ __('Back to homepage') }}</a>
        </section>
    </main>
@endsection
