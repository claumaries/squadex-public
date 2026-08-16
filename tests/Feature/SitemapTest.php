<?php

use Illuminate\Support\Facades\File;
use Tests\Support\PublicProjectionFixture;

test('sitemap endpoints publish canonical public urls', function () {
    $homepageUrl = route('pages.homepage', ['locale' => 'en']);
    $privacyUrl = route('pages.privacy', ['locale' => 'fr']);

    $this->get('/sitemap.xml')
        ->assertOk()
        ->assertHeader('Content-Type', 'application/xml; charset=UTF-8')
        ->assertSee('/sitemap-static.xml');

    $this->get('/sitemap-static.xml')
        ->assertOk()
        ->assertSee("<loc>{$homepageUrl}</loc>", false)
        ->assertSee("<loc>{$privacyUrl}</loc>", false);
});

test('the static sitemap excludes projections that are unavailable', function () {
    $projectionPath = storage_path('framework/testing/unavailable-sitemap-projections');
    File::deleteDirectory($projectionPath);
    File::ensureDirectoryExists($projectionPath);
    config()->set('public_site.projection.path', $projectionPath);
    cache()->clear();

    $teamsUrl = route('pages.teams', ['locale' => 'en']);
    $aboutUrl = route('pages.about', ['locale' => 'en']);

    try {
        $this->get('/sitemap-static.xml')
            ->assertOk()
            ->assertDontSee("<loc>{$teamsUrl}</loc>", false)
            ->assertSee("<loc>{$aboutUrl}</loc>", false);
    } finally {
        File::deleteDirectory($projectionPath);
        cache()->clear();
    }
});

test('dynamic sitemap sections exclude detail URLs until their projection is available', function () {
    $projectionPath = storage_path('framework/testing/unavailable-detail-sitemap-projections');
    File::deleteDirectory($projectionPath);
    File::ensureDirectoryExists($projectionPath);
    config()->set('public_site.projection.path', $projectionPath);
    cache()->clear();

    $clubUrl = 'https://sqaudex.example/en/club/england/public-fc';

    try {
        PublicProjectionFixture::publish($projectionPath, [
            'pages/club.json' => PublicProjectionFixture::unavailablePage(),
            'sitemaps/clubs.json' => PublicProjectionFixture::sitemap([['url' => $clubUrl]]),
        ]);

        $this->get('/sitemap-clubs.xml')
            ->assertOk()
            ->assertDontSee("<loc>{$clubUrl}</loc>", false);
    } finally {
        File::deleteDirectory($projectionPath);
        cache()->clear();
    }
});

test('robots points crawlers to the sitemap', function () {
    $this->get('/robots.txt')
        ->assertOk()
        ->assertSee('Allow: /')
        ->assertSee('Sitemap: '.route('sitemap.xml'));
});
