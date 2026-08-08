<?php

use Illuminate\Support\Facades\File;

test('sitemap endpoints publish canonical public urls', function () {
    $this->get('/sitemap.xml')
        ->assertOk()
        ->assertHeader('Content-Type', 'application/xml; charset=UTF-8')
        ->assertSee('/sitemap-static.xml');

    $this->get('/sitemap-static.xml')
        ->assertOk()
        ->assertSee('<loc>http://localhost/en</loc>', false)
        ->assertSee('<loc>http://localhost/fr/privacy-policy</loc>', false);
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

test('robots points crawlers to the sitemap', function () {
    $this->get('/robots.txt')
        ->assertOk()
        ->assertSee('Allow: /')
        ->assertSee('Sitemap: http://localhost/sitemap.xml');
});
