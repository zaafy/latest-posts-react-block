FROM wordpress:6-php8.2-apache

RUN pecl install xdebug \
    && docker-php-ext-enable xdebug \
    && a2enmod rewrite \
    && a2enmod headers

EXPOSE 80