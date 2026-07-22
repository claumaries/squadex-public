<?php

use App\Contracts\PublicProjectionRepository;
use App\PublicSite\CanonicalProjectionParameters;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Log;
use Tests\Support\PublicProjectionFixture;

beforeEach(function () {
    $this->projectionPath = storage_path('framework/testing/public-projections');
    File::deleteDirectory($this->projectionPath);
    File::ensureDirectoryExists($this->projectionPath);
    Cache::flush();
    config()->set('public_site.projection.path', $this->projectionPath);
    config()->set('public_site.projection.contract_version', 'v1');
});

afterEach(function () {
    File::deleteDirectory($this->projectionPath);
});

test('versioned public projections are read through an integrity checked contract', function () {
    PublicProjectionFixture::publish($this->projectionPath, [
        'pages/teams.json' => PublicProjectionFixture::page(['teams' => [['name' => 'Public FC']]]),
    ]);

    $projection = app(PublicProjectionRepository::class)->page('teams');

    expect($projection)
        ->toHaveKey('teams.0.name', 'Public FC')
        ->toHaveKey('_projection.version', 'release-1')
        ->toHaveKey('_projection.stale', false);
});

test('the last sanitized projection is returned when the active file becomes invalid', function () {
    PublicProjectionFixture::publish($this->projectionPath, [
        'pages/teams.json' => PublicProjectionFixture::page([
            'teams' => [[
                'name' => 'Stable FC',
                'descriptionHtml' => '<img src=x onerror=alert(1)>Safe description',
                'imageUrl' => 'javascript:alert(1)',
            ]],
        ]),
    ]);

    $repository = app(PublicProjectionRepository::class);
    $first = $repository->page('teams');
    $parameterHash = app(CanonicalProjectionParameters::class)->hash([]);
    Cache::forget("v3.public-projection.page.teams.{$parameterHash}");
    File::put($this->projectionPath.'/versions/release-1/pages/teams.json', '{invalid');

    expect($first)
        ->toHaveKey('teams.0.descriptionHtml', 'Safe description')
        ->toHaveKey('teams.0.imageUrl', null)
        ->and($repository->page('teams'))
        ->toHaveKey('teams.0.name', 'Stable FC')
        ->toHaveKey('_projection.stale', true);
});

test('a requested variant must match its exact canonical parameter set', function () {
    PublicProjectionFixture::publish($this->projectionPath, [
        'pages/teams.json' => PublicProjectionFixture::page(['teams' => [['name' => 'Default FC']]]),
    ]);

    expect(app(PublicProjectionRepository::class)->page('teams', ['page' => 2]))->toBeNull();
});

test('a canonical requested variant is returned without falling back to default data', function () {
    $parameters = ['locale' => 'en', 'page' => 2];
    $variantHash = app(CanonicalProjectionParameters::class)->hash($parameters);
    $payload = PublicProjectionFixture::page(['teams' => [['name' => 'Default FC']]]);
    $payload['variant_parameters'] = [$variantHash => $parameters];
    $payload['variants'] = [$variantHash => ['teams' => [['name' => 'Page Two FC']]]];
    PublicProjectionFixture::publish($this->projectionPath, ['pages/teams.json' => $payload]);

    expect(app(PublicProjectionRepository::class)->page('teams', $parameters))
        ->toHaveKey('teams.0.name', 'Page Two FC');
});

test('sitemap projections apply the URL policy and keep a sanitized stale fallback', function () {
    PublicProjectionFixture::publish($this->projectionPath, [
        'sitemaps/clubs.json' => PublicProjectionFixture::sitemap([
            ['url' => 'http://localhost/en/club/england/public-fc'],
            ['url' => 'javascript:alert(1)'],
        ]),
    ]);

    $repository = app(PublicProjectionRepository::class);

    expect(collect($repository->sitemap('clubs'))->pluck('url')->all())
        ->toBe(['http://localhost/en/club/england/public-fc']);

    Cache::forget('v3.public-projection.sitemap.clubs');
    File::put($this->projectionPath.'/versions/release-1/sitemaps/clubs.json', '{invalid');

    expect(collect($repository->sitemap('clubs'))->pluck('url')->all())
        ->toBe(['http://localhost/en/club/england/public-fc']);
});

test('a manifest checksum mismatch fails closed', function () {
    PublicProjectionFixture::publish($this->projectionPath, [
        'pages/teams.json' => PublicProjectionFixture::page(['teams' => []]),
    ]);
    File::put($this->projectionPath.'/versions/release-1/manifest.json', '{}');

    expect(app(PublicProjectionRepository::class)->page('teams'))->toBeNull();
});

test('a warm page hit does not rewrite the last good file cache entry', function () {
    PublicProjectionFixture::publish($this->projectionPath, [
        'pages/teams.json' => PublicProjectionFixture::page(['teams' => [['name' => 'Public FC']]]),
    ]);

    $repository = app(PublicProjectionRepository::class);
    $parameterHash = app(CanonicalProjectionParameters::class)->hash([]);
    $lastGoodKey = "v3.public-projection.page.teams.{$parameterHash}.last-good";

    $repository->page('teams');
    Cache::put($lastGoodKey, ['sentinel' => true], 60);
    $repository->page('teams');

    expect(Cache::get($lastGoodKey))->toBe(['sentinel' => true]);
});

test('a validated immutable manifest is reused from file cache', function () {
    PublicProjectionFixture::publish($this->projectionPath, [
        'pages/teams.json' => PublicProjectionFixture::page(['teams' => [['name' => 'Public FC']]]),
    ]);

    expect(app(PublicProjectionRepository::class)->page('teams'))
        ->toHaveKey('_projection.stale', false);

    File::delete($this->projectionPath.'/versions/release-1/manifest.json');

    expect(app(PublicProjectionRepository::class)->page('teams'))
        ->toHaveKey('teams.0.name', 'Public FC')
        ->toHaveKey('_projection.stale', false);
});

test('an unavailable page is negatively cached without repeated file reads or warnings', function () {
    PublicProjectionFixture::publish($this->projectionPath, [
        'pages/teams.json' => PublicProjectionFixture::unavailablePage(),
    ]);

    expect(app(PublicProjectionRepository::class)->page('teams'))->toBeNull();

    File::delete($this->projectionPath.'/versions/release-1/pages/teams.json');
    Log::spy();

    expect(app(PublicProjectionRepository::class)->page('teams'))->toBeNull();
    Log::shouldNotHaveReceived('warning');
});
