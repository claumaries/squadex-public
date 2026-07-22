<?php

namespace App\Http\Controllers\Public;

use App\Http\Controllers\Controller;
use App\PublicSite\LocaleRegistry;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class RedirectToCanonicalLocaleController extends Controller
{
    public function __construct(private readonly LocaleRegistry $locales) {}

    public function legacy(Request $request, string $legacyLocale, ?string $path = null): RedirectResponse
    {
        $targetLocale = $this->locales->legacyTarget($legacyLocale);
        abort_if($targetLocale === null, 404);

        return $this->redirect($request, $targetLocale, $path);
    }

    public function default(Request $request, ?string $path = null): RedirectResponse
    {
        if (filled($path)) {
            $segments = explode('/', trim((string) $path, '/'));
            $candidateLocale = $segments[0] ?? null;

            if ($this->locales->isRouteLocale($candidateLocale)) {
                $localizedPath = implode('/', array_slice($segments, 1));
                $canonicalPath = $this->canonicalPath($localizedPath);

                abort_if($canonicalPath === $localizedPath, 404);

                return $this->redirect($request, (string) $candidateLocale, $canonicalPath);
            }
        }

        return $this->redirect($request, 'en', $path);
    }

    private function redirect(Request $request, string $locale, ?string $path): RedirectResponse
    {
        $path = $this->canonicalPath($path);
        $target = '/'.$locale.($path ? '/'.ltrim($path, '/') : '');
        $queryString = $request->getQueryString();

        return redirect()->to(url($target).($queryString ? '?'.$queryString : ''), 301);
    }

    private function canonicalPath(?string $path): ?string
    {
        if (blank($path)) {
            return $path;
        }

        return (string) config('public_site.legacy_aliases.'.trim((string) $path, '/'), $path);
    }
}
