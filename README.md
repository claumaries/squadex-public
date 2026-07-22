# SQUADEX Public

Laravel 13 application for the unauthenticated Squadex website: localized marketing pages, public football data, read-only marketplace discovery, news/blog, legal content, SEO and sitemaps.

Authentication and all state-changing product workflows remain in FastAPI plus React. Login and registration links redirect to `AUTH_APP_URL/{locale}/login` and `AUTH_APP_URL/{locale}/register`. Laravel never connects to the authenticated application's database.

## Runtime boundary

- `php-fpm` is the Laravel runtime image target.
- `web` is the unprivileged Nginx/static-assets image target and the production ingress target.
- The HTTP runtime is stateless and uses no database, session, queue, or mail transport.
- The only application cache is Laravel's bounded local file cache; Nginx also uses an ephemeral on-disk FastCGI cache.
- Public football and editorial data is read from an immutable, read-only snapshot volume.
- A missing or invalid snapshot produces an explicit unavailable state; it never causes a FastAPI request at page-render time.

Local development is orchestrated from the parent `squadex-docker` repository. Run focused tests with its Docker workflow, or build this repository's `quality` target.

## Projection contract

`PUBLIC_PROJECTION_PATH/current.json` is an atomic pointer:

```json
{
  "contract_version": "v1",
  "version": "2026-07-22T120000Z-a1b2c3",
  "manifest_sha256": "<sha256 of versions/<version>/manifest.json>"
}
```

The immutable version directory contains `manifest.json`, `pages/*.json` and `sitemaps/*.json`. The manifest declares every file's relative path, byte count and SHA-256 checksum. Page payloads declare `available`, `generated_at`, `default_parameters`, `data`, `variant_parameters` and `variants`. Variant keys are SHA-256 hashes of a shallow, key-sorted JSON parameter object encoded without escaped Unicode or slashes.

Validate a mounted snapshot before switching the pointer:

```bash
php artisan public-projection:validate --strict
php artisan public-projection:validate --strict --json
php artisan public-projection:validate --snapshot=<immutable-version> --strict
```

Publishing is owned by the FastAPI/data pipeline and must use a temporary directory, validate the complete version, atomically rename the version directory, then atomically replace `current.json`. Laravel is a read-only consumer and intentionally contains no production bootstrap writer.

## Production release

Build and publish both targets, ideally pinned by digest in Compose:

```bash
docker build --target php-fpm -t registry.example/squadex-public-php:<version> .
docker build --target web -t registry.example/squadex-public-nginx:<version> .
```

Required production configuration includes `SQUADEX_PUBLIC_PHP_IMAGE`, `SQUADEX_PUBLIC_NGINX_IMAGE`, `PUBLIC_APP_URL`, `AUTH_APP_URL`, `PUBLIC_CONTACT_ADDRESS`, exact `PUBLIC_TRUSTED_HOSTS`, proxy addresses and approved media hosts. Start PHP-FPM, then Nginx; there is no Laravel migration step. The PHP container builds Laravel's config, route and view caches after runtime environment injection. The `/up` healthcheck traverses Nginx, FastCGI and Laravel.

Before release, validate the projection, run Pest and Pint, build both production image targets, verify an unknown `Host` is rejected, and confirm Laravel remains available when FastAPI, Redis and workers are stopped.

Read [AGENTS.md](AGENTS.md) and load the local `squadex-public-laravel` skill before implementation.
