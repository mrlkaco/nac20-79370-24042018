FROM php:7.2-apache

# Extensão mysqli para conexão com database
RUN docker-php-ext-install mysqli

WORKDIR /var/www/html/

COPY . /var/www/html/