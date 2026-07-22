<?php

use App\PublicSite\ValidatePublicProjectionSnapshot;
use Illuminate\Support\Facades\File;
use Tests\Support\PublicProjectionFixture;

beforeEach(function () {
    $this->projectionPath = storage_path('framework/testing/validated-public-projections');
    File::deleteDirectory($this->projectionPath);
    File::ensureDirectoryExists($this->projectionPath);
    config()->set('public_site.projection.path', $this->projectionPath);
});

afterEach(function () {
    File::deleteDirectory($this->projectionPath);
});

test('the projection validator accepts a complete integrity checked snapshot', function () {
    $payloads = [];

    foreach (config('public_pages') as $page => $definition) {
        if (($definition['projection'] ?? false) === true) {
            $payloads["pages/{$page}.json"] = PublicProjectionFixture::unavailablePage();
        }
    }

    foreach (config('public_site.sitemap_sections') as $section) {
        $payloads["sitemaps/{$section}.json"] = PublicProjectionFixture::sitemap();
    }

    PublicProjectionFixture::publish($this->projectionPath, $payloads);
    File::delete($this->projectionPath.'/current.json');

    $this->artisan('public-projection:validate', ['--snapshot' => 'release-1', '--strict' => true, '--json' => true])
        ->expectsOutputToContain('"valid":true')
        ->assertSuccessful();
});

test('the projection validator rejects a pointer checksum mismatch', function () {
    PublicProjectionFixture::publish($this->projectionPath, [
        'pages/teams.json' => PublicProjectionFixture::unavailablePage(),
    ]);
    $pointerPath = $this->projectionPath.'/current.json';
    $pointer = json_decode(File::get($pointerPath), true, flags: JSON_THROW_ON_ERROR);
    $pointer['manifest_sha256'] = str_repeat('0', 64);
    File::put($pointerPath, json_encode($pointer, JSON_THROW_ON_ERROR));

    $result = app(ValidatePublicProjectionSnapshot::class)->handle();

    expect($result->isValid())->toBeFalse()
        ->and(implode(' ', $result->errors))->toContain('checksum');
});

test('strict validation rejects undeclared files and missing required projections', function () {
    PublicProjectionFixture::publish($this->projectionPath, [
        'pages/teams.json' => PublicProjectionFixture::unavailablePage(),
    ]);
    File::put($this->projectionPath.'/versions/release-1/pages/undeclared.json', '{}');

    $result = app(ValidatePublicProjectionSnapshot::class)->handle(strict: true);

    expect($result->isValid())->toBeFalse()
        ->and(implode(' ', $result->errors))
        ->toContain('Undeclared projection file')
        ->toContain('Required projection');
});
