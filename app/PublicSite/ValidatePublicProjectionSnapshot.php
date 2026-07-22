<?php

namespace App\PublicSite;

use Carbon\CarbonImmutable;
use Illuminate\Filesystem\Filesystem;
use RecursiveDirectoryIterator;
use RecursiveIteratorIterator;
use RuntimeException;
use SplFileInfo;
use Throwable;

class ValidatePublicProjectionSnapshot
{
    public function __construct(
        private readonly Filesystem $files,
        private readonly CanonicalProjectionParameters $canonicalParameters,
        private readonly SanitizeProjectionData $sanitizer,
    ) {}

    public function handle(?string $requestedVersion = null, bool $strict = false): ProjectionValidationResult
    {
        $errors = [];
        $validatedFiles = 0;
        $basePath = rtrim((string) config('public_site.projection.path'), '/');
        $version = $requestedVersion ?? '';

        try {
            $pointer = null;

            if ($requestedVersion === null) {
                $pointer = $this->decode($basePath.'/current.json', $basePath);
                $version = $this->safeSegment((string) ($pointer['version'] ?? ''));

                if (($pointer['contract_version'] ?? null) !== config('public_site.projection.contract_version')) {
                    $errors[] = 'current.json uses an unsupported contract_version.';
                }
            } else {
                $version = $this->safeSegment($requestedVersion);
            }

            $manifestPath = "{$basePath}/versions/{$version}/manifest.json";
            $versionPath = "{$basePath}/versions/{$version}";
            $manifestContents = $this->read($manifestPath, $versionPath);
            $manifest = $this->decodeContents($manifestContents, $manifestPath);

            if ($requestedVersion === null) {
                $pointerChecksum = (string) ($pointer['manifest_sha256'] ?? '');

                if (preg_match('/^[a-f0-9]{64}$/', $pointerChecksum) !== 1 || ! hash_equals($pointerChecksum, hash('sha256', $manifestContents))) {
                    $errors[] = 'current.json does not match the manifest checksum.';
                }
            }

            $this->validateManifestMetadata($manifest, $version, $errors);
            $records = $this->manifestRecords($manifest, $errors);

            foreach ($records as $relativePath => $record) {
                try {
                    $contents = $this->read("{$versionPath}/{$relativePath}", $versionPath);

                    if (strlen($contents) !== $record['bytes']) {
                        $errors[] = "{$relativePath} does not match its declared byte count.";
                    }

                    if (! hash_equals($record['sha256'], hash('sha256', $contents))) {
                        $errors[] = "{$relativePath} does not match its declared checksum.";
                    }

                    $payload = $this->decodeContents($contents, $relativePath);
                    $this->validatePayload($relativePath, $payload, $errors);
                    $validatedFiles++;
                } catch (Throwable $exception) {
                    $errors[] = "{$relativePath}: {$exception->getMessage()}";
                }
            }

            $this->validateRequiredFiles($records, $errors);

            if ($strict) {
                $this->validateNoUndeclaredFiles($versionPath, array_keys($records), $errors);
            }
        } catch (Throwable $exception) {
            $errors[] = $exception->getMessage();
        }

        return new ProjectionValidationResult($version, array_values(array_unique($errors)), $validatedFiles);
    }

    /** @param  array<string, mixed>  $manifest
     * @param  list<string>  $errors
     */
    private function validateManifestMetadata(array $manifest, string $version, array &$errors): void
    {
        if (($manifest['contract_version'] ?? null) !== config('public_site.projection.contract_version')) {
            $errors[] = 'manifest.json uses an unsupported contract_version.';
        }

        if (($manifest['version'] ?? null) !== $version) {
            $errors[] = 'manifest.json version does not match its directory.';
        }

        if (! is_string($manifest['publisher'] ?? null) || trim($manifest['publisher']) === '') {
            $errors[] = 'manifest.json publisher is required.';
        }

        if (! is_array($manifest['source'] ?? null)
            || ! is_string(data_get($manifest, 'source.kind'))
            || blank(data_get($manifest, 'source.kind'))
            || ! is_string(data_get($manifest, 'source.watermark'))
            || blank(data_get($manifest, 'source.watermark'))) {
            $errors[] = 'manifest.json source kind and watermark are required.';
        }

        if (! $this->isTimestamp($manifest['generated_at'] ?? null)) {
            $errors[] = 'manifest.json generated_at must be an RFC3339 timestamp.';
        } elseif (CarbonImmutable::parse($manifest['generated_at'])->isBefore(now()->subSeconds((int) config('public_site.projection.max_snapshot_age')))) {
            $errors[] = 'manifest.json is older than PUBLIC_PROJECTION_MAX_SNAPSHOT_AGE.';
        }
    }

