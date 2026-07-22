<?php

namespace App\Infrastructure\Projections;

use App\Contracts\PublicProjectionRepository;
use App\PublicSite\CanonicalProjectionParameters;
use App\PublicSite\SanitizeProjectionData;
use Carbon\CarbonImmutable;
use Illuminate\Contracts\Cache\Repository as CacheRepository;
use Illuminate\Contracts\Filesystem\FileNotFoundException;
use Illuminate\Filesystem\Filesystem;
use Psr\Log\LoggerInterface;
use RuntimeException;
use Throwable;

class VersionedFilePublicProjectionRepository implements PublicProjectionRepository
{
    private const CACHE_SCHEMA = 'v3';

    /**
     * @var array{contract_version: string, version: string, manifest_sha256: string, generated_at: string, files: array<string, array{path: string, bytes: int, sha256: string}>}|null
     */
    private ?array $requestManifest = null;

    public function __construct(
        private readonly Filesystem $files,
        private readonly CacheRepository $cache,
        private readonly LoggerInterface $logger,
        private readonly CanonicalProjectionParameters $canonicalParameters,
        private readonly SanitizeProjectionData $sanitizer,
    ) {}

    public function page(string $page, array $parameters = []): ?array
    {
        $page = $this->safeSegment($page);
        $parameters = $this->canonicalParameters->normalize($parameters);
        $parameterHash = $this->canonicalParameters->hash($parameters);
        $staleKey = self::CACHE_SCHEMA.".public-projection.page.{$page}.{$parameterHash}.last-good";

        try {
            $manifest = $this->manifest();
            $cacheKey = self::CACHE_SCHEMA.".public-projection.page.{$page}.{$parameterHash}";
            $cached = $this->cache->get($cacheKey);

            if ($this->isCurrentEnvelope($cached, $manifest['version'])) {
                return $cached['available'] ? $cached['data'] : null;
            }

            $projection = $this->loadPage($manifest, $page, $parameters);
            $this->cache->put($cacheKey, [
                'version' => $manifest['version'],
                'available' => $projection !== null,
                'data' => $projection,
            ], (int) config('public_site.projection.cache_ttl'));

            if ($projection !== null) {
                $this->cache->put($staleKey, $projection, (int) config('public_site.projection.stale_ttl'));
            }

            return $projection;
        } catch (Throwable $exception) {
            $stale = $this->cache->get($staleKey);

            $this->logger->warning('public_projection_read_failed', [
                'page' => $page,
                'parameter_keys' => array_keys($parameters),
                'stale_available' => is_array($stale),
                'exception' => $exception::class,
                'message' => $exception->getMessage(),
            ]);

            if (is_array($stale)) {
                return [...$stale, '_projection' => [...($stale['_projection'] ?? []), 'stale' => true]];
            }

            return null;
        }
    }

    public function sitemap(string $section): iterable
    {
        $section = $this->safeSegment($section);
        $staleKey = self::CACHE_SCHEMA.".public-projection.sitemap.{$section}.last-good";

        try {
            $manifest = $this->manifest();
            $cacheKey = self::CACHE_SCHEMA.".public-projection.sitemap.{$section}";
            $cached = $this->cache->get($cacheKey);

            if ($this->isCurrentEnvelope($cached, $manifest['version'])) {
                return is_array($cached['data']) ? $cached['data'] : [];
            }

            $items = $this->loadSitemap($manifest, $section);
            $this->cache->put($cacheKey, [
                'version' => $manifest['version'],
                'available' => true,
                'data' => $items,
            ], (int) config('public_site.projection.cache_ttl'));

            $this->cache->put($staleKey, $items, (int) config('public_site.projection.stale_ttl'));

            return $items;
        } catch (Throwable $exception) {
            $stale = $this->cache->get($staleKey, []);

            $this->logger->warning('public_projection_sitemap_read_failed', [
                'section' => $section,
                'stale_available' => is_array($stale) && $stale !== [],
                'exception' => $exception::class,
                'message' => $exception->getMessage(),
            ]);

            return is_array($stale) ? $stale : [];
        }
    }

