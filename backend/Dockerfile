FROM php:8.4-fpm

# Installer les dépendances et extensions PHP nécessaires
RUN apt-get update && apt-get install -y \
    libpq-dev \
    zip unzip git curl libpng-dev libonig-dev libxml2-dev \
  && docker-php-ext-install \
    pdo \
    pdo_pgsql \
    pgsql \
    mbstring \
    exif \
    pcntl \
    bcmath \
    gd \
  && apt-get clean && rm -rf /var/lib/apt/lists/*

# Installer Composer
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

WORKDIR /var/www

COPY . .

RUN composer install

CMD ["php", "artisan", "serve", "--host=0.0.0.0", "--port=8000"]