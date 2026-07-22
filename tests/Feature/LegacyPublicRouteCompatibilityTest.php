<?php

test('legacy public aliases converge on one canonical localized URL', function (string $legacy, string $canonical) {
    $this->get('/'.$legacy)
        ->assertMovedPermanently()
        ->assertRedirect('/en/'.$canonical);

    $this->get('/en/'.$legacy)
        ->assertMovedPermanently()
        ->assertRedirect('/en/'.$canonical);
})->with([
    ['news', 'latest-news'],
    ['marketplace', 'market'],
    ['terms-of-service', 'terms-and-conditions'],
    ['cookies', 'cookie-policy'],
    ['roadmap', 'token-roadmap'],
    ['transparency', 'token-transparency'],
    ['buy', 'how-to-buy'],
]);

test('legacy content routes redirect to their maintained public equivalent', function () {
    $this->get('/fr/fixtures')->assertRedirect('/fr/matches?status=scheduled');
    $this->get('/en/results')->assertRedirect('/en/matches?status=finished');
    $this->get('/en/documentation')->assertRedirect('/en/guides');
    $this->get('/de/early-access?r=partner')->assertRedirect('https://app.sqaudex.com/de/register?r=partner');
});

test('retired placeholder-only routes return a terminal gone response', function (string $path) {
    $this->get('/en/'.$path)
        ->assertGone()
        ->assertHeader('X-Robots-Tag', 'noindex, nofollow');
})->with([
    'api',
    'api/docs',
    'daily-picks',
    'custom-simulation',
    'match/old-slug',
    'player/old-slug',
    'team/old-slug',
    'article/old-slug',
    'compare/player/one-vs-two',
]);

test('unknown localized paths terminate with a 404 instead of entering a redirect loop', function () {
    $this->get('/en/unknown-public-page')->assertNotFound();
});

test('legacy language switching does not expose a state-changing endpoint', function () {
    $this->post('/switch-language', ['locale' => 'fr', 'path' => '/about'])
        ->assertMethodNotAllowed();
});

test('legacy match stats and comparison URL shapes remain resolvable', function () {
    $this->get('/en/match/public-final/stats')->assertOk();
    $this->get('/en/compare/england/public-fc-vs-spain/public-united')->assertOk();
    $this->get('/en/compare/public-fc-vs-public-united')->assertOk();
});