    /**
     * @param  array{contract_version: string, version: string, generated_at: string, files: array<string, array{path: string, bytes: int, sha256: string}>}  $manifest
     * @param  array<string, scalar|null>  $parameters
     * @return array<string, mixed>|null
     */
    private function loadPage(array $manifest, string $page, array $parameters): ?array
    {
        $relativePath = "pages/{$page}.json";
        $payload = $this->decodeDeclaredFile($manifest, $relativePath);
        $this->assertPayloadIdentity($payload, $manifest);

        if (($payload['available'] ?? null) === false) {
            if (! is_string($payload['reason'] ?? null) || trim($payload['reason']) === '' || ($payload['data'] ?? null) !== null) {
                throw new RuntimeException("Unavailable projection [{$relativePath}] has an invalid payload.");
            }

            return null;
        }

        if (($payload['available'] ?? null) !== true) {
            throw new RuntimeException("Projection [{$relativePath}] must declare availability.");
        }

        $defaultParameters = $this->normalizePayloadParameters($payload['default_parameters'] ?? null, $relativePath);
        $variants = $payload['variants'] ?? null;
        $variantParametersByHash = $payload['variant_parameters'] ?? null;

        if (! is_array($variants)
            || ! is_array($variantParametersByHash)
            || count($variants) > (int) config('public_site.projection.max_variants')) {
            throw new RuntimeException("Projection [{$relativePath}] has invalid variants metadata.");
        }

        $data = null;

        if ($defaultParameters === $parameters) {
            $data = $payload['data'] ?? null;
        } else {
            $variantKey = $this->canonicalParameters->hash($parameters);

            if (! array_key_exists($variantKey, $variants) || ! array_key_exists($variantKey, $variantParametersByHash)) {
                return null;
            }

            $variantParameters = $this->normalizePayloadParameters($variantParametersByHash[$variantKey], $relativePath);

            if ($variantParameters !== $parameters || ! hash_equals($this->canonicalParameters->hash($variantParameters), $variantKey)) {
                throw new RuntimeException("Projection [{$relativePath}] has a non-canonical variant.");
            }

            $data = $variants[$variantKey];
        }

        if (! is_array($data) || ($data !== [] && array_is_list($data))) {
            return null;
        }

        $sanitized = $this->sanitizer->handle($data);

        return [
            ...$sanitized,
            '_projection' => [
                'contract_version' => $manifest['contract_version'],
                'version' => $manifest['version'],
                'generated_at' => $payload['generated_at'],
                'stale' => false,
            ],
        ];
    }

    /**
     * @param  array{contract_version: string, version: string, generated_at: string, files: array<string, array{path: string, bytes: int, sha256: string}>}  $manifest
     * @return list<array{url: string, last_modified?: string, change_frequency?: string, priority?: string}>
     */
    private function loadSitemap(array $manifest, string $section): array
    {
        $relativePath = "sitemaps/{$section}.json";
        $payload = $this->decodeDeclaredFile($manifest, $relativePath);
        $this->assertPayloadIdentity($payload, $manifest);
        $items = [];

        foreach ((array) ($payload['items'] ?? []) as $item) {
            if (! is_array($item) || ! is_string($item['url'] ?? null)) {
                continue;
            }

            $url = $this->sanitizer->url($item['url']);

            if ($url === null || filter_var($url, FILTER_VALIDATE_URL) === false) {
                continue;
            }

            $items[] = [
                'url' => $url,
                ...array_filter([
                    'last_modified' => is_string($item['last_modified'] ?? null) ? $item['last_modified'] : null,
                    'change_frequency' => is_string($item['change_frequency'] ?? null) ? $item['change_frequency'] : null,
                    'priority' => is_string($item['priority'] ?? null) ? $item['priority'] : null,
                ]),
            ];
        }

        return $items;
    }

