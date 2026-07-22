<?php

namespace App\PublicSite;

use Illuminate\Routing\UrlGenerator;

class PublicUrlGenerator
{
    public function __construct(
        private readonly LocaleRegistry $locales,
        private readonly UrlGenerator $urls,
    ) {}

    public function currentLocale(): string
    {
        return $this->locales->routeLocale(request()->route('locale'));
    }

    /**
     * @param  array<string, mixed>  $parameters
     */
    public function route(string $name, array $parameters = [], ?string $locale = null, array $query = []): string
    {
        return $this->urls->route($name, [
            'locale' => $this->locales->routeLocale($locale ?? $this->currentLocale()),
            ...$parameters,
            ...$query,
        ]);
    }
}
