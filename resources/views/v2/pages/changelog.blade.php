@extends('v2.layout.layout')

@section('content')
    <main class="public-placeholder-page">
        <section class="container">
            <span class="eyebrow">{{ __('Product updates') }}</span>
            <h1>{{ __('Squadex changelog') }}</h1>
            <p>{{ __('This page records meaningful changes to the public website and Squadex ecosystem. Release notes are published after changes become publicly available.') }}</p>
            <p>{{ __('For live availability, use the status page. For product announcements, use the official news section.') }}</p>
            <a class="btn btn-primary" href="{{ public_route('pages.status') }}">{{ __('View system status') }}</a>
        </section>
    </main>
@endsection
