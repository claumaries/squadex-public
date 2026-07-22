<?php

namespace App\PublicSite;

use App\Contracts\PublicProjectionRepository;

class SitemapBuilder
{
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
            yield from $this->projections->sitemap($section);

            return;
        }

        $routeNames = [
            'pages.homepage',
            'pages.about',
            'pages.contact',
            'pages.game',
            'pages.matches',
            'pages.teams',
            'pages.players',
            'pages.news',
            'pages.marketplace.players',
            'pages.tournaments',
            'pages.leaderboards',
            'pages.community',
            'pages.token',
            'pages.tokenomics',
            'pages.token-roadmap',
            'pages.token-transparency',
            'pages.presale',
            'pages.how-to-buy',
            'pages.contract',
            'pages.liquidity',
            'pages.vesting',
            'pages.whitepaper',
            'pages.privacy',
            'pages.cookie',
            'pages.terms',
            'pages.kyc',
            'pages.disclaimer',
            'pages.faq',
        ];

        foreach ($this->locales->routeLocales() as $locale) {
            foreach ($routeNames as $routeName) {
                yield [
                    'url' => route($routeName, ['locale' => $locale]),
                    'change_frequency' => str_starts_with($routeName, 'pages.token') ? 'weekly' : 'daily',
                    'priority' => $routeName === 'pages.homepage' ? '1.0' : '0.7',
                ];
            }
        }
    }
}
