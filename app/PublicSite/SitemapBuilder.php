<?php

namespace App\PublicSite;

use App\Contracts\PublicProjectionRepository;

class SitemapBuilder
{
    /** @var array<string, string> */
    private const DYNAMIC_SECTION_PROJECTIONS = [
        'blogs' => 'blog-details',
        'cities' => 'city',
        'clubs' => 'club',
        'competition-seasons' => 'competition-season',
        'countries' => 'country',
        'league-seasons' => 'league-season',
        'matches' => 'match-details',
        'news' => 'news-details',
        'players' => 'player-details',
        'seasons' => 'season',
        'standings' => 'standings',
        'team-forms' => 'team-form',
    ];

    public function __construct(
        private readonly LocaleRegistry $locales,
        private readonly PublicProjectionRepository $projections,
    ) {}

    /**
     * @return list<array{url: string}>
     */
    public function index(): array
    {
        return collect(config('public_site.sitemap_sections'))
            ->map(fn (string $section): array => ['url' => route('sitemap.section', ['section' => $section])])
            ->all();
    }

    /**
     * @return iterable<int, array{url: string, last_modified?: string, change_frequency?: string, priority?: string}>
     */
    public function section(string $section): iterable
    {
        if ($section !== 'static') {
            $projection = self::DYNAMIC_SECTION_PROJECTIONS[$section] ?? null;

            if ($projection !== null && ! $this->projectedPageIsAvailable($projection, 'en')) {
                return;
            }

            yield from $this->projections->sitemap($section);

            return;
        }

        $routes = [
            ['name' => 'pages.homepage'],
            ['name' => 'pages.about'],
            ['name' => 'pages.contact'],
            ['name' => 'pages.game'],
            ['name' => 'pages.matches', 'projection' => 'matches'],
            ['name' => 'pages.teams', 'projection' => 'teams'],
            ['name' => 'pages.players', 'projection' => 'players'],
            ['name' => 'pages.marketplace.players', 'projection' => 'marketplace'],
            ['name' => 'pages.marketplace.clubs', 'projection' => 'marketplace-clubs'],
            ['name' => 'pages.marketplace.stadiums', 'projection' => 'marketplace-stadiums'],
            ['name' => 'pages.community'],
            ['name' => 'pages.token'],
            ['name' => 'pages.tokenomics'],
            ['name' => 'pages.token-roadmap'],
            ['name' => 'pages.token-transparency'],
            ['name' => 'pages.presale'],
            ['name' => 'pages.how-to-buy'],
            ['name' => 'pages.contract'],
            ['name' => 'pages.liquidity'],
            ['name' => 'pages.vesting'],
            ['name' => 'pages.whitepaper'],
            ['name' => 'pages.privacy'],
            ['name' => 'pages.cookie'],
            ['name' => 'pages.terms'],
            ['name' => 'pages.kyc'],
            ['name' => 'pages.disclaimer'],
            ['name' => 'pages.faq'],
        ];

        foreach ($this->locales->routeLocales() as $locale) {
            foreach ($routes as $route) {
                $projection = $route['projection'] ?? null;

                if (is_string($projection) && ! $this->projectedPageIsAvailable($projection, $locale)) {
                    continue;
                }

                $routeName = $route['name'];

                yield [
                    'url' => route($routeName, ['locale' => $locale]),
                    'change_frequency' => str_starts_with($routeName, 'pages.token') ? 'weekly' : 'daily',
                    'priority' => $routeName === 'pages.homepage' ? '1.0' : '0.7',
                ];
            }
        }
    }

    private function projectedPageIsAvailable(string $page, string $locale): bool
    {
        return $this->projections->page($page, [
            'locale' => $locale,
            'page' => 1,
            'per_page' => 20,
        ]) !== null;
    }
}
