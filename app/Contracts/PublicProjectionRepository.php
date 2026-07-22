<?php

namespace App\Contracts;

interface PublicProjectionRepository
{
    /**
     * @param  array<string, scalar|null>  $parameters
     * @return array<string, mixed>|null
     */
    public function page(string $page, array $parameters = []): ?array;

    /**
     * @return iterable<int, array{url: string, last_modified?: string, change_frequency?: string, priority?: string}>
     */
    public function sitemap(string $section): iterable;
}
