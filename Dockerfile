# syntax=docker/dockerfile:1.7
FROM php:8.4-cli-alpine AS composer-dependencies

ENV COMPOSER_ALLOW_SUPERUSER=1 \
    COMPOSER_HOME=/tmp/composer

RUN apk add --no-cache git unzip
COPY --from=composer:2 /usr/bin/composer /usr/local/bin/composer

WORKDIR /app
COPY composer.json composer.lock ./
COPY app ./app
RUN --mount=type=cache,target=/tmp/composer/cache \
    composer install --no-dev --no-interaction --prefer-dist --no-scripts --optimize-autoloader --classmap-authoritative

FROM node:24-alpine AS public-assets
WORKDIR /app
COPY package.json package-lock.json ./
RUN --mount=type=cache,target=/root/.npm npm ci --ignore-scripts
COPY resources ./resources
COPY public ./public
COPY vite.config.js ./
RUN npm run build

FROM php:8.4-fpm-alpine AS php-fpm

RUN apk add --no-cache icu-libs \
    && apk add --no-cache --virtual .build-deps icu-dev $PHPIZE_DEPS \
    && docker-php-ext-install -j"$(nproc)" intl opcache \
    && apk del .build-deps

WORKDIR /var/www/html

COPY --chown=www-data:www-data app ./app
COPY --chown=www-data:www-data bootstrap ./bootstrap
COPY --chown=www-data:www-data config ./config
COPY --chown=www-data:www-data lang ./lang
COPY --chown=www-data:www-data public ./public
COPY --chown=www-data:www-data resources ./resources
COPY --chown=www-data:www-data routes ./routes
COPY --chown=www-data:www-data storage ./storage
COPY --chown=www-data:www-data artisan composer.json composer.lock ./
COPY --from=composer-dependencies --chown=www-data:www-data /app/vendor ./vendor
COPY --from=public-assets --chown=www-data:www-data /app/public/build ./public/build
COPY docker/php/production.ini /usr/local/etc/php/conf.d/zz-squadex-public.ini

RUN rm -f bootstrap/cache/*.php \
    && php artisan package:discover --ansi \
    && mkdir -p storage/framework/cache/data storage/framework/views storage/logs \
    && chown -R www-data:www-data storage bootstrap/cache

USER www-data
EXPOSE 9000
HEALTHCHECK --interval=30s --timeout=3s --retries=3 CMD ["php", "-r", "$socket = @fsockopen('127.0.0.1', 9000); exit($socket === false ? 1 : 0);"]
CMD ["sh", "-lc", "mkdir -p storage/framework/cache/data storage/framework/views storage/logs && php artisan optimize --no-interaction && exec php-fpm -F"]

FROM nginxinc/nginx-unprivileged:1.29-alpine AS web

COPY docker/nginx/default.conf /etc/nginx/conf.d/default.conf
COPY public /var/www/html/public
COPY --from=public-assets /app/public/build /var/www/html/public/build

EXPOSE 8080
HEALTHCHECK --interval=30s --timeout=3s --retries=3 CMD ["wget", "-q", "--header=Host: sqaudex.com", "-O", "/dev/null", "http://127.0.0.1:8080/up"]
