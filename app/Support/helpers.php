<?php

use App\PublicSite\AuthAppUrlGenerator;
use App\PublicSite\PublicUrlGenerator;

if (! function_exists('localeCode')) {
    function localeCode(): string
    {
        return app(PublicUrlGenerator::class)->currentLocale();
    }
}

if (! function_exists('public_route')) {
    /**
     * @param  array<string, mixed>  $parameters
     */
    function public_route(string $name, array $parameters = [], ?string $locale = null, array $query = []): string
    {
        return app(PublicUrlGenerator::class)->route($name, $parameters, $locale, $query);
    }
}

if (! function_exists('auth_app_url')) {
    function auth_app_url(string $destination, ?string $locale = null, ?string $referral = null): string
    {
        return app(AuthAppUrlGenerator::class)->to($destination, $locale, $referral);
    }
}

if (! function_exists('auth_app_session_url')) {
    function auth_app_session_url(): string
    {
        return app(AuthAppUrlGenerator::class)->sessionEndpoint();
    }
}

if (! function_exists('match_route_parameters')) {
    /**
     * @param  array<string, mixed>|object  $match
     * @return array<string, int|string>
     */
    function match_route_parameters(array|object $match): array
    {
        $competition = str((string) data_get($match, 'competition.slug', data_get($match, 'league.slug', data_get($match, 'competitionName', 'match'))))->slug()->value();
        $year = (int) data_get($match, 'season.year', data_get($match, 'year', now()->year));
        $slug = (string) data_get($match, 'slug', data_get($match, 'id', 'match'));

        return ['competition' => $competition ?: 'match', 'year' => $year, 'slug' => $slug];
    }
}

if (! function_exists('club_route_parameters')) {
    /**
     * @param  array<string, mixed>|object  $club
     * @return array<string, string>
     */
    function club_route_parameters(array|object $club): array
    {
        return [
            'country' => str((string) data_get($club, 'country.slug', data_get($club, 'country.name', data_get($club, 'countryName', 'club'))))->slug()->value(),
            'club' => str((string) data_get($club, 'slug', data_get($club, 'name', data_get($club, 'uuid', 'club'))))->slug()->value(),
        ];
    }
}
