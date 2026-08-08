<?php

namespace App\PublicSite;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Lang;

class SeoMetadataFactory
{
    public function __construct(
        private readonly LocaleRegistry $locales,
        private readonly Request $request,
    ) {}

    /**
     * @param  array<string, mixed>  $routeParameters
     * @param  list<string>|null  $availableLocales
     * @param  array{title: string, description: string}|null  $translationKeys
     * @return array<string, mixed>
     */
    public function make(string $title, string $description, array $routeParameters = [], ?array $availableLocales = null, string $robots = 'index,follow', ?array $translationKeys = null): array
    {
        $route = $this->request->route();
        $routeName = $route?->getName() ?? 'pages.homepage';
        $parameters = collect($route?->parametersWithoutNulls() ?? [])
            ->except(['locale', 'page', 'title'])
            ->merge($routeParameters)
            ->all();
        $currentRouteLocale = $this->locales->routeLocale((string) $this->request->route('locale'));
        $currentMetadata = $this->locales->metadata($currentRouteLocale);

        $routeLocales = collect($availableLocales ?? $this->translatedRouteLocales(
            $translationKeys['title'] ?? $title,
            $translationKeys['description'] ?? $description,
        ))
            ->filter(fn (mixed $locale): bool => is_string($locale) && $this->locales->isRouteLocale($locale))
            ->unique()
            ->values();
        $alternates = $routeLocales->mapWithKeys(function (string $locale) use ($routeName, $parameters): array {
            return [$locale => [
                'hreflang' => (string) data_get($this->locales->metadata($locale), 'hreflang', $locale),
                'url' => route($routeName, ['locale' => $locale, ...$parameters]),
            ]];
        })->all();

        $canonical = route($routeName, ['locale' => $currentRouteLocale, ...$parameters]);
        $image = asset('v2/assets/squadex-og.png');
        $openGraphLocales = $routeLocales
            ->map(fn (string $locale): string => (string) data_get($this->locales->metadata($locale), 'og_locale', $locale))
            ->values();

        return [
            'title' => $title,
            'description' => $description,
            'canonical' => $canonical,
            'alternates' => $alternates,
            'xDefault' => data_get($alternates, 'en.url', $canonical),
            'htmlLang' => (string) data_get($currentMetadata, 'html_lang', $currentRouteLocale),
            'image' => $image,
            'robots' => $robots,
            'openGraph' => [
                'type' => 'website',
                'title' => $title,
                'description' => $description,
                'url' => $canonical,
                'image' => $image,
                'siteName' => (string) config('app.name'),
                'locale' => (string) data_get($currentMetadata, 'og_locale', $currentRouteLocale),
                'alternateLocales' => $openGraphLocales->reject(fn (string $locale): bool => $locale === data_get($currentMetadata, 'og_locale'))->all(),
            ],
            'twitter' => [
                'card' => 'summary_large_image',
                'title' => $title,
                'description' => $description,
                'image' => $image,
            ],
            'structuredData' => [
                '@context' => 'https://schema.org',
                '@type' => 'WebPage',
                'name' => $title,
                'description' => $description,
                'url' => $canonical,
                'inLanguage' => (string) data_get($currentMetadata, 'schema_language', $currentRouteLocale),
                'image' => $image,
            ],
        ];
    }

    /** @return list<string> */
    private function translatedRouteLocales(string $title, string $description): array
    {
        return collect($this->locales->routeLocales())
            ->filter(function (string $routeLocale) use ($title, $description): bool {
                if ($routeLocale === 'en') {
                    return true;
                }

                $translationLocale = $this->locales->translationLocale($routeLocale);

                return Lang::hasForLocale($title, $translationLocale, false)
                    && Lang::hasForLocale($description, $translationLocale, false);
            })
            ->values()
            ->all();
    }
}
