FROM php:8.3-cli

RUN apt-get update && apt-get install -y libpq-dev zlib1g-dev unzip \
    && docker-php-ext-install pdo_mysql

RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/bin --filename=composer --quiet

ENV COMPOSER_ALLOW_SUPERUSER 1

WORKDIR /app