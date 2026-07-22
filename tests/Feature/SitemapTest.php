<?php

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

test('robots points crawlers to the sitemap', function () {
    $this->get('/robots.txt')
        ->assertOk()
        ->assertSee('Allow: /')
        ->assertSee('Sitemap: http://localhost/sitemap.xml');
});
