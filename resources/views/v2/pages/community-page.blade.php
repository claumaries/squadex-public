@extends('v2.layout.layout')

@section('content')
    <main class="community-page">
        <section class="container community-hero">
            <span class="eyebrow">{{ $page['kicker'] }}</span>
            <h1>{{ $page['title'] }}</h1>
            <p>{{ $page['description'] }}</p>
        </section>

        <section class="container community-highlights" aria-label="{{ __('Community overview') }}">
            @foreach($page['highlights'] as $highlight)
                <article>
                    <span>{{ $highlight['label'] }}</span>
                    <strong>{{ $highlight['value'] }}</strong>
                </article>
            @endforeach
        </section>

        <section class="container community-card-grid">
            @foreach($page['cards'] as $card)
                <article>
                    <h2>{{ $card['title'] }}</h2>
                    <p>{{ $card['description'] }}</p>
                </article>
            @endforeach
        </section>

        <nav class="container community-link-grid" aria-label="{{ __('Community pages') }}">
            @foreach($communityLinks as $link)
                <a href="{{ public_route($link['route']) }}">
                    <strong>{{ $link['title'] }}</strong>
                    <span>{{ $link['description'] }}</span>
                </a>
            @endforeach
        </nav>
    </main>
@endsection
