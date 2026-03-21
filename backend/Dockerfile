FROM php:8.4-fpm

# Installer les dépendances et extensions PHP nécessaires
RUN apt-get update -o Acquire::Check-Valid-Until=false && \
    apt-get install -y libpq-dev zip unzip git curl libpng-dev libonig-dev libxml2-dev && \
    docker-php-ext-install pdo pdo_pgsql

# Installer Composer
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/bin --filename=composer

WORKDIR /var/www

COPY . .

RUN composer install

CMD ["php-fpm"]