    /**
     * @return array{contract_version: string, version: string, generated_at: string, files: array<string, array{path: string, bytes: int, sha256: string}>}
     */
    private function manifest(): array
    {
        if ($this->requestManifest !== null) {
            $this->assertManifestFresh($this->requestManifest['generated_at']);

            return $this->requestManifest;
        }

        $pointer = $this->decodeFile($this->basePath().'/current.json', $this->basePath());
        $contractVersion = (string) ($pointer['contract_version'] ?? '');
        $version = $this->safeSegment((string) ($pointer['version'] ?? ''));
        $manifestSha256 = (string) ($pointer['manifest_sha256'] ?? '');

        $this->assertSupportedContract($contractVersion);

        if (preg_match('/^[a-f0-9]{64}$/', $manifestSha256) !== 1) {
            throw new RuntimeException('The public projection pointer has an invalid manifest checksum.');
        }

        $cached = $this->cache->get(self::CACHE_SCHEMA.'.public-projection.manifest');

        if (is_array($cached)
            && ($cached['contract_version'] ?? null) === $contractVersion
            && ($cached['version'] ?? null) === $version
            && ($cached['manifest_sha256'] ?? null) === $manifestSha256
            && is_string($cached['generated_at'] ?? null)
            && is_array($cached['files'] ?? null)) {
            $this->assertManifestFresh($cached['generated_at']);

            return $this->requestManifest = $cached;
        }

        $versionPath = $this->basePath().'/versions/'.$version;
        $manifestPath = $versionPath.'/manifest.json';
        $manifestContents = $this->readFile($manifestPath, $versionPath);

        if (! hash_equals($manifestSha256, hash('sha256', $manifestContents))) {
            throw new RuntimeException('The public projection manifest checksum does not match the active pointer.');
        }

        $manifest = $this->decodeJson($manifestContents, $manifestPath);

        if (($manifest['contract_version'] ?? null) !== $contractVersion || ($manifest['version'] ?? null) !== $version) {
            throw new RuntimeException('The public projection manifest does not match the active pointer.');
        }

        if (! is_string($manifest['publisher'] ?? null)
            || trim($manifest['publisher']) === ''
            || ! is_array($manifest['source'] ?? null)
            || ! is_string(data_get($manifest, 'source.kind'))
            || blank(data_get($manifest, 'source.kind'))
            || ! is_string(data_get($manifest, 'source.watermark'))
            || blank(data_get($manifest, 'source.watermark'))) {
            throw new RuntimeException('The public projection manifest is missing publisher source metadata.');
        }

        $generatedAt = $this->requiredTimestamp($manifest['generated_at'] ?? null, 'manifest generated_at');
        $this->assertManifestFresh($generatedAt);

        $files = [];

        foreach ((array) ($manifest['files'] ?? []) as $record) {
            if (! is_array($record)) {
                throw new RuntimeException('The public projection manifest contains an invalid file record.');
            }

            $path = (string) ($record['path'] ?? '');

            if (! $this->isSafeRelativePath($path) || isset($files[$path])) {
                throw new RuntimeException("The public projection manifest contains an invalid or duplicate path [{$path}].");
            }

            $bytes = filter_var($record['bytes'] ?? null, FILTER_VALIDATE_INT);
            $sha256 = (string) ($record['sha256'] ?? '');

            if ($bytes === false || $bytes < 0 || $bytes > (int) config('public_site.projection.max_bytes') || preg_match('/^[a-f0-9]{64}$/', $sha256) !== 1) {
                throw new RuntimeException("The public projection manifest contains invalid integrity data for [{$path}].");
            }

            $files[$path] = ['path' => $path, 'bytes' => $bytes, 'sha256' => $sha256];
        }

        if ($files === [] || count($files) > (int) config('public_site.projection.max_files')) {
            throw new RuntimeException('The public projection manifest has an invalid file count.');
        }

        $validatedManifest = [
            'contract_version' => $contractVersion,
            'version' => $version,
            'manifest_sha256' => $manifestSha256,
            'generated_at' => $generatedAt,
            'files' => $files,
        ];

        $this->cache->put(
            self::CACHE_SCHEMA.'.public-projection.manifest',
            $validatedManifest,
            (int) config('public_site.projection.stale_ttl'),
        );

        return $this->requestManifest = $validatedManifest;
    }

    private function assertManifestFresh(string $generatedAt): void
    {
        $maximumAge = max(1, (int) config('public_site.projection.max_snapshot_age'));

        if (CarbonImmutable::parse($generatedAt)->isBefore(now()->subSeconds($maximumAge))) {
            throw new RuntimeException('The active public projection snapshot is too old.');
        }
    }

    private function isCurrentEnvelope(mixed $cached, string $version): bool
    {
        return is_array($cached)
            && ($cached['version'] ?? null) === $version
            && is_bool($cached['available'] ?? null)
            && array_key_exists('data', $cached)
            && ($cached['data'] === null || is_array($cached['data']));
    }

