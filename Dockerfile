FROM php:7.2.6-apache


# PHP ini
COPY docker/config/php.ini /usr/local/etc/php/

# PHP Extensions
RUN docker-php-ext-install pdo_sqlite3

# Copy apache conf
RUN a2enmod rewrite
COPY docker/config/apache.conf /etc/apache2/sites-enabled/000-default.conf


# Composer
RUN apt-get update && \
    apt-get install -y git zip unzip
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer
RUN composer --version

WORKDIR /app
EXPOSE 80
