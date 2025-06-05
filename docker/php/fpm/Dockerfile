FROM php:8.3-fpm

RUN apt-get update && apt-get install -y --no-install-recommends \
    libmcrypt-dev \
    libzip-dev \
    curl \
    && docker-php-ext-install mysqli pdo_mysql zip \
    && rm -r /var/lib/apt/lists/*

WORKDIR /app