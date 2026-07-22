<?php

namespace App\PublicSite;

use Illuminate\Support\Arr;

class LocaleRegistry
{
    /** @var list<string>|null */
    private ?array $routeLocales = null;

    /** @var array<string, string>|null */
    private ?array $legacyRouteLocales = null;

    /** @return list<string> */
    public function routeLocales(): array
    {
        return $this->routeLocales ??= array_keys(config('locales', []));
    }

    /** @return array<string, string> */
    public function legacyRouteLocales(): array
    {
        if ($this->legacyRouteLocales !== null) {
            return $this->legacyRouteLocales;
        }

        $legacyRouteLocales = [];

        foreach (config('locales', []) as $routeLocale => $locale) {
            if ($routeLocale !== $locale['translation_locale']) {
                $legacyRouteLocales[$locale['translation_locale']] = $routeLocale;
            }
        }

        return $this->legacyRouteLocales = $legacyRouteLocales;
    }

    public function isRouteLocale(?string $locale): bool
    {
        return is_string($locale) && in_array($locale, $this->routeLocales(), true);
    }

    public function routeLocale(?string $locale): string
    {
        if ($this->isRouteLocale($locale)) {
            return $locale;
        }

        return $this->legacyRouteLocales()[$locale ?? ''] ?? 'en';
    }

    public function translationLocale(string $routeLocale): string
    {
        return (string) Arr::get(config('locales'), $this->routeLocale($routeLocale).'.translation_locale', 'en');
    }

    /** @return array<string, mixed> */
    public function metadata(string $locale): array
    {
        return (array) Arr::get(config('locales'), $this->routeLocale($locale), config('locales.en', []));
    }

    public function legacyTarget(string $legacyLocale): ?string
    {
        return $this->legacyRouteLocales()[$legacyLocale] ?? null;
    }
}
