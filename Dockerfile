FROM php:7.4-apache

RUN apt-get update &&\
  # WebP ‘Î‰ž
  apt-get install -y zlib1g-dev libfreetype-dev libjpeg-dev libpng-dev libwebp-dev &&\
  docker-php-ext-configure gd --with-freetype --with-jpeg --with-webp &&\
  docker-php-ext-install -j$(nproc) gd

WORKDIR /conv