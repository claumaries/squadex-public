@extends('v2.layout.layout')

@section('content')
    <main class="news-list-page">
        <section class="news-list-hero">
            <div class="container">
                <div class="news-list-heading">
                    <div>
                        <h1>{{ $listingTitle ?? trans('custom.latest_news') }}</h1>
                        <p>
                            {{ $listingDescription ?? 'Latest platform updates, match reports, ecosystem announcements and football manager stories.' }}
                        </p>
                    </div>

                    <span class="news-list-count">
                        {{ trans('custom.showing') }}
                        {{ $news->firstItem() ?? 0 }} - {{ $news->lastItem() ?? 0 }}
                        {{ trans('custom.of') }}
                        {{ $news->total() }}
                        {{ trans('custom.results') }}
                    </span>
                </div>
            </div>
        </section>

        <section class="news-list-section">
            <div class="container">
                <div class="news-list-grid">
                    @forelse($newsItems as $newsItem)
                        @php
                            $newsTitle = \Illuminate\Support\Arr::get($newsItem, 'title');
                            $newsImage = \Illuminate\Support\Arr::get($newsItem, 'image');
                        @endphp

                        <a href="{{ \Illuminate\Support\Arr::get($newsItem, 'detailsUrl') }}" class="news-list-card">
                            <figure>
                                <img src="{{ $newsImage }}" alt="{{ $newsTitle }}" loading="lazy">
                                <figcaption>
                                    <strong>{{ \Illuminate\Support\Arr::get($newsItem, 'dateDay') }}</strong>
                                    <span>{{ \Illuminate\Support\Arr::get($newsItem, 'dateMonth') }}</span>
                                </figcaption>
                            </figure>

                            <div class="news-list-card-body">
                                <div class="news-meta">
                                    <span>{{ \Illuminate\Support\Arr::get($newsItem, 'diffForHumans') }}</span>
                                </div>

                                <h2>{{ $newsTitle }}</h2>

                                <p>
                                    {{ \Illuminate\Support\Arr::get($newsItem, 'short_description') }}
                                </p>

                                <span class="news-read-more">{{ trans('custom.read_more') }}</span>
                            </div>
                        </a>
                    @empty
                        <div class="news-list-empty">{{ $emptyText ?? 'No news available.' }}</div>
                    @endforelse
                </div>

                <div class="news-list-footer">
                    <form class="news-per-page" method="GET" action="{{ public_route($listingRoute ?? 'pages.news') }}">
                        <span>{{ trans('custom.articles_per_page') }}</span>
                        <input type="hidden" name="perPage" id="perPageSelect" value="{{ (int) $perPage }}">

                        <div class="standings-select news-per-page-dropdown">
                            <button
                                class="standings-select-toggle"
                                type="button"
                                aria-haspopup="listbox"
                                aria-expanded="false"
                                data-standings-select-toggle
                            >
                                {{ (int) $perPage }}
                            </button>

                            <div class="standings-select-menu" role="listbox" hidden data-standings-select-menu>
                                @foreach([9, 18, 36] as $perPageOption)
                                    <button
                                        class="standings-select-option"
                                        type="button"
                                        role="option"
                                        aria-selected="{{ (int) $perPage === $perPageOption ? 'true' : 'false' }}"
                                        data-target="perPage"
                                        data-value="{{ $perPageOption }}"
                                        data-standings-select-option
                                    >
                                        {{ $perPageOption }}
                                    </button>
                                @endforeach
                            </div>
                        </div>
                    </form>

                    <div class="news-list-pagination">
                        {{ $news->links('pagination::bootstrap-4') }}
                    </div>
                </div>
            </div>
        </section>
    </main>
@stop
