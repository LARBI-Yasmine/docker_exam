FROM php:7.4-apache

RUN apt-get update && apt-get install -y \
    git \
    unzip \
    libicu-dev \
    libzip-dev \
    && docker-php-ext-install \
    intl \
    pdo_mysql \
    zip

RUN a2enmod rewrite

RUN echo "date.timezone = UTC" > /usr/local/etc/php/conf.d/symfony.ini

COPY . /var/www/html

RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer



EXPOSE 80
CMD ["apache2-foreground"]