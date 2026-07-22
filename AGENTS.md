# SQUADEX Public Laravel Guidelines

- This repository owns unauthenticated public Laravel pages only.
- Do not implement login, registration, password recovery, 2FA, authenticated club flows, marketplace transactions, game engine, token ledger, wallets, or admin domains here. Read-only public marketplace browsing is allowed through projection data.
- Redirect authentication entry points to the locale-aware React Web application domain.
- Use Laravel-native controllers/actions, Form Requests, Resources/DTOs, queues, caching, and tests where applicable. Keep controllers and commands thin.
- Use a database and credentials isolated from FastAPI. Do not connect to or write authenticated-domain tables.
- Consume public projections through an explicit API or event contract with pagination, timeouts, caching, stale-state handling, and observability.
- Preserve locale-prefixed public routes, canonical URLs, hreflang, sitemap, structured data, accessibility, and SEO.
- `APP_NAME` and `MAIL_FROM_ADDRESS` must come from environment-backed configuration. Never hardcode product identity or sender addresses.
- Do not store runtime player, team, competition, stadium, article, or generated images in Git; consume CDN/S3 URLs from projection data.
- Add Pest tests for changed behavior and run them through the repository's Docker container once available.
