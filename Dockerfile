# Use PHP 8.2 image as the base
FROM php:8.2 AS php

# Update the package repository and install necessary extensions and tools
RUN apt-get update -y \
    && apt-get install -y unzip libpq-dev libcurl4-gnutls-dev \
    && docker-php-ext-install pdo pdo_mysql bcmath

# Uncomment the following lines if you need Redis support
# RUN pecl install -o -f redis \
#     && rm -rf /tmp/pear \
#     && docker-php-ext-enable redis

# Set the working directory
WORKDIR /var/www

# Copy the current application code into the container
COPY . .

# Install Composer using the official Composer Docker image
COPY --from=composer:2.3.5 /usr/bin/composer /usr/bin/composer

# Run Composer install to install PHP dependencies
RUN composer install --no-dev --optimize-autoloader --no-interaction

# Set the application port as an environment variable
ENV PORT=8000

# Set the entry point script (This needs to be defined properly in your project)
ENTRYPOINT [ "docker/entrypoint.sh" ]
