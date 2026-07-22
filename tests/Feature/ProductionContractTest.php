<?php

test('the production image exposes separate php fpm and unprivileged web targets', function () {
    $dockerfile = file_get_contents(base_path('Dockerfile'));

    expect($dockerfile)
        ->toContain('AS php-fpm')
        ->toContain('AS web')
        ->toContain('nginxinc/nginx-unprivileged:1.29-alpine')
        ->toContain('public/build')
        ->toContain('mkdir -p storage/framework/cache/data storage/framework/views storage/logs')
        ->toContain('php artisan optimize --no-interaction')
        ->not->toContain('pdo_pgsql');
});

test('nginx rejects unknown hosts and forwards only the front controller to php fpm', function () {
    $nginx = file_get_contents(base_path('docker/nginx/default.conf'));

    expect($nginx)
        ->toContain('listen 8080 default_server;')
        ->toContain('return 444;')
        ->toContain('server_name sqaudex.com;')
        ->toContain('location = /index.php')
        ->toContain('fastcgi_pass $public_php_upstream;')
        ->toContain('fastcgi_cache squadex_public;')
        ->toContain('fastcgi_cache_lock on;')
        ->toContain('location = /up')
        ->toContain('Cache-Control "no-store"')
        ->toContain('gzip on;')
        ->toContain('location ~ \.php$')
        ->toContain('return 404;');
});

test('the release documentation declares a stateless read-only production runtime', function () {
    $readme = file_get_contents(base_path('README.md'));

    expect($readme)
        ->toContain('SQUADEX_PUBLIC_PHP_IMAGE')
        ->toContain('SQUADEX_PUBLIC_NGINX_IMAGE')
        ->toContain('no database, session, queue, or mail transport');
});

test('production PHP enables immutable opcache and a bounded realpath cache', function () {
    $configuration = file_get_contents(base_path('docker/php/production.ini'));

    expect($configuration)
        ->toContain('opcache.enable=1')
        ->toContain('opcache.validate_timestamps=0')
        ->toContain('opcache.memory_consumption=128')
        ->toContain('realpath_cache_size=4096K');
});

test('a static robots file cannot shadow the dynamic robots policy', function () {
    expect(file_exists(public_path('robots.txt')))->toBeFalse();
});