    /**
     * @param  array<string, mixed>  $manifest
     * @param  list<string>  $errors
     * @return array<string, array{bytes: int, sha256: string}>
     */
    private function manifestRecords(array $manifest, array &$errors): array
    {
        $records = [];
        $files = $manifest['files'] ?? null;

        if (! is_array($files) || count($files) === 0 || count($files) > (int) config('public_site.projection.max_files')) {
            $errors[] = 'manifest.json has an invalid file count.';

            return [];
        }

        foreach ($files as $record) {
            $path = is_array($record) ? (string) ($record['path'] ?? '') : '';
            $bytes = is_array($record) ? filter_var($record['bytes'] ?? null, FILTER_VALIDATE_INT) : false;
            $sha256 = is_array($record) ? (string) ($record['sha256'] ?? '') : '';

            if (preg_match('#^(?:pages|sitemaps)/[A-Za-z0-9_-]+\.json$#', $path) !== 1
                || isset($records[$path])
                || $bytes === false
                || $bytes < 0
                || $bytes > (int) config('public_site.projection.max_bytes')
                || preg_match('/^[a-f0-9]{64}$/', $sha256) !== 1) {
                $errors[] = "manifest.json has an invalid file record [{$path}].";

                continue;
            }

            $records[$path] = ['bytes' => $bytes, 'sha256' => $sha256];
        }

        return $records;
    }

    /** @param  array<string, mixed>  $payload
     * @param  list<string>  $errors
     */
    private function validatePayload(string $relativePath, array $payload, array &$errors): void
    {
        if (($payload['contract_version'] ?? null) !== config('public_site.projection.contract_version')) {
            $errors[] = "{$relativePath} uses an unsupported contract_version.";
        }

        if (! $this->isTimestamp($payload['generated_at'] ?? null)) {
            $errors[] = "{$relativePath} generated_at must be an RFC3339 timestamp.";
        }

        if (str_starts_with($relativePath, 'sitemaps/')) {
            foreach ((array) ($payload['items'] ?? []) as $index => $item) {
                $url = is_array($item) && is_string($item['url'] ?? null) ? $this->sanitizer->url($item['url']) : null;

                if ($url === null || filter_var($url, FILTER_VALIDATE_URL) === false) {
                    $errors[] = "{$relativePath} item {$index} has an invalid public URL.";
                }
            }

            return;
        }

        $available = $payload['available'] ?? null;

        if ($available === false) {
            if (! is_string($payload['reason'] ?? null) || trim($payload['reason']) === '' || ($payload['data'] ?? null) !== null) {
                $errors[] = "{$relativePath} has an invalid unavailable-state payload.";
            }
        } elseif ($available !== true || ! $this->isObjectMap($payload['data'] ?? null)) {
            $errors[] = "{$relativePath} must contain available=true and object data, or an explicit unavailable state.";
        }

        try {
            $defaultParameters = $this->canonicalParameters->normalize($this->parameterMap($payload['default_parameters'] ?? null));
        } catch (Throwable) {
            $errors[] = "{$relativePath} default_parameters must be a shallow scalar map.";
            $defaultParameters = [];
        }

        $variants = $payload['variants'] ?? [];
        $variantParameters = $payload['variant_parameters'] ?? [];

        if (! is_array($variants) || ! is_array($variantParameters) || count($variants) > (int) config('public_site.projection.max_variants')) {
            $errors[] = "{$relativePath} has invalid variants metadata.";

            return;
        }

        foreach ($variants as $hash => $variant) {
            try {
                $parameters = $this->canonicalParameters->normalize($this->parameterMap($variantParameters[$hash] ?? null));
            } catch (Throwable) {
                $errors[] = "{$relativePath} variant {$hash} has invalid parameters.";

                continue;
            }

            if (! is_string($hash) || ! hash_equals($this->canonicalParameters->hash($parameters), $hash) || ! $this->isObjectMap($variant)) {
                $errors[] = "{$relativePath} variant {$hash} is not canonical.";
            }
        }

        if (array_diff_key($variantParameters, $variants) !== []) {
            $errors[] = "{$relativePath} declares parameters for a missing variant.";
        }

        unset($defaultParameters);
    }

