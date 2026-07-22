@extends('v2.layout.layout')

@section('content')
    @php
        $categories = $categories ?? [];
        $activeCategory = $activeCategory ?? null;
        $activeCategoryMeta = $activeCategoryMeta ?? null;
        $rows = $rows ?? [];
        $pagination = $pagination ?? null;
        $perPage = $perPage ?? 20;
        $perPageOptions = $perPageOptions ?? [20, 50];
    @endphp

    <main class="leaderboards-page leaderboards-compact-radius">
        <section class="leaderboards-hero">
            <div class="container leaderboards-heading">
                <h1>{{ __('Leaderboards') }}</h1>
                <p>{{ __('Browse separate rankings for managers, clubs, players, domestic leagues and countries.') }}</p>
            </div>
        </section>

        <section class="leaderboards-section">
            <div class="container">
                <nav class="leaderboards-category-grid" aria-label="{{ __('Leaderboard categories') }}">
                    @foreach($categories as $key => $category)
                        <a
                            href="{{ $category['url'] }}"
                            @class([ 'leaderboard-category-card', 'is-active' => $activeCategory === $key])
                            @if($activeCategory === $key) aria-current="page" @endif
                        >
                            <span>{{ $category['label'] }}</span>
                            <em>{{ $category['description'] }}</em>
                        </a>
                    @endforeach
                </nav>

                @if($activeCategoryMeta)
                    <article class="leaderboard-tab-panel leaderboard-category-panel">
                        <header class="leaderboard-table-head">
                            <div>
                                <h2>{{ $activeCategoryMeta['label'] }}</h2>
                                <p>{{ $activeCategoryMeta['description'] }}</p>
                            </div>
                            <div class="leaderboard-table-actions">

                                <form class="leaderboard-per-page-filter" method="GET" action="{{ $activeCategoryMeta['url'] }}">
                                    <input type="hidden" name="per_page" value="{{ $perPage }}">
                                    <span>{{ __('Per page') }}</span>
                                    <div class="standings-select">
                                        <button
                                            class="standings-select-toggle"
                                            type="button"
                                            aria-haspopup="listbox"
                                            aria-expanded="false"
                                            data-standings-select-toggle
                                        >
                                            {{ $perPage }}
                                        </button>
                                        <div class="standings-select-menu" role="listbox" hidden data-standings-select-menu>
                                            @foreach($perPageOptions as $perPageOption)
                                                <button
                                                    class="standings-select-option"
                                                    type="button"
                                                    role="option"
                                                    aria-selected="{{ $perPage === $perPageOption ? 'true' : 'false' }}"
                                                    data-standings-select-option
                                                    data-target="per_page"
                                                    data-value="{{ $perPageOption }}"
                                                >
                                                    {{ $perPageOption }}
                                                </button>
                                            @endforeach
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </header>

                        <div class="leaderboard-clear-table">
                            <div @class([ 'leaderboard-clear-row', 'leaderboard-clear-row-header', 'leaderboard-clear-row-players' => $activeCategory === 'players'])>
                                <span>{{ __('Rank') }}</span>
                                <span>{{ __('Name') }}</span>
                                <span>{{ $activeCategoryMeta['detail'] }}</span>
                                <span>{{ $activeCategoryMeta['score'] }}</span>
                                @if($activeCategory === 'players')
                                    <span>{{ __('Market value') }}</span>
                                @endif
                                <span>{{ __('Detail') }}</span>
                            </div>

                            @forelse($rows as $row)
                                <div @class([ 'leaderboard-clear-row', 'leaderboard-clear-row-players' => $activeCategory === 'players'])>
                                    <strong>#{{ $row['rank'] }}</strong>
                                    <span>{{ $row['name'] }}</span>
                                    <span>{{ $row['club'] ?? $row['country'] }}</span>
                                    <b>{{ $row['points'] }}</b>
                                    @if($activeCategory === 'players')
                                        <small>{{ $row['marketValue'] }}</small>
                                    @endif
                                    <small>{{ $row['form'] ?? $row['winRate'] }}</small>
                                </div>
                            @empty
                                <div class="leaderboard-empty-state">
                                    <strong>{{ __('No rankings available yet.') }}</strong>
                                    <span>{{ __('This category will appear after valid clubs, managers or players exist in the database.') }}</span>
                                </div>
                            @endforelse
                        </div>

                        @if($pagination && $pagination->hasPages())
                            @include('v2.partials.marketplace-pagination', [
                                'results' => $pagination->toArray(),
                                'paginationLabel' => __('Leaderboard pagination'),
                            ])
                        @endif
                    </article>
                @else
                    <div class="leaderboard-overview-panel">
                        <strong>{{ __('Select a leaderboard') }}</strong>
                        <span>{{ __('Each ranking now has its own page, so links can be shared directly and player rankings can be paginated.') }}</span>
                    </div>
                @endif
            </div>
        </section>
    </main>
@stop
