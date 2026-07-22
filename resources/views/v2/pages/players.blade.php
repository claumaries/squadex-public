@extends('v2.layout.layout')

@section('content')
    @php
        $filters = array_merge([
            'q' => null,
            'club' => null,
            'position' => null,
            'sort' => 'name',
            'direction' => 'asc',
            'per_page' => 20,
        ], $filters ?? []);

        $sortLink = function (string $field) use ($filters): string {
            $nextDirection = $filters['sort'] === $field && $filters['direction'] === 'asc' ? 'desc' : 'asc';

            return public_route('pages.players', [], null, array_filter([
                'q' => $filters['q'],
                'club' => $filters['club'],
                'position' => $filters['position'],
                'per_page' => $filters['per_page'],
                'sort' => $field,
                'direction' => $nextDirection,
            ], static fn ($value) => $value !== null && $value !== ''));
        };

        $sortLabel = fn (string $field): string => $filters['sort'] === $field ? strtoupper($filters['direction']) : __('Sort');
    @endphp

    <main class="teams-page players-page">
        <section class="matches-body">
            <div class="container tokenomics-stack">
                <section class="token-roadmap-intro matches-intro" aria-labelledby="players-title">
                    <span class="tokenomics-kicker">{{ __('Player Directory') }}</span>
                    <h1 id="players-title">{{ __('Squadex Players') }}</h1>
                    <p class="matches-lead">
                        {{ __('Browse live Squadex player profiles by club, position, rating and market value.') }}
                    </p>
                    <p>
                        {{ __('The Squadex Players page provides a public football manager-style list of players that can be filtered, sorted and connected to individual player profiles.') }}
                    </p>
                    <nav class="token-roadmap-intro-actions" aria-label="{{ __('Players quick links') }}">
                        <a href="{{ public_route('pages.teams') }}">{{ __('View Teams') }}</a>
                        <a href="{{ public_route('pages.leaderboards') }}">{{ __('View Leaderboards') }}</a>
                    </nav>
                </section>

                <section class="tokenomics-panel" aria-labelledby="players-table">
                    <span class="tokenomics-kicker">{{ __('Players') }}</span>
                    <div class="teams-table-head">
                        <div>
                            <h2 id="players-table">{{ __('Player Directory') }}</h2>
                            <p>{{ __('Browse active players by name, club, position, overall rating and market value.') }}</p>
                        </div>
                        <strong>{{ $players->total() }} {{ __('players') }}</strong>
                    </div>

                    <form class="teams-filter-form players-filter-form" method="GET" action="{{ public_route('pages.players') }}">
                        <label>
                            <span>{{ __('Search') }}</span>
                            <input type="search" name="q" value="{{ $filters['q'] }}" placeholder="{{ __('Player, club or position') }}">
                        </label>
                        <label>
                            <span>{{ __('Club') }}</span>
                            <select name="club">
                                <option value="">{{ __('All clubs') }}</option>
                                @foreach ($clubs as $club)
                                    <option value="{{ data_get($club, 'id') }}" @selected((string) $filters['club'] === (string) data_get($club, 'id'))>{{ data_get($club, 'name') }}</option>
                                @endforeach
                            </select>
                        </label>
                        <label>
                            <span>{{ __('Position') }}</span>
                            <select name="position">
                                <option value="">{{ __('All positions') }}</option>
                                @foreach ($positions as $position)
                                    <option value="{{ data_get($position, 'id') }}" @selected((string) $filters['position'] === (string) data_get($position, 'id'))>{{ data_get($position, 'short_name') }} - {{ data_get($position, 'name') }}</option>
                                @endforeach
                            </select>
                        </label>
                        <label>
                            <span>{{ __('Per page') }}</span>
                            <select name="per_page">
                                <option value="20" @selected($filters['per_page'] === 20)>20</option>
                                <option value="50" @selected($filters['per_page'] === 50)>50</option>
                            </select>
                        </label>
                        <input type="hidden" name="sort" value="{{ $filters['sort'] }}">
                        <input type="hidden" name="direction" value="{{ $filters['direction'] }}">
                        <div class="teams-filter-actions">
                            <button type="submit">{{ __('Apply Filters') }}</button>
                            <a href="{{ public_route('pages.players') }}">{{ __('Reset') }}</a>
                        </div>
                    </form>

                    <div class="market-table-shell teams-table-shell">
                        <table class="market-table teams-table players-table">
                            <thead>
                                <tr>
                                    <th><a href="{{ $sortLink('name') }}">{{ __('Player') }}<span>{{ $sortLabel('name') }}</span></a></th>
                                    <th><a href="{{ $sortLink('club') }}">{{ __('Club') }}<span>{{ $sortLabel('club') }}</span></a></th>
                                    <th><a href="{{ $sortLink('position') }}">{{ __('Position') }}<span>{{ $sortLabel('position') }}</span></a></th>
                                    <th><a href="{{ $sortLink('rating') }}">{{ __('Rating') }}<span>{{ $sortLabel('rating') }}</span></a></th>
                                    <th><a href="{{ $sortLink('market_value') }}">{{ __('Market Value') }}<span>{{ $sortLabel('market_value') }}</span></a></th>
                                    <th><a href="{{ $sortLink('age') }}">{{ __('Age') }}<span>{{ $sortLabel('age') }}</span></a></th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($players as $player)
                                    <tr>
                                        <td>
                                            <a class="teams-identity" href="{{ public_route('pages.player.details', ['uuid' => $player['uuid']]) }}">
                                                <span aria-hidden="true">{{ substr($player['name'], 0, 1) }}</span>
                                                <strong>{{ $player['name'] }}</strong>
                                            </a>
                                        </td>
                                        <td>{{ $player['club'] }}</td>
                                        <td>{{ $player['position'] }}</td>
                                        <td><strong>{{ $player['rating'] }}</strong></td>
                                        <td>{{ $player['marketValue'] }}</td>
                                        <td>{{ $player['age'] ?? 'TBC' }}</td>
                                        <td>
                                            <a class="market-buy-btn compact" href="{{ public_route('pages.player.details', ['uuid' => $player['uuid']]) }}">{{ __('View Player') }}<span>&#8599;</span></a>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="7">
                                            <div class="market-empty">{{ __('No players match the selected filters.') }}</div>
                                        </td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>

                    @include('v2.partials.marketplace-pagination', [
                        'results' => $players->toArray(),
                        'paginationLabel' => __('Players pagination'),
                    ])
                </section>
            </div>
        </section>
    </main>
@stop
