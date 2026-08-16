<?php

namespace App\PublicSite;

use App\Contracts\PublicProjectionRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;
use Illuminate\Support\Str;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

class BuildPublicPage
{
    public function __construct(
        private readonly PublicProjectionRepository $projections,
        private readonly SeoMetadataFactory $seo,
        private readonly HydrateProjectionData $hydrateProjectionData,
        private readonly CanonicalProjectionParameters $canonicalParameters,
    ) {}

    /**
     * @return array{view: string, data: array<string, mixed>, status: int, retry_after: int|null}
     */
    public function handle(Request $request, string $page): array
    {
        $definition = config("public_pages.{$page}");

        if (! is_array($definition)) {
            throw new NotFoundHttpException;
        }

        $parameters = $this->projectionParameters($request);
        $projectionMode = $definition['projection'] ?? false;
        $projection = $projectionMode === false ? null : $this->projection($page, $parameters);
        $sourceTitle = (string) ($request->route('title') ?? $definition['title']);
        $sourceDescription = (string) $definition['description'];
        $title = (string) data_get($projection, 'seo.title', __($sourceTitle));
        $description = (string) data_get($projection, 'seo.description', __($sourceDescription));
        $data = is_array($projection)
            ? $this->hydrateProjectionData->handle(Arr::except($projection, ['seo']), $request)
            : [];

        if ($projectionMode === true && $projection === null) {
            return [
                'view' => 'v2.pages.public-data-unavailable',
                'data' => [
                    'title' => $title,
                    'seo' => $this->seo->make(
                        $title,
                        $description,
                        availableLocales: [$this->requestLocale($request)],
                        robots: 'noindex, nofollow',
                        translationKeys: [
                            'title' => $sourceTitle,
                            'description' => $sourceDescription,
                        ],
                    ),
                ],
                'status' => 503,
                'retry_after' => 300,
            ];
        }

        return [
            'view' => (string) $definition['view'],
            'data' => [
                ...$this->defaults($page),
                ...$data,
                'seo' => $this->seo->make(
                    $title,
                    $description,
                    availableLocales: $this->projectionAvailableLocales($projection, $request, $projectionMode),
                    robots: $this->projectionRobots($request, $projectionMode, $page),
                    translationKeys: [
                        'title' => $sourceTitle,
                        'description' => $sourceDescription,
                    ],
                ),
            ],
            'status' => 200,
            'retry_after' => null,
        ];
    }

    /** @return array<string, scalar|null> */
    private function projectionParameters(Request $request): array
    {
        $query = $request->only([
            'page',
            'per_page',
            'category',
            'country',
            'league',
            'position',
            'q',
            'sort',
            'direction',
            'status',
        ]);
        $query['page'] = max(1, min((int) ($query['page'] ?? 1), 10000));
        $query['per_page'] = max(1, min((int) ($query['per_page'] ?? 20), 100));
        $query['locale'] = (string) $request->route('locale');

        $parameters = collect($request->route()?->parametersWithoutNulls() ?? [])
            ->except(['locale', 'page', 'title'])
            ->merge($query)
            ->map(function (mixed $value): int|string|null {
                if (is_string($value)) {
                    return Str::limit($value, 160, '');
                }

                return is_scalar($value) || $value === null ? $value : null;
            })
            ->all();

        return $this->canonicalParameters->normalize($parameters);
    }

    /** @param  array<string, scalar|null>  $parameters
     * @return array<string, mixed>|null
     */
    private function projection(string $page, array $parameters): ?array
    {
        if ($page === 'club') {
            return $this->clubProjection($parameters);
        }

        if ($page === 'match-details') {
            return $this->matchDetailsProjection($parameters);
        }

        if (in_array($page, ['match-stats', 'match-lineups', 'match-ratings', 'match-timeline'], true)) {
            return $this->canonicalMatchProjection($page, $parameters);
        }

        if (in_array($page, ['league-season', 'competition-season', 'standings'], true)) {
            return $this->competitionSeasonProjection($page, $parameters);
        }

        if ($page === 'season') {
            return $this->seasonProjection($parameters);
        }

        if ($page === 'country') {
            return $this->countryProjection($parameters);
        }

        if ($page === 'city') {
            return $this->cityProjection($parameters);
        }

        if ($page === 'player-stats') {
            return $this->playerStatsProjection($parameters);
        }

        if ($page !== 'player-details') {
            return $this->projections->page($page, $parameters);
        }

        $uuid = $parameters['uuid'] ?? null;

        if (! is_string($uuid) || ! Str::isUuid($uuid)) {
            return null;
        }

        $document = $this->projections->page($page, Arr::only($parameters, [
            'locale',
            'page',
            'per_page',
        ]));
        $player = data_get($document, "players.{$uuid}");

        if (! is_array($player)) {
            return null;
        }

        return [
            'player' => $player,
            'seo' => data_get($document, 'seo', []),
        ];
    }

