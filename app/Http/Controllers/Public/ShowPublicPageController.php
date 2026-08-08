<?php

namespace App\Http\Controllers\Public;

use App\Http\Controllers\Controller;
use App\PublicSite\BuildPublicPage;
use Illuminate\Http\Response;
use Illuminate\Http\Request;

class ShowPublicPageController extends Controller
{
    public function __construct(private readonly BuildPublicPage $buildPublicPage) {}

    public function __invoke(Request $request): Response
    {
        $page = (string) $request->route('page');
        $builtPage = $this->buildPublicPage->handle($request, $page);

        $response = response()->view($builtPage['view'], $builtPage['data'], $builtPage['status']);

        $robots = data_get($builtPage, 'data.seo.robots');

        if ($robots !== 'index,follow') {
            $response->header('X-Robots-Tag', (string) $robots);
        }

        if ($builtPage['retry_after'] === null) {
            return $response;
        }

        return $response
            ->header('Retry-After', (string) $builtPage['retry_after']);
    }
}
