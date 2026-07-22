<?php

namespace App\PublicSite;

use InvalidArgumentException;

class AuthAppUrlGenerator
{
    public function __construct(private readonly LocaleRegistry $locales) {}

    public function to(string $destination, ?string $locale = null, ?string $referral = null): string
    {
        if (! in_array($destination, ['dashboard', 'login', 'register'], true)) {
            throw new InvalidArgumentException('Unsupported authenticated application destination.');
        }

        $url = $this->baseUrl().'/'.rawurlencode($this->routeLocale($locale));

        if ($destination !== 'dashboard') {
            $url .= '/'.$destination;
        }

        if ($destination === 'register' && filled($referral)) {
            $url .= '?'.http_build_query(['r' => $referral], '', '&', PHP_QUERY_RFC3986);
        }

        return $url;
    }

    public function sessionEndpoint(): string
    {
        return $this->baseUrl().'/api/v1/auth/session';
    }

    public function origin(): string
    {
        $parts = $this->validatedParts();
        $origin = $parts['scheme'].'://'.$parts['host'];

        if (isset($parts['port'])) {
            $origin .= ':'.$parts['port'];
        }

        return $origin;
    }

    private function baseUrl(): string
    {
        $this->validatedParts();

        return rtrim((string) config('public_site.auth_app_url'), '/');
    }

    private function routeLocale(?string $locale): string
    {
        if ($locale === null && app()->bound('request')) {
            $routeLocale = request()->route('locale');
            $locale = is_string($routeLocale) ? $routeLocale : null;
        }

        return $this->locales->routeLocale($locale);
    }

    /**
     * @return array{scheme: string, host: string, port?: int, path?: string}
     */
    private function validatedParts(): array
    {
        $baseUrl = rtrim((string) config('public_site.auth_app_url'), '/');
        $parts = parse_url($baseUrl);

        if (! is_array($parts)
            || ! in_array($parts['scheme'] ?? null, ['http', 'https'], true)
            || blank($parts['host'] ?? null)
            || isset($parts['user'])
            || isset($parts['pass'])
            || isset($parts['query'])
            || isset($parts['fragment'])) {
            throw new InvalidArgumentException('AUTH_APP_URL must be an absolute HTTP(S) URL without credentials, query parameters, or a fragment.');
        }

        /** @var array{scheme: string, host: string, port?: int, path?: string} $parts */
        return $parts;
    }
}
