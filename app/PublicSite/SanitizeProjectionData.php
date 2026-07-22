<?php

namespace App\PublicSite;

use Illuminate\Support\Str;

class SanitizeProjectionData
{
    /** @param  array<string, mixed>  $data
     * @return array<string, mixed>
     */
    public function handle(array $data): array
    {
        return $this->sanitizeValue($data);
    }

    public function url(string $url, string $key = 'url'): ?string
    {
        $url = trim($url);

        if ($url === '' || preg_match('/[\x00-\x20\x7F]/u', $url) === 1 || str_starts_with($url, '//')) {
            return null;
        }

        if (str_starts_with($url, '/') || str_starts_with($url, '#') || str_starts_with($url, '?')) {
            return $url;
        }

        $parts = parse_url($url);

        if ($parts === false || isset($parts['user']) || isset($parts['pass'])) {
            return null;
        }

        if (! isset($parts['scheme'])) {
            return preg_match('/^[A-Za-z0-9._~!$&\'()*+,;=:@%\/-]+(?:\?[A-Za-z0-9._~!$&\'()*+,;=:@%\/?-]*)?(?:#[A-Za-z0-9._~!$&\'()*+,;=:@%\/?-]*)?$/u', $url) === 1
                ? $url
                : null;
        }

        $scheme = strtolower((string) $parts['scheme']);
        $host = strtolower((string) ($parts['host'] ?? ''));
        $appHost = strtolower((string) (parse_url((string) config('app.url'), PHP_URL_HOST) ?: ''));
        $allowedHosts = collect(config('public_site.media_hosts', []))
            ->map(fn (mixed $allowedHost): string => strtolower((string) $allowedHost))
            ->push($appHost)
            ->filter()
            ->unique()
            ->all();

        if ($scheme === 'mailto' && $this->isLinkKey($key)) {
            return filter_var(substr($url, 7), FILTER_VALIDATE_EMAIL) !== false ? $url : null;
        }

        if ($host === '' || ! in_array($host, $allowedHosts, true)) {
            return null;
        }

        if ($scheme === 'https') {
            return $url;
        }

        if ($scheme === 'http' && ! app()->isProduction() && $host === $appHost) {
            return $url;
        }

        return null;
    }

    private function sanitizeValue(mixed $value, ?string $key = null): mixed
    {
        if (is_array($value)) {
            $sanitized = [];

            foreach ($value as $nestedKey => $nestedValue) {
                $sanitized[$nestedKey] = $this->sanitizeValue($nestedValue, is_string($nestedKey) ? $nestedKey : null);
            }

            return $sanitized;
        }

        if (! is_string($value) || $key === null) {
            return $value;
        }

        if (Str::endsWith(Str::lower($key), ['html', '_html'])) {
            return Str::of(strip_tags($value))->squish()->toString();
        }

        if ($this->isUrlKey($key)) {
            return $this->url($value, $key);
        }

        return $value;
    }

    private function isUrlKey(string $key): bool
    {
        $key = Str::lower($key);

        return in_array($key, ['href', 'src', 'url', 'image', 'logo', 'flag', 'photo', 'avatar', 'detailshomepage', 'imagepath', 'logopath'], true)
            || Str::endsWith($key, ['url', '_url']);
    }

    private function isLinkKey(string $key): bool
    {
        return in_array(Str::lower($key), ['href', 'url', 'detailshomepage'], true);
    }
}
