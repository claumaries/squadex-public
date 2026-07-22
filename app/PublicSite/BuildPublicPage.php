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
     * @return array{view: string, data: array<string, mixed>}
     */
    public function handle(Request $request, string $page): array
    {
        $definition = config("public_pages.{$page}");

        if (! is_array($definition)) {
            throw new NotFoundHttpException;
        }

        $parameters = $this->projectionParameters($request);
        $projectionMode = $definition['projection'] ?? false;
        $projection = $projectionMode === false ? null : $this->projections->page($page, $parameters);
        $title = (string) data_get($projection, 'seo.title', __((string) ($request->route('title') ?? $definition['title'])));
        $description = (string) data_get($projection, 'seo.description', __((string) $definition['description']));
        $data = is_array($projection)
            ? $this->hydrateProjectionData->handle(Arr::except($projection, ['seo']), $request)
            : [];

        if ($projectionMode === true && $projection === null) {
            return [
                'view' => 'v2.pages.public-data-unavailable',
                'data' => [
                    'title' => $title,
                    'seo' => $this->seo->make($title, $description),
                ],
            ];
        }

        return [
            'view' => (string) $definition['view'],
            'data' => [
                ...$this->defaults($page),
                ...$data,
                'seo' => $this->seo->make($title, $description),
            ],
        ];
    }

    /** @return array<string, scalar|null> */
    private function projectionParameters(Request $request): array
    {
        $query = $request->only(['page', 'per_page', 'category', 'country', 'league', 'position', 'q', 'status']);
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
