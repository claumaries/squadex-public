@extends('v2.layout.layout')

@section('content')
    <main class="public-placeholder-page">
        <section class="container">
            <span class="eyebrow">{{ __('System status') }}</span>
            <h1>{{ __('Squadex public services') }}</h1>
            <p>{{ __('The public website is operational. Authenticated application availability is reported separately by the application service.') }}</p>
        </section>
    </main>
@endsection
