FROM composer:2 as vendor

COPY database/ database/

COPY composer.json composer.json
COPY composer.lock composer.lock

RUN composer install \
    --ignore-platform-reqs \
    --no-interaction \
    --no-plugins \
    --no-scripts \
    --prefer-dist

FROM php:7.4-apache as prod
RUN pecl install redis
RUN docker-php-ext-install mysqli pdo_mysql pcntl
RUN docker-php-ext-enable redis
COPY 000-default.conf /etc/apache2/sites-available/000-default.conf
COPY php.ini /usr/local/etc/php/php.ini
COPY . /var/www/html
COPY --from=vendor /app/vendor/ /var/www/html/vendor/
WORKDIR /var/www/html
RUN cp .env.example .env
RUN a2enmod rewrite

FROM prod as debug
RUN pecl install xdebug-2.9.1
RUN docker-php-ext-enable xdebug
RUN a2enmod rewrite


