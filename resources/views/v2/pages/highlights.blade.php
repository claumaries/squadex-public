@extends('v2.layout.layout')

@section('content')
    <main class="public-placeholder-page">
        <section class="container">
            <span class="eyebrow">{{ __('Match centre') }}</span>
            <h1>{{ __('Squadex highlights') }}</h1>
            <p>{{ __('Follow notable results and match events through the public Squadex match centre. Published match pages remain read-only and require no account.') }}</p>
            <p>{{ __('When no snapshot is available, the public site reports that state explicitly instead of showing fabricated data.') }}</p>
            <a class="btn btn-primary" href="{{ public_route('pages.matches') }}">{{ __('View matches') }}</a>
        </section>
    </main>
@endsection
