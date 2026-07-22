@extends('v2.layout.layout')

@section('content')
    @php
        $matchArticle = \Illuminate\Support\Arr::get($article, 'match_article', []);
        $headline = \Illuminate\Support\Arr::get($matchArticle, 'title', \Illuminate\Support\Arr::get($article, 'title'));
        $intro = \Illuminate\Support\Arr::get($matchArticle, 'intro');
        $matchDetails = \Illuminate\Support\Arr::get($matchArticle, 'match_details', []);
        $keyInsight = \Illuminate\Support\Arr::get($matchArticle, 'key_insight');
        $keyMoments = \Illuminate\Support\Arr::get($matchArticle, 'key_moments', []);
        $playerPerformance = \Illuminate\Support\Arr::get($matchArticle, 'player_performance', []);
        $tacticalAnalysis = \Illuminate\Support\Arr::get($matchArticle, 'tactical_analysis');
        $whyTeamWon = \Illuminate\Support\Arr::get($matchArticle, 'why_team_won', []);
        $simulationInsight = \Illuminate\Support\Arr::get($matchArticle, 'simulation_insight');
        $sections = \Illuminate\Support\Arr::get($matchArticle, 'sections', []);
        $uniqueSentence = \Illuminate\Support\Arr::get($matchArticle, 'unique_sentence');
        $score = \Illuminate\Support\Arr::get($matchArticle, 'score');
        $articleImage = \Illuminate\Support\Arr::get($article, 'image');
        $plainDescription = \Illuminate\Support\Arr::get($article, 'description');
        $publishedAt = \Illuminate\Support\Arr::get($article, 'published_at');
        $publishedLabel = \Illuminate\Support\Arr::get($article, 'diffForHumans');
    @endphp

    <main class="news-detail-page">
        <section class="news-detail-hero">
            <div class="container">
                <a href="{{ public_route($backRoute ?? 'pages.news') }}" class="news-detail-back">
                    <span>‹</span> {{ $backLabel ?? trans('custom.latest_news') }}
                </a>

                <div class="news-detail-hero-grid">
                    <div>
                        <h1>{{ $headline }}</h1>

                        @if(is_string($intro) && $intro !== '')
                            <p>{{ $intro }}</p>
                        @endif
                    </div>

                    <aside class="news-detail-meta-card">
                        <span>{{ __('Published') }}</span>
                        <time datetime="{{ $publishedAt }}">{{ $publishedLabel }}</time>

                        @if(is_string($score) && $score !== '')
                            <strong>{{ $score }}</strong>
                        @endif
                    </aside>
                </div>
            </div>
        </section>

        <section class="news-detail-section">
            <div class="container">
                <div class="news-detail-layout">
                    <article class="news-detail-article">
                        @if(is_string($articleImage) && $articleImage !== '')
                            <figure class="news-detail-cover">
                                <img src="{{ $articleImage }}" alt="{{ $headline }}">
                            </figure>
                        @endif

                        <div class="news-detail-content">
                            @if(is_string($intro) && $intro !== '')
                                <p class="news-detail-lead">{{ $intro }}</p>
                            @endif

                            @if(is_string($uniqueSentence) && $uniqueSentence !== '')
                                <p class="news-detail-muted">{{ $uniqueSentence }}</p>
                            @endif

                            @if(is_array($sections) && $sections !== [])
                                @foreach($sections as $section)
                                    @php
                                        $type = \Illuminate\Support\Arr::get($section, 'type');
                                        $heading = \Illuminate\Support\Arr::get($section, 'heading');
                                        $content = \Illuminate\Support\Arr::get($section, 'content');
                                    @endphp

                                    @if($type === 'paragraph' && is_string($heading) && $heading !== '' && is_string($content) && $content !== '')
                                        <section class="news-detail-block">
                                            <h2>{{ $heading }}</h2>
                                            <p>{{ $content }}</p>
                                        </section>
                                    @elseif($type === 'table' && is_string($heading) && $heading !== '')
                                        <section class="news-detail-block">
                                            <h2>{{ $heading }}</h2>
                                            <div class="news-detail-table-wrap">
                                                <table class="news-detail-table">
                                                    <tbody>
                                                        @foreach(\Illuminate\Support\Arr::get($section, 'rows', []) as $item)
                                                            @php
                                                                $label = \Illuminate\Support\Arr::get($item, 'label');
                                                                $value = \Illuminate\Support\Arr::get($item, 'value');
                                                            @endphp
                                                            @if(is_string($label) && $label !== '' && is_string($value) && $value !== '')
                                                                <tr>
                                                                    <th scope="row">{{ $label }}</th>
                                                                    <td>{{ $value }}</td>
                                                                </tr>
                                                            @endif
                                                        @endforeach
                                                    </tbody>
                                                </table>
                                            </div>
                                        </section>
                                    @elseif($type === 'moments' && is_string($heading) && $heading !== '')
                                        <section class="news-detail-block">
                                            <h2>{{ $heading }}</h2>
                                            <ul class="news-detail-moments">
                                                @foreach(\Illuminate\Support\Arr::get($section, 'items', []) as $moment)
                                                    @php $text = \Illuminate\Support\Arr::get($moment, 'text'); @endphp
                                                    @if(is_string($text) && $text !== '')
                                                        <li>{{ $text }}</li>
                                                    @endif
                                                @endforeach
                                            </ul>
                                        </section>
                                    @elseif($type === 'players' && is_string($heading) && $heading !== '')
                                        <section class="news-detail-block">
                                            <h2>{{ $heading }}</h2>
                                            <div class="news-detail-player-grid">
                                                @foreach(\Illuminate\Support\Arr::get($section, 'items', []) as $performance)
                                                    @php
                                                        $name = \Illuminate\Support\Arr::get($performance, 'name');
                                                        $team = \Illuminate\Support\Arr::get($performance, 'team');
                                                        $rating = \Illuminate\Support\Arr::get($performance, 'rating');
                                                        $summary = \Illuminate\Support\Arr::get($performance, 'summary');
                                                    @endphp
                                                    @if(is_string($name) && $name !== '' && is_string($summary) && $summary !== '')
                                                        <article class="news-detail-player-card">
                                                            <h3>{{ $name }}</h3>
                                                            @if(is_string($team) && $team !== '')
                                                                <span>{{ $team }}</span>
                                                            @endif
                                                            @if(is_numeric($rating))
                                                                <strong>{{ trans('custom.overall_rating') }}: {{ number_format((float) $rating, 2) }}</strong>
                                                            @endif
                                                            <p>{{ $summary }}</p>
                                                        </article>
                                                    @endif
                                                @endforeach
                                            </div>
                                        </section>
                                    @elseif($type === 'list' && is_string($heading) && $heading !== '')
                                        <section class="news-detail-block">
                                            <h2>{{ $heading }}</h2>
                                            <ul class="news-detail-list">
                                                @foreach(\Illuminate\Support\Arr::get($section, 'items', []) as $reason)
                                                    @if(is_string($reason) && $reason !== '')
                                                        <li>{{ $reason }}</li>
                                                    @endif
                                                @endforeach
                                            </ul>
                                        </section>
                                    @elseif($type === 'callout' && is_string($heading) && $heading !== '' && is_string($content) && $content !== '')
                                        <section class="news-detail-block">
                                            <h2>{{ $heading }}</h2>
                                            <div class="news-detail-callout">
                                                <p>{{ $content }}</p>
                                            </div>
                                        </section>
                                    @endif
                                @endforeach
                            @else
                                @if(is_array($matchDetails) && $matchDetails !== [])
                                    <section class="news-detail-block">
                                        <h2>{{ \Illuminate\Support\Arr::get($matchArticle, 'match_details_heading', trans('custom.match_details')) }}</h2>
                                        <div class="news-detail-table-wrap">
                                            <table class="news-detail-table">
                                                <tbody>
                                                    @foreach($matchDetails as $item)
                                                        @php
                                                            $label = \Illuminate\Support\Arr::get($item, 'label');
                                                            $value = \Illuminate\Support\Arr::get($item, 'value');
                                                        @endphp
                                                        @if(is_string($label) && $label !== '' && is_string($value) && $value !== '')
                                                            <tr>
                                                                <th scope="row">{{ $label }}</th>
                                                                <td>{{ $value }}</td>
                                                            </tr>
                                                        @endif
                                                    @endforeach
                                                </tbody>
                                            </table>
                                        </div>
                                    </section>
                                @endif

                                @if(is_string($keyInsight) && $keyInsight !== '')
                                    <section class="news-detail-block">
                                        <h2>{{ \Illuminate\Support\Arr::get($matchArticle, 'key_insight_heading', 'Key Insight') }}</h2>
                                        <p>{{ $keyInsight }}</p>
                                    </section>
                                @endif

                                @if(is_array($keyMoments) && $keyMoments !== [])
                                    <section class="news-detail-block">
                                        <h2>{{ \Illuminate\Support\Arr::get($matchArticle, 'key_moments_heading', 'Key Moments') }}</h2>
                                        <ul class="news-detail-moments">
                                            @foreach($keyMoments as $moment)
                                                @php $text = \Illuminate\Support\Arr::get($moment, 'text'); @endphp
                                                @if(is_string($text) && $text !== '')
                                                    <li>{{ $text }}</li>
                                                @endif
                                            @endforeach
                                        </ul>
                                    </section>
                                @endif

                                @if(is_array($playerPerformance) && $playerPerformance !== [])
                                    <section class="news-detail-block">
                                        <h2>{{ \Illuminate\Support\Arr::get($matchArticle, 'player_performance_heading', trans('custom.players_performance')) }}</h2>
                                        <div class="news-detail-player-grid">
                                            @foreach($playerPerformance as $performance)
                                                @php
                                                    $name = \Illuminate\Support\Arr::get($performance, 'name');
                                                    $team = \Illuminate\Support\Arr::get($performance, 'team');
                                                    $rating = \Illuminate\Support\Arr::get($performance, 'rating');
                                                    $summary = \Illuminate\Support\Arr::get($performance, 'summary');
                                                @endphp
                                                @if(is_string($name) && $name !== '' && is_string($summary) && $summary !== '')
                                                    <article class="news-detail-player-card">
                                                        <h3>{{ $name }}</h3>
                                                        @if(is_string($team) && $team !== '')
                                                            <span>{{ $team }}</span>
                                                        @endif
                                                        @if(is_numeric($rating))
                                                            <strong>{{ trans('custom.overall_rating') }}: {{ number_format((float) $rating, 2) }}</strong>
                                                        @endif
                                                        <p>{{ $summary }}</p>
                                                    </article>
                                                @endif
                                            @endforeach
                                        </div>
                                    </section>
                                @endif

                                @if(is_string($tacticalAnalysis) && $tacticalAnalysis !== '')
                                    <section class="news-detail-block">
                                        <h2>{{ \Illuminate\Support\Arr::get($matchArticle, 'tactical_analysis_heading', 'Tactical Analysis') }}</h2>
                                        <p>{{ $tacticalAnalysis }}</p>
                                    </section>
                                @endif

                                @if(is_array($whyTeamWon) && $whyTeamWon !== [])
                                    <section class="news-detail-block">
                                        <h2>{{ \Illuminate\Support\Arr::get($matchArticle, 'why_team_won_heading', 'Why Team Won') }}</h2>
                                        <ul class="news-detail-list">
                                            @foreach($whyTeamWon as $reason)
                                                @if(is_string($reason) && $reason !== '')
                                                    <li>{{ $reason }}</li>
                                                @endif
                                            @endforeach
                                        </ul>
                                    </section>
                                @endif

                                @if(is_string($simulationInsight) && $simulationInsight !== '')
                                    <section class="news-detail-block">
                                        <h2>{{ \Illuminate\Support\Arr::get($matchArticle, 'simulation_insight_heading', 'Simulation Insight') }}</h2>
                                        <div class="news-detail-callout">
                                            <p>{{ $simulationInsight }}</p>
                                        </div>
                                    </section>
                                @endif

                                @if(is_string($plainDescription) && $plainDescription !== '')
                                    <section class="news-detail-block">
                                        {{ strip_tags($plainDescription) }}
                                    </section>
                                @endif
                            @endif
                        </div>
                    </article>

                    <aside class="news-detail-sidebar">
                        <div class="news-detail-recent">
                            <span class="showcase-kicker">{{ trans('custom.recent_articles') }}</span>

                            <div class="news-detail-recent-list">
                                @foreach($newsItems as $newsItem)
                                    @php
                                        $recentTitle = \Illuminate\Support\Arr::get($newsItem, 'title');
                                        $recentExcerpt = \Illuminate\Support\Arr::get($newsItem, 'short_description');
                                    @endphp

                                    <a href="{{ \Illuminate\Support\Arr::get($newsItem, 'detailsUrl') }}" class="news-detail-recent-card">
                                        <figure>
                                            <img src="{{ \Illuminate\Support\Arr::get($newsItem, 'image') }}" alt="{{ $recentTitle }}" loading="lazy">
                                        </figure>
                                        <div>
                                            <h3>{{ $recentTitle }}</h3>
                                            @if(is_string($recentExcerpt) && $recentExcerpt !== '' && trim($recentExcerpt) !== trim((string) $recentTitle))
                                                <p>{{ \Illuminate\Support\Str::limit($recentExcerpt, 92) }}</p>
                                            @endif
                                            <span>{{ \Illuminate\Support\Arr::get($newsItem, 'diffForHumans') }}</span>
                                        </div>
                                    </a>
                                @endforeach
                            </div>
                        </div>
                    </aside>
                </div>
            </div>
        </section>
    </main>
@stop
