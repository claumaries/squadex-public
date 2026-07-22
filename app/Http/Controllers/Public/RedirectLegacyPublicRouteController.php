<?php

namespace App\Http\Controllers\Public;

use App\Http\Controllers\Controller;
use App\PublicSite\AuthAppUrlGenerator;
use App\PublicSite\PublicUrlGenerator;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class RedirectLegacyPublicRouteController extends Controller
{
    public function __construct(
        private readonly PublicUrlGenerator $publicUrls,
        private readonly AuthAppUrlGenerator $authAppUrls,
    ) {}

    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request): RedirectResponse
    {
        $legacyPath = (string) $request->route('legacyPath');
        $definition = config("public_site.legacy_redirects.{$legacyPath}");
        abort_unless(is_array($definition), 404);

        $locale = (string) $request->route('locale');

        if (is_string($definition['auth'] ?? null)) {
            return redirect()->away($this->authAppUrls->to(
                $definition['auth'],
                $locale,
                $request->string('r')->limit(255, '')->value() ?: null,
            ), 301);
        }

        return redirect()->away($this->publicUrls->route(
            (string) $definition['route'],
            locale: $locale,
            query: (array) ($definition['query'] ?? []),
        ), 301);
    }
}
