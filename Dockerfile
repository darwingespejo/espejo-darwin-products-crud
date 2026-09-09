ARG PHP_VERSION=8.2
FROM php:${PHP_VERSION}-apache

# Install PDO MySQL extension for LavaLust
RUN docker-php-ext-install pdo pdo_mysql mysqli

# Enable Apache mod_rewrite for LavaLust routing
RUN a2enmod rewrite

# Allow .htaccess overrides
RUN sed -i '/<Directory \/var\/www\/>/,/<\/Directory>/ s/AllowOverride None/AllowOverride All/' /etc/apache2/apache2.conf

# Copy app files
COPY . /var/www/html/

# Fix permissions
RUN chown -R www-data:www-data /var/www/html \
    && chmod -R 755 /var/www/html

EXPOSE 80