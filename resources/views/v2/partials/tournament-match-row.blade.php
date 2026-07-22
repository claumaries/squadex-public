@php
    $matchId = \Illuminate\Support\Arr::get($match, 'id');
    $homeClubName = (string) \Illuminate\Support\Arr::get($match, 'home_club');
    $awayClubName = (string) \Illuminate\Support\Arr::get($match, 'away_club');
@endphp

<article class="tournament-match-row">
    <time>
        <strong>{{ \Illuminate\Support\Arr::get($match, 'date') ?: '-' }}</strong>
        <span>{{ \Illuminate\Support\Arr::get($match, 'time') ?: '-' }}</span>
    </time>
    <div class="tournament-match-teams">
        @if(\Illuminate\Support\Arr::get($match, 'home_url'))
            <a href="{{ \Illuminate\Support\Arr::get($match, 'home_url') }}">{{ $homeClubName }}</a>
        @else
            <span>{{ $homeClubName }}</span>
        @endif
        <strong>{{ \Illuminate\Support\Arr::get($match, 'score') }}</strong>
        @if(\Illuminate\Support\Arr::get($match, 'away_url'))
            <a href="{{ \Illuminate\Support\Arr::get($match, 'away_url') }}">{{ $awayClubName }}</a>
        @else
            <span>{{ $awayClubName }}</span>
        @endif
    </div>
    @if($matchId)
        <a
            class="tournament-match-details"
            href="{{ \Illuminate\Support\Arr::get($match, 'details_url') }}"
            aria-label="View match details for {{ $homeClubName }} vs {{ $awayClubName }}"
        >
            Details
        </a>
    @endif
    @if(\Illuminate\Support\Arr::get($match, 'stage'))
        <span>{{ \Illuminate\Support\Arr::get($match, 'stage') }}</span>
    @endif
</article>
