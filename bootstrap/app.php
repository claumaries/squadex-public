<?php

use App\Http\Middleware\AddPublicSecurityHeaders;
use App\Http\Middleware\SetPublicLocale;
use App\Http\Middleware\TrustPublicHosts;
use Illuminate\Foundation\Application;
use Illuminate\Foundation\Configuration\Exceptions;
use Illuminate\Foundation\Configuration\Middleware;
use Symfony\Component\HttpFoundation\Request;

$trustedProxies = getenv('PUBLIC_TRUSTED_PROXIES') ?: 'REMOTE_ADDR';
$trustedProxies = $trustedProxies === '*'
    ? '*'
    : array_values(array_filter(array_map(trim(...), explode(',', $trustedProxies))));

return Application::configure(basePath: dirname(__DIR__))
    ->withRouting(
        web: __DIR__.'/../routes/web.php',
        health: '/up',
    )
    ->withMiddleware(function (Middleware $middleware) use ($trustedProxies): void {
        $middleware->prepend(TrustPublicHosts::class);
        $middleware->trustProxies(
            at: $trustedProxies,
            headers: Request::HEADER_X_FORWARDED_FOR
                | Request::HEADER_X_FORWARDED_PORT
                | Request::HEADER_X_FORWARDED_PROTO,
        );

        $middleware->alias([
            'public.locale' => SetPublicLocale::class,
        ]);

        $middleware->group('web', [
            AddPublicSecurityHeaders::class,
            'cache.headers:public;max_age=60;s_maxage=300;stale_while_revalidate=600;etag',
        ]);
    })
    ->withExceptions(function (Exceptions $exceptions): void {
        $exceptions->dontReportDuplicates();
    })
    ->create();
