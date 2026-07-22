<?php

namespace App\Providers;

use App\Contracts\PublicProjectionRepository;
use App\Infrastructure\Projections\VersionedFilePublicProjectionRepository;
use Illuminate\Contracts\Config\Repository as ConfigRepository;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        $this->configureReadOnlyRuntime();

        $this->app->bind(PublicProjectionRepository::class, VersionedFilePublicProjectionRepository::class);
    }

    private function configureReadOnlyRuntime(): void
    {
        $config = $this->app->make(ConfigRepository::class);
        $fileCache = $config->get('cache.stores.file');

        $config->set('cache.default', 'file');
        $config->set('cache.stores', ['file' => $fileCache]);
        $config->set('auth.defaults', ['guard' => null, 'passwords' => null]);
        $config->set('auth.guards', []);
        $config->set('auth.providers', []);
        $config->set('auth.passwords', []);
        $config->set('database.default', null);
        $config->set('database.connections', []);
        $config->set('database.redis', []);
        $config->set('queue.default', null);
        $config->set('queue.connections', []);
        $config->set('queue.failed.driver', null);
        $config->set('mail.default', null);
        $config->set('mail.mailers', []);
        $config->set('session.driver', 'array');
        $config->set('filesystems.default', null);
        $config->set('filesystems.disks', []);
        $config->set('filesystems.links', []);
    }
}
