---
name: squadex-public-laravel
description: Build and review the SQUADEX unauthenticated Laravel application. Use for public Blade/Inertia pages, locale routes, SEO, public news, matches, tournaments, leaderboards, projection consumption, cache policy, auth-domain redirects, Laravel Dockerfiles, or Pest tests in squadex-public. Do not use for authenticated product domains.
---

# SQUADEX Public Laravel

## Enforce The Boundary

Read `AGENTS.md`. Before migrating a route from the monolith, classify it:

- Public and unauthenticated: it may belong here.
- Login, registration, recovery, 2FA, club ownership, gameplay, marketplace transactions, token operations, wallet, queue, game engine, or admin: it belongs in FastAPI plus React and must not be copied here. Read-only marketplace discovery may consume the public projection contract.

Authentication buttons redirect to the locale-aware authenticated app domain. Laravel does not share or write FastAPI's database.

## Implement Public Behavior

Use Laravel-native routes, thin controllers, focused actions, Form Requests, DTOs/Resources, cache policies, and named routes. Consume public projections through explicit versioned contracts with pagination, query limits, timeouts, stale fallback, and structured logs. Preserve canonical URLs, locale prefixes, hreflang, sitemap, structured data, accessibility, and social metadata.

Load `APP_NAME`, `MAIL_FROM_ADDRESS`, external domains, and CDN configuration through environment-backed Laravel config. Runtime media uses S3/CDN object references, not repository files.

## Verify

Add Pest feature tests for routes, locale behavior, redirects, cache degradation, pagination limits, and SEO contracts. Run the focused test set and Pint through the repository's Docker container once its Laravel scaffold is present.
