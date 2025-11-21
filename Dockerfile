# -------- BUILDER STAGE --------
FROM php:8.3-cli AS composer_builder

# Install system deps
RUN apt-get update && apt-get install -y \
    git unzip libpq-dev libzip-dev libonig-dev \
    && docker-php-ext-install pdo pdo_pgsql

# Install Composer
COPY --from=composer:2.7 /usr/bin/composer /usr/bin/composer

# Copy application code
WORKDIR /var/www/html
COPY . .

# Install PHP deps
RUN composer install --no-dev --no-interaction --prefer-dist --optimize-autoloader


# -------- APP RUNTIME STAGE --------
FROM php:8.3-fpm AS app

# System deps
RUN apt-get update && apt-get install -y \
    libpq-dev libzip-dev \
    && docker-php-ext-install pdo pdo_pgsql

WORKDIR /var/www/html


# Copy built vendor from builder
COPY . .

# Copy PHP-FPM config (optional)
# COPY ./docker/php/php.ini /usr/local/etc/php/php.ini

# Permissions
RUN chown -R www-data:www-data /var/www/html/storage /var/www/html/bootstrap/cache

EXPOSE 9000

CMD ["php-fpm"]