    /**
     * @param  array{contract_version: string, version: string, generated_at: string, files: array<string, array{path: string, bytes: int, sha256: string}>}  $manifest
     * @return array<string, mixed>
     */
    private function decodeDeclaredFile(array $manifest, string $relativePath): array
    {
        $record = $manifest['files'][$relativePath] ?? null;

        if (! is_array($record)) {
            throw new FileNotFoundException("Public projection [{$relativePath}] is not declared by the manifest.");
        }

        $versionPath = $this->basePath().'/versions/'.$manifest['version'];
        $path = $versionPath.'/'.$relativePath;
        $contents = $this->readFile($path, $versionPath);

        if (strlen($contents) !== $record['bytes'] || ! hash_equals($record['sha256'], hash('sha256', $contents))) {
            throw new RuntimeException("Public projection [{$relativePath}] failed its integrity check.");
        }

        return $this->decodeJson($contents, $path);
    }

    /**
     * @param  array<string, mixed>  $payload
     * @param  array{contract_version: string, version: string, generated_at: string, files: array<string, array{path: string, bytes: int, sha256: string}>}  $manifest
     */
    private function assertPayloadIdentity(array $payload, array $manifest): void
    {
        if (($payload['contract_version'] ?? null) !== $manifest['contract_version']) {
            throw new RuntimeException('A public projection payload uses an unsupported contract.');
        }

        $this->requiredTimestamp($payload['generated_at'] ?? null, 'payload generated_at');
    }

    /** @return array<string, scalar|null> */
    private function normalizePayloadParameters(mixed $parameters, string $relativePath): array
    {
        if (! is_array($parameters)) {
            throw new RuntimeException("Projection [{$relativePath}] has invalid parameter metadata.");
        }

        return $this->canonicalParameters->normalize($parameters);
    }

    private function assertSupportedContract(string $contractVersion): void
    {
        if ($contractVersion !== config('public_site.projection.contract_version')) {
            throw new RuntimeException("Unsupported public projection contract [{$contractVersion}].");
        }
    }

    private function requiredTimestamp(mixed $value, string $field): string
    {
        if (! is_string($value)) {
            throw new RuntimeException("The public projection {$field} is required.");
        }

        try {
            return CarbonImmutable::parse($value)->toRfc3339String();
        } catch (Throwable) {
            throw new RuntimeException("The public projection {$field} is invalid.");
        }
    }

    /** @return array<string, mixed> */
    private function decodeFile(string $path, string $allowedRoot): array
    {
        return $this->decodeJson($this->readFile($path, $allowedRoot), $path);
    }

    private function readFile(string $path, string $allowedRoot): string
    {
        if (! $this->files->exists($path)) {
            throw new FileNotFoundException("Public projection [{$path}] was not found.");
        }

        $realRoot = realpath($allowedRoot);
        $realPath = realpath($path);

        if ($realRoot === false || $realPath === false || is_link($path) || ! str_starts_with($realPath, rtrim($realRoot, DIRECTORY_SEPARATOR).DIRECTORY_SEPARATOR)) {
            throw new RuntimeException("Public projection [{$path}] escapes its allowed directory.");
        }

        $size = $this->files->size($realPath);

        if ($size > (int) config('public_site.projection.max_bytes')) {
            throw new RuntimeException("Public projection [{$path}] exceeds the configured size limit.");
        }

        return $this->files->get($realPath);
    }

    /** @return array<string, mixed> */
    private function decodeJson(string $contents, string $path): array
    {
        $decoded = json_decode($contents, true, flags: JSON_THROW_ON_ERROR);

        if (! is_array($decoded) || array_is_list($decoded)) {
            throw new RuntimeException("Public projection [{$path}] must contain a JSON object.");
        }

        return $decoded;
    }

    private function isSafeRelativePath(string $path): bool
    {
        return preg_match('#^(?:pages|sitemaps)/[A-Za-z0-9_-]+\.json$#', $path) === 1;
    }

    private function basePath(): string
    {
        return rtrim((string) config('public_site.projection.path'), '/');
    }

    private function safeSegment(string $value): string
    {
        if ($value === '' || preg_match('/^[A-Za-z0-9_-]+$/', $value) !== 1) {
            throw new RuntimeException('Invalid public projection path segment.');
        }

        return $value;
    }
}
