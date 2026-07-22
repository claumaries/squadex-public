<?php

namespace App\Http\Middleware;

use App\PublicSite\LocaleRegistry;
use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class SetPublicLocale
{
    public function __construct(private readonly LocaleRegistry $locales) {}

    /**
     * Handle an incoming request.
     *
     * @param  Closure(Request): (Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $routeLocale = (string) $request->route('locale');

        abort_unless($this->locales->isRouteLocale($routeLocale), 404);

        app()->setLocale($this->locales->translationLocale($routeLocale));

        return $next($request);
    }
}
