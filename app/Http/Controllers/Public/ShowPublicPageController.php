<?php

namespace App\Http\Controllers\Public;

use App\Http\Controllers\Controller;
use App\PublicSite\BuildPublicPage;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;

class ShowPublicPageController extends Controller
{
    public function __construct(private readonly BuildPublicPage $buildPublicPage) {}

    public function __invoke(Request $request): View
    {
        $page = (string) $request->route('page');
        $builtPage = $this->buildPublicPage->handle($request, $page);

        return view($builtPage['view'], $builtPage['data']);
    }
}
