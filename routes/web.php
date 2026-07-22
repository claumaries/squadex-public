<?php

use App\Http\Controllers\Public\RedirectLegacyPublicRouteController;
use App\Http\Controllers\Public\RedirectToAuthenticatedAppController;
use App\Http\Controllers\Public\RedirectToCanonicalLocaleController;
use App\Http\Controllers\Public\ShowGonePublicPageController;
use App\Http\Controllers\Public\ShowPublicPageController;
use App\Http\Controllers\Public\SitemapController;
use App\PublicSite\LocaleRegistry;
use Illuminate\Support\Facades\Route;

$locales = app(LocaleRegistry::class);
$routeLocales = $locales->routeLocales();

Route::get('/sitemap.xml', [SitemapController::class, 'index'])->name('sitemap.xml');
Route::get('/sitemap-{section}.xml', [SitemapController::class, 'section'])
    ->whereIn('section', config('public_site.sitemap_sections'))
    ->name('sitemap.section');
Route::get('/robots.txt', [SitemapController::class, 'robots'])->name('robots');

Route::get('/login', RedirectToAuthenticatedAppController::class)
    ->defaults('destination', 'login')
    ->name('auth.login.redirect');
Route::get('/register', RedirectToAuthenticatedAppController::class)
    ->defaults('destination', 'register')
    ->name('auth.register.redirect');

Route::get('/{legacyLocale}/{path?}', [RedirectToCanonicalLocaleController::class, 'legacy'])
    ->whereIn('legacyLocale', array_keys($locales->legacyRouteLocales()))
    ->where('path', '.*');

