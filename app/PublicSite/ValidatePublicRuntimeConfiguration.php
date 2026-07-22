<?php

namespace App\PublicSite;

use RuntimeException;

class ValidatePublicRuntimeConfiguration
{
    public function handle(bool $forceProductionValidation = false): void
    {
        if (! $forceProductionValidation && ! app()->isProduction()) {
            return;
        }

        $publicHost = $this->assertHttpsUrl((string) config('app.url'), 'APP_URL');
        $this->assertHttpsUrl((string) config('public_site.auth_app_url'), 'AUTH_APP_URL');

        if (filter_var(config('public_site.contact_address'), FILTER_VALIDATE_EMAIL) === false) {
            throw new RuntimeException('PUBLIC_CONTACT_ADDRESS must be a valid email address in production.');
        }

        $trustedHosts = config('public_site.trusted_hosts');

        if (! is_array($trustedHosts) || ! in_array('^'.preg_quote($publicHost, '/').'$', $trustedHosts, true)) {
            throw new RuntimeException('PUBLIC_TRUSTED_HOSTS must include the exact APP_URL host in production.');
        }

        if (config('public_site.trusted_proxies') === '*') {
            throw new RuntimeException('PUBLIC_TRUSTED_PROXIES cannot trust every address in production.');
        }

        foreach (config('public_site.media_hosts', []) as $host) {
            if (! is_string($host) || preg_match('/^(?=.{1,253}$)(?:[A-Za-z0-9](?:[A-Za-z0-9-]{0,61}[A-Za-z0-9])?\.)*[A-Za-z0-9](?:[A-Za-z0-9-]{0,61}[A-Za-z0-9])?$/', $host) !== 1) {
                throw new RuntimeException('PUBLIC_MEDIA_HOSTS contains an invalid hostname.');
            }
        }
    }

    private function assertHttpsUrl(string $url, string $variable): string
    {
        $parts = parse_url($url);

        if (! is_array($parts)
            || ($parts['scheme'] ?? null) !== 'https'
            || ! is_string($parts['host'] ?? null)
            || isset($parts['user'])
            || isset($parts['pass'])
            || isset($parts['query'])
            || isset($parts['fragment'])) {
            throw new RuntimeException("{$variable} must be an absolute HTTPS URL without credentials, query parameters, or a fragment in production.");
        }

        return strtolower($parts['host']);
    }
}
