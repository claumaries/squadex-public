<?php

namespace App\PublicSite;

use Illuminate\Http\Request;
use Illuminate\Pagination\LengthAwarePaginator;

class HydrateProjectionData
{
    /** @param  array<string, mixed>  $data
     * @return array<string, mixed>
     */
    public function handle(array $data, Request $request): array
    {
        return $this->hydrate($data, $request);
    }

    private function hydrate(mixed $value, Request $request): mixed
    {
        if (! is_array($value)) {
            return $value;
        }

        if ($this->isLengthAwarePaginator($value)) {
            return new LengthAwarePaginator(
                items: $this->hydrate($value['data'], $request),
                total: max(0, (int) $value['total']),
                perPage: max(1, (int) $value['per_page']),
                currentPage: max(1, (int) $value['current_page']),
                options: [
                    'path' => $request->url(),
                    'query' => $request->query(),
                    'pageName' => 'page',
                ],
            );
        }

        $hydrated = [];

        foreach ($value as $key => $item) {
            $hydrated[$key] = $this->hydrate($item, $request);
        }

        return $hydrated;
    }

    /** @param  array<mixed>  $value */
    private function isLengthAwarePaginator(array $value): bool
    {
        return is_array($value['data'] ?? null)
            && is_numeric($value['current_page'] ?? null)
            && is_numeric($value['per_page'] ?? null)
            && is_numeric($value['total'] ?? null);
    }
}
