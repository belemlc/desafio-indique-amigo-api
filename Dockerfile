FROM php:7.4-fpm

WORKDIR "/var/www/html"

RUN apt-get update \
    && apt-get install -y libpq-dev git \
    && docker-php-ext-install pdo pdo_pgsql

COPY ./docker/php/php.ini /usr/local/etc/php/conf.d/php.override.ini

RUN docker-php-ext-install pdo pdo_mysql opcache

# Install Composer
COPY --from=composer /usr/bin/composer /usr/bin/composer