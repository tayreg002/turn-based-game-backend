FROM php:8.3-fpm


WORKDIR /app



RUN mkdir -p /app/public/uploads

RUN apt-get update && apt-get install -y --no-install-recommends \
    libmcrypt-dev \
    libzip-dev \
    curl \
    && docker-php-ext-install mysqli pdo_mysql zip \
    && rm -r /var/lib/apt/lists/*

COPY php.ini /usr/local/etc/php/conf.d/php.ini