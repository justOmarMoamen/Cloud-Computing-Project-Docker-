FROM php:7.4-apache

# Install additional PHP extensions
RUN docker-php-ext-install mysqli

# Copy website content to the htdocs directory
COPY ./webapp /var/www/html/

# Enable the rewrite module
RUN a2enmod rewrite
