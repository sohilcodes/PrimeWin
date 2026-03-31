FROM php:8.2-apache

# MySQL extension
RUN docker-php-ext-install mysqli

# Enable rewrite
RUN a2enmod rewrite

# Copy files
COPY . /var/www/html/

EXPOSE 80
