@extends('v2.layout.layout')

@section('content')
    <main class="public-placeholder-page">
        <section class="container">
            <span class="eyebrow">{{ __('Football data') }}</span>
            <h1>{{ __('Squadex insights') }}</h1>
            <p>{{ __('Explore public standings, team form, player statistics and match analysis generated from published Squadex data snapshots.') }}</p>
            <p>{{ __('Figures are informational and reflect the publication time shown by each public data view.') }}</p>
            <a class="btn btn-primary" href="{{ public_route('pages.stats') }}">{{ __('Explore statistics') }}</a>
        </section>
    </main>
@endsection
