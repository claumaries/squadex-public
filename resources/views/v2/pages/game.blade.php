@extends('v2.layout.layout')

@section('content')
    <main class="game-page">
        <section class="game-hero-section">
            <div class="container game-hero-inner">
                <h1>{{ __('Football management built around the next decision') }}</h1>
                <p>
                    {{ __('Build a club, prepare the team, follow the match and use the result to make the next decision clearer. The game connects squad management, tactics, competitions and marketplace activity into one readable manager loop.') }}
                </p>
                <p>
                    {{ __('Managers control football clubs, review performance, follow league tables, prepare for fixtures and make decisions that affect long-term progression.') }}
                </p>
            </div>
        </section>

        <section class="game-story-section">
            <div class="container game-story">
                <section class="game-story-block">
                    <header class="game-section-heading">
                        <h2>{{ __('A simple rhythm for every fixture') }}</h2>
                        <p>
                            {{ __('The page should read like the game itself: build, prepare, play, learn. Each step gives the manager one clear reason to come back before the next match.') }}
                        </p>
                        <p>
                            {{ __('Complete your account setup, review your club, check player roles, follow upcoming fixtures and become familiar with the marketplace before making bigger changes.') }}
                        </p>
                    </header>

                    <div class="game-accordion">
                        <details class="game-accordion-item" name="manager-loop" open>
                            <summary>
                                <span class="game-accordion-number">01</span>
                                <span class="game-accordion-title">{{ __('Build the club') }}</span>
                                <span class="game-accordion-icon" aria-hidden="true"></span>
                            </summary>
                            <div class="game-accordion-body">
                                <p>{{ __('Shape your squad, understand player quality and keep club progress connected to resources.') }}</p>
                                <p>{{ __('game.accordion.build.details') }}</p>
                            </div>
                        </details>

                        <details class="game-accordion-item" name="manager-loop">
                            <summary>
                                <span class="game-accordion-number">02</span>
                                <span class="game-accordion-title">{{ __('Prepare the team') }}</span>
                                <span class="game-accordion-icon" aria-hidden="true"></span>
                            </summary>
                            <div class="game-accordion-body">
                                <p>{{ __('Select formations, roles and tactical choices that fit the players available.') }}</p>
                                <p>{{ __('game.accordion.prepare.details') }}</p>
                            </div>
                        </details>

                        <details class="game-accordion-item" name="manager-loop">
                            <summary>
                                <span class="game-accordion-number">03</span>
                                <span class="game-accordion-title">{{ __('Read the match') }}</span>
                                <span class="game-accordion-icon" aria-hidden="true"></span>
                            </summary>
                            <div class="game-accordion-body">
                                <p>{{ __('Follow events, pressure, goals and statistics in a way that explains the result.') }}</p>
                                <p>{{ __('game.accordion.read.details') }}</p>
                            </div>
                        </details>

                        <details class="game-accordion-item" name="manager-loop">
                            <summary>
                                <span class="game-accordion-number">04</span>
                                <span class="game-accordion-title">{{ __('Improve again') }}</span>
                                <span class="game-accordion-icon" aria-hidden="true"></span>
                            </summary>
                            <div class="game-accordion-body">
                                <p>{{ __('Use match feedback, tournaments and marketplace opportunities to strengthen the next run.') }}</p>
                                <p>{{ __('game.accordion.improve.details') }}</p>
                            </div>
                        </details>
                    </div>
                </section>

                <section class="game-story-block">
                    <header class="game-section-heading">
                        <h2>{{ __('The important screens stay connected') }}</h2>
                        <p>
                            {{ __('Squad attributes, first eleven selection, fixtures, live match updates, club context and marketplace choices all point back to the same football decision loop.') }}
                        </p>
                    </header>

                    <div class="game-feature-strip">
                        <a href="{{ auth_app_url('login') }}">
                            <span class="game-feature-copy">
                                <strong>{{ __('Squad') }}</strong>
                                <span>{{ __('A club represents your football operation. It connects players, fixtures, stadium context, results, marketplace activity and progression into one management experience.') }}</span>
                            </span>
                            <span class="game-feature-arrow" aria-hidden="true">&rarr;</span>
                        </a>
                        <a href="{{ auth_app_url('login') }}">
                            <span class="game-feature-copy">
                                <strong>{{ __('Tactics') }}</strong>
                                <span>{{ __('Formation affects role coverage, squad balance and tactical fit. Strong individual players still need to be placed in a structure that supports the team.') }}</span>
                            </span>
                            <span class="game-feature-arrow" aria-hidden="true">&rarr;</span>
                        </a>
                        <a href="{{ public_route('pages.matches', query: ['status' => 'scheduled']) }}">
                            <span class="game-feature-copy">
                                <strong>{{ __('Fixtures') }}</strong>
                                <span>{{ __('Follow events, pressure, goals and statistics in a way that explains the result.') }}</span>
                            </span>
                            <span class="game-feature-arrow" aria-hidden="true">&rarr;</span>
                        </a>
                        <a href="{{ public_route('pages.marketplace.players') }}">
                            <span class="game-feature-copy">
                                <strong>{{ __('Market') }}</strong>
                                <span>{{ __('Marketplace activity for players, clubs and ecosystem assets') }}</span>
                            </span>
                            <span class="game-feature-arrow" aria-hidden="true">&rarr;</span>
                        </a>
                        <a href="{{ public_route('pages.matches', query: ['status' => 'finished']) }}">
                            <span class="game-feature-copy">
                                <strong>{{ __('Results') }}</strong>
                                <span>{{ __('Match data should help the manager understand what happened: player output, match events, momentum and the practical signal for the next team selection.') }}</span>
                            </span>
                            <span class="game-feature-arrow" aria-hidden="true">&rarr;</span>
                        </a>
                    </div>
                </section>

                <section class="game-dashboard-preview">
                    <div>
                        <h2>{{ __('Readable simulation, not noise') }}</h2>
                        <p>
                            {{ __('Match data should help the manager understand what happened: player output, match events, momentum and the practical signal for the next team selection.') }}
                        </p>
                        <p>
                            {{ __('Matches are simulated from team strength, player roles, tactical context and match events. The goal is readable football logic rather than random score generation.') }}
                        </p>
                    </div>
                    <img src="{{ asset('v2/assets/dashboard.png') }}" alt="{{ config('app.name') }} dashboard preview">
                </section>

                <section class="game-story-block game-story-final">
                    <header class="game-section-heading">
                        <h2>{{ __('Competitions and market activity give the season context') }}</h2>
                        <p>
                            {{ __('Tournaments, leaderboards, public match reports, player markets and token utility support the manager journey without pulling attention away from football.') }}
                        </p>
                        <p>
                            {{ __('Football-first gameplay with fixtures, standings, results and tactical decisions.') }}
                        </p>
                    </header>

                    <nav class="game-link-row" aria-label="{{ __('Game links') }}">
                        <a href="{{ public_route('pages.tournaments') }}">{{ __('Tournaments') }}</a>
                        <a href="{{ public_route('pages.leaderboards') }}">{{ __('Leaderboards') }}</a>
                        <a href="{{ public_route('pages.marketplace.players') }}">{{ __('Marketplace') }}</a>
                        <a href="{{ public_route('pages.token') }}">{{ __('Token Utility') }}</a>
                    </nav>
                </section>
            </div>
        </section>
    </main>
@stop