    /** @param  array<string, array{bytes: int, sha256: string}>  $records
     * @param  list<string>  $errors
     */
    private function validateRequiredFiles(array $records, array &$errors): void
    {
        foreach (config('public_pages') as $page => $definition) {
            if (($definition['projection'] ?? false) === true && ! isset($records["pages/{$page}.json"])) {
                $errors[] = "Required projection pages/{$page}.json is not declared.";
            }
        }

        foreach (config('public_site.sitemap_sections') as $section) {
            if (! isset($records["sitemaps/{$section}.json"])) {
                $errors[] = "Required projection sitemaps/{$section}.json is not declared.";
            }
        }
    }

    /** @param  list<string>  $declaredPaths
     * @param  list<string>  $errors
     */
    private function validateNoUndeclaredFiles(string $versionPath, array $declaredPaths, array &$errors): void
    {
        $iterator = new RecursiveIteratorIterator(new RecursiveDirectoryIterator($versionPath));

        /** @var SplFileInfo $file */
        foreach ($iterator as $file) {
            if (! $file->isFile() || $file->getFilename() === 'manifest.json') {
                continue;
            }

            $relativePath = ltrim(str_replace($versionPath, '', $file->getPathname()), DIRECTORY_SEPARATOR);

            if (! in_array($relativePath, $declaredPaths, true)) {
                $errors[] = "Undeclared projection file [{$relativePath}] exists in the snapshot.";
            }
        }
    }

    /** @return array<string, scalar|null> */
    private function parameterMap(mixed $value): array
    {
        if (! is_array($value) || ($value !== [] && array_is_list($value))) {
            throw new RuntimeException('Invalid parameter map.');
        }

        return $value;
    }

    private function isObjectMap(mixed $value): bool
    {
        return is_array($value) && ($value === [] || ! array_is_list($value));
    }

    private function isTimestamp(mixed $value): bool
    {
        if (! is_string($value) || preg_match('/^\d{4}-\d{2}-\d{2}T\d{2}:\d{2}:\d{2}(?:\.\d+)?(?:Z|[+-]\d{2}:\d{2})$/', $value) !== 1) {
            return false;
        }

        try {
            CarbonImmutable::parse($value);

            return true;
        } catch (Throwable) {
            return false;
        }
    }

    /** @return array<string, mixed> */
    private function decode(string $path, string $allowedRoot): array
    {
        return $this->decodeContents($this->read($path, $allowedRoot), $path);
    }

    private function read(string $path, string $allowedRoot): string
    {
        $realRoot = realpath($allowedRoot);
        $realPath = realpath($path);

        if ($realRoot === false || $realPath === false || is_link($path) || ! str_starts_with($realPath, rtrim($realRoot, DIRECTORY_SEPARATOR).DIRECTORY_SEPARATOR)) {
            throw new RuntimeException("Projection path [{$path}] is missing or outside its allowed directory.");
        }

        if ($this->files->size($realPath) > (int) config('public_site.projection.max_bytes')) {
            throw new RuntimeException("Projection file [{$path}] exceeds the configured size limit.");
        }

        return $this->files->get($realPath);
    }

    /** @return array<string, mixed> */
    private function decodeContents(string $contents, string $path): array
    {
        $decoded = json_decode($contents, true, flags: JSON_THROW_ON_ERROR);

        if (! is_array($decoded) || array_is_list($decoded)) {
            throw new RuntimeException("Projection file [{$path}] must contain a JSON object.");
        }

        return $decoded;
    }

    private function safeSegment(string $value): string
    {
        if ($value === '' || preg_match('/^[A-Za-z0-9_-]+$/', $value) !== 1) {
            throw new RuntimeException('Invalid projection version.');
        }

        return $value;
    }
}
