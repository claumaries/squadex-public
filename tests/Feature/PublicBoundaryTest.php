<?php

use Illuminate\Support\Facades\Route;

test('the public application exposes no private application routes', function () {
    $routes = collect(Route::getRoutes()->getRoutes());

    expect($routes->contains(fn ($route): bool => str_starts_with($route->uri(), 'app/')))->toBeFalse()
        ->and(Route::has('dashboard'))->toBeFalse()
        ->and(Route::has('password.request'))->toBeFalse();
});

test('the public application has no authentication or spa dependencies', function () {
    $composer = json_decode(file_get_contents(base_path('composer.json')), true, flags: JSON_THROW_ON_ERROR);
    $packages = array_keys([...$composer['require'], ...$composer['require-dev']]);

    expect($packages)
        ->not->toContain('laravel/fortify')
        ->not->toContain('laravel/sanctum')
        ->not->toContain('inertiajs/inertia-laravel')
        ->and(file_exists(config_path('auth.php')))->toBeFalse()
        ->and(file_exists(app_path('Models/User.php')))->toBeFalse();
});

test('the public runtime has no database session queue mail or remote cache configuration', function () {
    expect(config('cache.default'))->toBe('file')
        ->and(array_keys(config('cache.stores')))->toBe(['file'])
        ->and(config('app.key'))->toBeNull()
        ->and(config('auth.guards'))->toBe([])
        ->and(config('database.default'))->toBeNull()
        ->and(config('database.connections'))->toBe([])
        ->and(config('queue.default'))->toBeNull()
        ->and(config('queue.connections'))->toBe([])
        ->and(config('mail.default'))->toBeNull()
        ->and(config('mail.mailers'))->toBe([])
        ->and(config('session.driver'))->toBe('array')
        ->and(config('filesystems.default'))->toBeNull()
        ->and(config('filesystems.disks'))->toBe([])
        ->and(file_exists(config_path('database.php')))->toBeFalse()
        ->and(file_exists(config_path('session.php')))->toBeFalse()
        ->and(file_exists(config_path('queue.php')))->toBeFalse()
        ->and(file_exists(config_path('mail.php')))->toBeFalse()
        ->and(file_exists(app_path('Models/NewsletterSubscription.php')))->toBeFalse();
});