    /** @param  array<string, scalar|null>  $parameters
     * @return array<string, mixed>|null
     */
    private function clubProjection(array $parameters): ?array
    {
        $country = $parameters['country'] ?? null;
        $club = $parameters['club'] ?? null;

        if (! is_string($country) || ! is_string($club)) {
            return null;
        }

        $document = $this->projections->page('club', Arr::only($parameters, [
            'locale',
            'page',
            'per_page',
        ]));
        $projection = data_get($document, "clubs.{$country}/{$club}");

        if (! is_array($projection)) {
            return null;
        }

        return [
            'club' => $projection,
            'seo' => data_get($document, 'seo', []),
        ];
    }

    /** @param  array<string, scalar|null>  $parameters
     * @return array<string, mixed>|null
     */
    private function matchDetailsProjection(array $parameters): ?array
    {
        $competition = $parameters['competition'] ?? null;
        $year = $parameters['year'] ?? null;
        $slug = $parameters['slug'] ?? null;

        $document = $this->projections->page('match-details', Arr::only($parameters, [
            'locale',
            'page',
            'per_page',
        ]));

        $matches = data_get($document, 'matches', []);
        $matchKey = null;

        if (is_string($competition) && is_string($year) && is_string($slug)) {
            $candidate = "{$competition}/{$year}/{$slug}";
            if (is_array($matches) && array_key_exists($candidate, $matches)) {
                $matchKey = $candidate;
            }
        }

        if (! is_string($matchKey) && is_string($slug)) {
            $matchKey = $this->matchCanonicalPathForSlug($slug, is_array($matches) ? $matches : []);
        }

        if (! is_string($matchKey)) {
            return null;
        }

        $projection = data_get($document, "matches.{$matchKey}");

        if (! is_array($projection)) {
            return null;
        }

        return [
            'match' => $projection,
            'seo' => data_get($document, 'seo', []),
        ];
    }

    /** @param  array<string, scalar|null>  $parameters
     * @return array<string, mixed>|null
     */
    private function canonicalMatchProjection(string $page, array $parameters): ?array
    {
        $competition = $parameters['competition'] ?? null;
        $year = $parameters['year'] ?? null;
        $slug = $parameters['slug'] ?? null;

        if (! is_string($slug)) {
            return null;
        }

        $document = $this->projections->page($page, Arr::only($parameters, [
            'locale',
            'page',
            'per_page',
        ]));
        $matchEntries = data_get($document, 'matches', []);

        if (! is_array($matchEntries)) {
            return null;
        }

        $matchKey = null;

        if (is_string($competition) && is_string($year)) {
            $matchKey = "{$competition}/{$year}/{$slug}";
        }

        if (! is_string($matchKey) || ! array_key_exists($matchKey, $matchEntries)) {
            $matchKey = $this->matchCanonicalPathForSlug($slug, $matchEntries);

            if ($matchKey !== null && ! array_key_exists($matchKey, $matchEntries)) {
                $matchKey = null;
            }
        }

        if ($matchKey === null) {
            return null;
        }

        $projection = data_get($document, "matches.{$matchKey}");

        if (! is_array($projection)) {
            return null;
        }

        return [
            ...$projection,
            'seo' => data_get($document, 'seo', []),
        ];
    }

    /**
     * @param  array<string, mixed>  $matches
     */
    private function matchCanonicalPathForSlug(string $slug, array $matches): ?string
    {
        foreach (array_keys($matches) as $matchKey) {
            if (! is_string($matchKey)) {
                continue;
            }

            if ($matchKey === $slug || str_ends_with($matchKey, "/{$slug}")) {
                return $matchKey;
            }
        }

        return null;
    }

    /** @param  array<string, scalar|null>  $parameters
     * @return array<string, mixed>|null
     */
    private function competitionSeasonProjection(string $page, array $parameters): ?array
    {
        $slug = $parameters['slug'] ?? $parameters['league'] ?? null;

        if (! is_string($slug)) {
            return null;
        }

        $document = $this->projections->page($page, Arr::only($parameters, [
            'locale',
            'page',
            'per_page',
        ]));
        $path = $page === 'competition-season'
            ? "competitions.{$slug}"
            : "leagues.{$slug}";
        $projection = data_get($document, $path);

        if (! is_array($projection)) {
            return null;
        }

        return [
            ...$projection,
            'seo' => data_get($document, 'seo', []),
        ];
    }

    /** @param  array<string, scalar|null>  $parameters
     * @return array<string, mixed>|null
     */
    private function seasonProjection(array $parameters): ?array
    {
        $year = $parameters['year'] ?? null;

        if (! is_string($year) || ! ctype_digit($year)) {
            return null;
        }

        $document = $this->projections->page('season', Arr::only($parameters, [
            'locale',
            'page',
            'per_page',
        ]));
        $projection = data_get($document, "seasons.{$year}");

        if (! is_array($projection)) {
            return null;
        }

        return [
            ...$projection,
            'seo' => data_get($document, 'seo', []),
        ];
    }

