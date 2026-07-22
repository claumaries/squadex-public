<?php

namespace App\Http\Controllers\Public;

use App\Http\Controllers\Controller;
use App\PublicSite\SitemapBuilder;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Response;

class SitemapController extends Controller
{
    public function __construct(private readonly SitemapBuilder $sitemap) {}

    public function index(): Response
    {
        return response()
            ->view('sitemaps.index', ['entries' => $this->sitemap->index()])
            ->header('Content-Type', 'application/xml; charset=UTF-8');
    }

    public function section(string $section): Response
    {
        return response()
            ->view('sitemaps.urls', ['entries' => $this->sitemap->section($section)])
            ->header('Content-Type', 'application/xml; charset=UTF-8');
    }

    public function robots(): Response
    {
        return response("User-agent: *\nAllow: /\nSitemap: ".route('sitemap.xml')."\n", 200)
            ->header('Content-Type', 'text/plain; charset=UTF-8');
    }

    public function localizedRobots(): RedirectResponse
    {
        return redirect()->route('robots', status: 301);
    }
}
