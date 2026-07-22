<?php

namespace Tests\Support;

use Illuminate\Support\Facades\File;

final class PublicProjectionFixture
{
    /** @param  array<string, array<string, mixed>>  $payloads */
    public static function publish(string $basePath, array $payloads, string $version = 'release-1'): void
    {
        $versionPath = "{$basePath}/versions/{$version}";
        File::ensureDirectoryExists($versionPath);
        $records = [];

        foreach ($payloads as $relativePath => $payload) {
            $contents = json_encode($payload, JSON_THROW_ON_ERROR | JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE);
            File::ensureDirectoryExists(dirname("{$versionPath}/{$relativePath}"));
            File::put("{$versionPath}/{$relativePath}", $contents);
            $records[] = [
                'path' => $relativePath,
                'bytes' => strlen($contents),
                'sha256' => hash('sha256', $contents),
            ];
        }

        $manifest = json_encode([
            'contract_version' => 'v1',
            'version' => $version,
            'generated_at' => now()->toRfc3339String(),
            'publisher' => 'pest-fixture',
            'source' => ['kind' => 'test', 'watermark' => 'test-1'],
            'files' => $records,
        ], JSON_THROW_ON_ERROR | JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE);

        File::put("{$versionPath}/manifest.json", $manifest);
        File::put("{$basePath}/current.json", json_encode([
            'contract_version' => 'v1',
            'version' => $version,
            'manifest_sha256' => hash('sha256', $manifest),
        ], JSON_THROW_ON_ERROR | JSON_UNESCAPED_SLASHES));
    }

    /**
     * @param  array<string, mixed>  $data
     * @param  array<string, scalar|null>  $parameters
     * @return array<string, mixed>
     */
    public static function page(array $data, array $parameters = []): array
    {
        ksort($parameters, SORT_STRING);

        return [
            'contract_version' => 'v1',
            'generated_at' => now()->toRfc3339String(),
            'available' => true,
            'reason' => null,
            'data' => $data,
            'default_parameters' => $parameters,
            'variant_parameters' => [],
            'variants' => [],
        ];
    }

    /** @return array<string, mixed> */
    public static function unavailablePage(string $reason = 'not_published'): array
    {
        return [
            'contract_version' => 'v1',
            'generated_at' => now()->toRfc3339String(),
            'available' => false,
            'reason' => $reason,
            'data' => null,
            'default_parameters' => [],
            'variant_parameters' => [],
            'variants' => [],
        ];
    }

    /** @param  list<array<string, string>>  $items
     * @return array<string, mixed>
     */
    public static function sitemap(array $items = []): array
    {
        return [
            'contract_version' => 'v1',
            'generated_at' => now()->toRfc3339String(),
            'items' => $items,
        ];
    }
}