Route::prefix('{locale}')
    ->whereIn('locale', $routeLocales)
    ->middleware('public.locale')
    ->group(function (): void {
        Route::get('/robots.txt', [SitemapController::class, 'localizedRobots']);

        Route::get('/login', RedirectToAuthenticatedAppController::class)
            ->defaults('destination', 'login')
            ->name('auth.login.localized.redirect');
        Route::get('/register', RedirectToAuthenticatedAppController::class)
            ->defaults('destination', 'register')
            ->name('auth.register.localized.redirect');

        $pages = [
            '/' => ['pages.homepage', 'homepage'],
            '/about' => ['pages.about', 'about'],
            '/contact' => ['pages.contact', 'contact'],
            '/game' => ['pages.game', 'game'],
            '/matches' => ['pages.matches', 'matches'],
            '/teams' => ['pages.teams', 'teams'],
            '/players' => ['pages.players', 'players'],
            '/stats' => ['pages.stats', 'stats'],
            '/stats/teams' => ['pages.stats.teams', 'team-stats'],
            '/stats/players' => ['pages.stats.players', 'player-stats-leaderboard'],
            '/stats/matches' => ['pages.stats.matches', 'match-stats-leaderboard'],
            '/top-players' => ['pages.top.players', 'top-players'],
            '/top-players-2026' => ['pages.top-players-2026', 'top-players-2026'],
            '/best-teams-2026' => ['pages.best-teams-2026', 'best-teams'],
            '/football-predictions' => ['pages.football-predictions', 'football-predictions'],
            '/status' => ['pages.status', 'status'],
            '/changelog' => ['pages.changelog', 'changelog'],
            '/guides' => ['pages.guides', 'guides'],
            '/insights' => ['pages.insights', 'insights'],
            '/highlights' => ['pages.highlights', 'highlights'],
            '/stories' => ['pages.stories', 'stories'],
            '/champions-league-results' => ['pages.champions-league-results', 'champions-league-results'],
            '/premier-league-simulations' => ['pages.league-simulations', 'league-simulations'],
            '/latest-news' => ['pages.news', 'news'],
            '/blog' => ['pages.blog', 'blog'],
            '/market' => ['pages.marketplace.players', 'marketplace'],
            '/market/clubs' => ['pages.marketplace.clubs', 'marketplace-clubs'],
            '/market/stadiums' => ['pages.marketplace.stadiums', 'marketplace-stadiums'],
            '/tournaments' => ['pages.tournaments', 'tournaments'],
            '/leaderboards' => ['pages.leaderboards', 'leaderboards'],
            '/leaderboards/goals' => ['pages.leaderboards.goals', 'goals-leaderboard'],
            '/leaderboards/xg' => ['pages.leaderboards.xg', 'xg-leaderboard'],
            '/records' => ['pages.records', 'records'],
            '/community' => ['pages.community', 'community'],
            '/discord' => ['pages.discord', 'discord'],
            '/twitter' => ['pages.twitter', 'twitter'],
            '/referral' => ['pages.referral', 'referral'],
            '/ambassadors' => ['pages.ambassadors', 'ambassadors'],
            '/partners' => ['pages.partners', 'partners'],
            '/investors' => ['pages.investors', 'investors'],
            '/token' => ['pages.token', 'token'],
            '/tokenomics' => ['pages.tokenomics', 'tokenomics'],
            '/token-roadmap' => ['pages.token-roadmap', 'token-roadmap'],
            '/token-transparency' => ['pages.token-transparency', 'token-transparency'],
            '/presale' => ['pages.presale', 'presale'],
            '/how-to-buy' => ['pages.how-to-buy', 'how-to-buy'],
            '/contract' => ['pages.contract', 'contract'],
            '/liquidity' => ['pages.liquidity', 'liquidity'],
            '/vesting' => ['pages.vesting', 'vesting'],
            '/whitepaper' => ['pages.whitepaper', 'whitepaper'],
            '/privacy-policy' => ['pages.privacy', 'privacy'],
            '/cookie-policy' => ['pages.cookie', 'cookie'],
            '/terms-and-conditions' => ['pages.terms', 'terms'],
            '/kyc-policy' => ['pages.kyc', 'kyc'],
            '/disclaimer' => ['pages.disclaimer', 'disclaimer'],
            '/faq' => ['pages.faq', 'faq'],
        ];

        foreach ($pages as $uri => [$name, $page]) {
            Route::get($uri, ShowPublicPageController::class)
                ->defaults('page', $page)
                ->name($name);
        }

        Route::get('/latest-news/{url}', ShowPublicPageController::class)
            ->where('url', '[A-Za-z0-9-]+')
            ->defaults('page', 'news-details')
            ->name('pages.details');
        Route::get('/blog/{url}', ShowPublicPageController::class)
            ->where('url', '[A-Za-z0-9-]+')
            ->defaults('page', 'blog-details')
            ->name('pages.blog.details');
        Route::get('/{simulation}', ShowPublicPageController::class)
            ->where('simulation', '[A-Za-z0-9-]+-simulations')
            ->defaults('page', 'league-season')
            ->name('pages.league.simulations');
        Route::get('/{results}', ShowPublicPageController::class)
            ->where('results', '[A-Za-z0-9-]+-results')
            ->defaults('page', 'league-results')
            ->name('pages.league.results');
        Route::get('/league/{slug}', ShowPublicPageController::class)->where('slug', '[A-Za-z0-9-]+')->defaults('page', 'league-season')->name('pages.league');
        Route::get('/competition/{slug}', ShowPublicPageController::class)->where('slug', '[A-Za-z0-9-]+')->defaults('page', 'competition-season')->name('pages.competition');
        Route::get('/country/{slug}', ShowPublicPageController::class)->where('slug', '[A-Za-z0-9-]+')->defaults('page', 'country')->name('pages.country');
        Route::get('/city/{slug}', ShowPublicPageController::class)->where('slug', '[A-Za-z0-9-]+')->defaults('page', 'city')->name('pages.city');
        Route::get('/season/{year}', ShowPublicPageController::class)->whereNumber('year')->defaults('page', 'season')->name('pages.season');
        Route::get('/standings/{league}', ShowPublicPageController::class)->where('league', '[A-Za-z0-9-]+')->defaults('page', 'standings')->name('pages.standings');
        Route::get('/form/{team}', ShowPublicPageController::class)->where('team', '[A-Za-z0-9-]+')->defaults('page', 'team-form')->name('pages.team.form');
        Route::get('/match-analysis/{team}', ShowPublicPageController::class)->where('team', '[A-Za-z0-9-]+')->defaults('page', 'match-team-analysis')->name('pages.match-analysis.team');
        Route::get('/team-analysis/{team}', ShowPublicPageController::class)->where('team', '[A-Za-z0-9-]+')->defaults('page', 'team-analysis')->name('pages.team-analysis.team');
        Route::get('/head-to-head/{teams}', ShowPublicPageController::class)->where('teams', '[A-Za-z0-9-]+')->defaults('page', 'compare-teams')->name('pages.head-to-head');
        Route::get('/player/{slug}/matches', ShowPublicPageController::class)->where('slug', '[A-Za-z0-9-]+')->defaults('page', 'player-matches')->name('pages.player.matches');
        Route::get('/player/{slug}/stats', ShowPublicPageController::class)->where('slug', '[A-Za-z0-9-]+')->defaults('page', 'player-stats')->name('pages.player.stats');
        Route::get('/leaderboards/{category}', ShowPublicPageController::class)
            ->whereIn('category', ['managers', 'clubs', 'players', 'leagues', 'countries'])
            ->defaults('page', 'leaderboards')
            ->name('pages.leaderboards.category');
        Route::get('/player/details/{uuid}', ShowPublicPageController::class)->defaults('page', 'player-details')->name('pages.player.details');

        Route::get('/compare/{countryA}/{teamA}-vs-{countryB}/{teamB}', ShowPublicPageController::class)
            ->where(['countryA' => '[A-Za-z0-9-]+', 'teamA' => '[A-Za-z0-9-]+', 'countryB' => '[A-Za-z0-9-]+', 'teamB' => '[A-Za-z0-9-]+'])
            ->defaults('page', 'compare-teams')
            ->name('pages.compare.teams.countries');
        Route::get('/compare/{teamA}-vs-{teamB}', ShowPublicPageController::class)
            ->where(['teamA' => '[A-Za-z0-9-]+', 'teamB' => '[A-Za-z0-9-]+'])
            ->defaults('page', 'compare-teams')
            ->name('pages.compare.teams.versus');
        Route::get('/compare/{teamA}-{teamB}', ShowPublicPageController::class)
            ->where(['teamA' => '[A-Za-z0-9-]+', 'teamB' => '[A-Za-z0-9-]+'])
            ->defaults('page', 'compare-teams')
            ->name('pages.compare.teams.legacy');

        Route::get('/match/{competition}/{year}/{slug}', ShowPublicPageController::class)
            ->where(['competition' => '[A-Za-z0-9-]+', 'year' => '\d{4}', 'slug' => '[A-Za-z0-9-]+'])
            ->defaults('page', 'match-details')
            ->name('page.match.details');
        Route::get('/match/{competition}/{year}/{slug}/stats', ShowPublicPageController::class)
            ->where(['competition' => '[A-Za-z0-9-]+', 'year' => '\d{4}', 'slug' => '[A-Za-z0-9-]+'])
            ->defaults('page', 'match-stats')
            ->name('page.match.stats');
        Route::get('/match/{slug}/lineups', ShowPublicPageController::class)->where('slug', '[A-Za-z0-9-]+')->defaults('page', 'match-lineups')->name('pages.match.lineups');
        Route::get('/match/{slug}/stats', ShowPublicPageController::class)->where('slug', '[A-Za-z0-9-]+')->defaults('page', 'match-stats')->name('pages.match.stats.legacy');
        Route::get('/match/{slug}/timeline', ShowPublicPageController::class)->where('slug', '[A-Za-z0-9-]+')->defaults('page', 'match-timeline')->name('pages.match.timeline');
        Route::get('/match/{slug}/ratings', ShowPublicPageController::class)->where('slug', '[A-Za-z0-9-]+')->defaults('page', 'match-ratings')->name('pages.match.ratings');
        Route::get('/match/{slug}/analysis', ShowPublicPageController::class)->where('slug', '[A-Za-z0-9-]+')->defaults('page', 'match-analysis')->name('pages.match.analysis');
        Route::get('/match/{slug}/predictions', ShowPublicPageController::class)->where('slug', '[A-Za-z0-9-]+')->defaults('page', 'match-predictions')->name('pages.match.predictions');
        Route::get('/match/{matchId}/{slug?}', ShowPublicPageController::class)
            ->whereNumber('matchId')
            ->where('slug', '[A-Za-z0-9-]+')
            ->defaults('page', 'match-details')
            ->name('page.match.details.legacy');
        Route::get('/club/{country}/{club}', ShowPublicPageController::class)
            ->where(['country' => '[A-Za-z0-9-]+', 'club' => '[A-Za-z0-9-]+'])
            ->defaults('page', 'club')
            ->name('page.club.details');
        Route::get('/club/{uuid}', ShowPublicPageController::class)->defaults('page', 'club')->name('page.club.details.legacy');

        foreach (array_keys(config('public_site.legacy_redirects')) as $legacyPath) {
            Route::get('/'.$legacyPath, RedirectLegacyPublicRouteController::class)
                ->defaults('legacyPath', $legacyPath)
                ->name('legacy.redirect.'.str_replace('-', '.', $legacyPath));
        }

        foreach (config('public_site.gone_paths') as $gonePath) {
            Route::get('/'.$gonePath, ShowGonePublicPageController::class)
                ->name('gone.'.str_replace(['/', '-'], '.', $gonePath));
        }

        Route::get('/compare/player/{players}', ShowGonePublicPageController::class)->where('players', '.*');
        Route::get('/article/{slug}', ShowGonePublicPageController::class)->where('slug', '[A-Za-z0-9-]+');
        Route::get('/match/{slug}', ShowGonePublicPageController::class)->where('slug', '[A-Za-z0-9-]+');
        Route::get('/player/{slug}', ShowGonePublicPageController::class)->where('slug', '[A-Za-z0-9-]+');
        Route::get('/team/{slug}', ShowGonePublicPageController::class)->where('slug', '[A-Za-z0-9-]+');
    });

foreach (config('public_site.gone_paths') as $gonePath) {
    Route::get('/'.$gonePath, ShowGonePublicPageController::class);
}

Route::get('/compare/player/{players}', ShowGonePublicPageController::class)->where('players', '.*');
Route::get('/article/{slug}', ShowGonePublicPageController::class)->where('slug', '[A-Za-z0-9-]+');
Route::get('/match/{slug}', ShowGonePublicPageController::class)->where('slug', '[A-Za-z0-9-]+');
Route::get('/player/{slug}', ShowGonePublicPageController::class)->where('slug', '[A-Za-z0-9-]+');
Route::get('/team/{slug}', ShowGonePublicPageController::class)->where('slug', '[A-Za-z0-9-]+');

Route::get('/{path?}', [RedirectToCanonicalLocaleController::class, 'default'])
    ->where('path', '.*')
    ->name('public.default-locale.redirect');