    /** @param  array<string, scalar|null>  $parameters
     * @return array<string, mixed>|null
     */
    private function countryProjection(array $parameters): ?array
    {
        $slug = $parameters['slug'] ?? null;

        if (! is_string($slug)) {
            return null;
        }

        $document = $this->projections->page('country', Arr::only($parameters, [
            'locale',
            'page',
            'per_page',
        ]));
        $projection = data_get($document, "countries.{$slug}");

        if (! is_array($projection)) {
            return null;
        }

        return [
            ...$projection,
            'seo' => data_get($document, 'seo', []),
        ];
    }

    /** @param  array<string, scalar|null>  $parameters
     * @return array<string, mixed>|null
     */
    private function cityProjection(array $parameters): ?array
    {
        $slug = $parameters['slug'] ?? null;

        if (! is_string($slug)) {
            return null;
        }

        $document = $this->projections->page('city', Arr::only($parameters, [
            'locale',
            'page',
            'per_page',
        ]));
        $projection = data_get($document, "cities.{$slug}");

        if (! is_array($projection)) {
            return null;
        }

        return [
            ...$projection,
            'seo' => data_get($document, 'seo', []),
        ];
    }

    /** @param  array<string, scalar|null>  $parameters
     * @return array<string, mixed>|null
     */
    private function playerStatsProjection(array $parameters): ?array
    {
        $uuid = $parameters['slug'] ?? null;

        if (! is_string($uuid) || ! Str::isUuid($uuid)) {
            return null;
        }

        $document = $this->projections->page('player-stats', Arr::only($parameters, [
            'locale',
            'page',
            'per_page',
        ]));
        $projection = data_get($document, "players.{$uuid}");

        if (! is_array($projection)) {
            return null;
        }

        return [
            ...$projection,
            'seo' => data_get($document, 'seo', []),
        ];
    }

    /** @param  array<string, mixed>|null  $projection */
    private function projectionAvailableLocales(?array $projection, Request $request, bool|string $projectionMode): ?array
    {
        if ($projectionMode !== true) {
            return null;
        }

        $availableLocales = data_get($projection, 'seo.available_locales');

        if (! is_array($availableLocales)) {
            return [$this->requestLocale($request)];
        }

        return array_values(array_filter($availableLocales, 'is_string'));
    }

    private function projectionRobots(Request $request, bool|string $projectionMode, string $page): string
    {
        if ($projectionMode !== true) {
            return 'index,follow';
        }

        if ($page === 'club') {
            return 'index,follow';
        }

        $indexableParameters = [
            'category',
            'country',
            'direction',
            'league',
            'position',
            'q',
            'sort',
            'status',
        ];

        foreach ($indexableParameters as $parameter) {
            $value = $request->query($parameter);

            if ($value !== null && $value !== '') {
                return 'noindex, follow';
            }
        }

        $parameters = $this->projectionParameters($request);

        return ($parameters['page'] ?? 1) === 1 && ($parameters['per_page'] ?? 20) === 20
            ? 'index,follow'
            : 'noindex, follow';
    }

    private function requestLocale(Request $request): string
    {
        return (string) $request->route('locale');
    }

    /** @return array<string, mixed> */
    private function defaults(string $page): array
    {
        if ($page === 'homepage') {
            return [
                'results' => [],
                'matches' => [],
                'countries' => [],
                'leagues' => [],
                'table' => [],
                'news' => [],
            ];
        }

        if ($page === 'token') {
            return ['smartContract' => null];
        }

        if (in_array($page, ['community', 'discord', 'twitter', 'referral', 'ambassadors', 'partners', 'investors'], true)) {
            $title = (string) config("public_pages.{$page}.title");

            return [
                'page' => [
                    'slug' => $page,
                    'title' => $title,
                    'kicker' => __('Community'),
                    'description' => (string) config("public_pages.{$page}.description"),
                    'highlights' => [
                        ['label' => __('Access'), 'value' => __('Public')],
                        ['label' => __('Source'), 'value' => __('Official')],
                        ['label' => __('Audience'), 'value' => __('Global')],
                    ],
                    'cards' => [
                        ['title' => __('Official information'), 'description' => __('Verify announcements and links on the Squadex public website.')],
                        ['title' => __('Community safety'), 'description' => __('Never trust unsolicited messages, wallet requests, or unofficial token links.')],
                        ['title' => __('Get in touch'), 'description' => __('Use the public contact page for partnership and community enquiries.')],
                    ],
                ],
                'communityLinks' => collect(['community', 'discord', 'twitter', 'referral', 'ambassadors', 'partners', 'investors'])
                    ->reject(fn (string $slug): bool => $slug === $page)
                    ->map(fn (string $slug): array => [
                        'title' => (string) config("public_pages.{$slug}.title"),
                        'route' => "pages.{$slug}",
                        'description' => (string) config("public_pages.{$slug}.description"),
                    ])
                    ->values()
                    ->all(),
            ];
        }

        return [];
    }
}
