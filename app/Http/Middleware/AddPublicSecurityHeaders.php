<?php

namespace App\Http\Middleware;

use App\PublicSite\AuthAppUrlGenerator;
use App\PublicSite\ValidatePublicRuntimeConfiguration;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Vite;
use Symfony\Component\HttpFoundation\Response;

class AddPublicSecurityHeaders
{
    public function __construct(
        private readonly ValidatePublicRuntimeConfiguration $runtimeConfiguration,
        private readonly AuthAppUrlGenerator $authAppUrl,
    ) {}

    /**
     * Handle an incoming request.
     *
     * @param  Closure(Request): (Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $this->runtimeConfiguration->handle();
        Vite::useCspNonce();

        $response = $next($request);
        $nonce = Vite::cspNonce();
        $mediaSources = collect(config('public_site.media_hosts', []))
            ->filter(fn (mixed $host): bool => is_string($host) && preg_match('/^[A-Za-z0-9.-]+$/', $host) === 1)
            ->map(fn (string $host): string => 'https://'.$host)
            ->implode(' ');
        $contentSecurityPolicy = implode('; ', [
            "default-src 'none'",
            "base-uri 'self'",
            "connect-src 'self' {$this->authAppUrl->origin()}",
            "font-src 'self'",
            "form-action 'self'",
            "frame-ancestors 'none'",
            "frame-src 'none'",
            trim("img-src 'self' data: {$mediaSources}"),
            "manifest-src 'self'",
            trim("media-src 'self' {$mediaSources}"),
            "object-src 'none'",
            "script-src 'self' 'nonce-{$nonce}'",
            "script-src-attr 'none'",
            "style-src 'self' 'unsafe-inline'",
            "worker-src 'self'",
            ...app()->isProduction() ? ['upgrade-insecure-requests'] : [],
        ]);

        $response->headers->set('X-Content-Type-Options', 'nosniff');
        $response->headers->set('Content-Security-Policy', $contentSecurityPolicy);
        $response->headers->set('Referrer-Policy', 'strict-origin-when-cross-origin');
        $response->headers->set('Permissions-Policy', 'camera=(), microphone=(), geolocation=()');
        $response->headers->set('X-Frame-Options', 'DENY');

        if (app()->isProduction() && $request->isSecure()) {
            $response->headers->set('Strict-Transport-Security', 'max-age=31536000; includeSubDomains');
        }

        return $response;
    }
}
