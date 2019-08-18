FROM php:fpm
RUN docker-php-ext-install calendar
RUN docker-php-ext-configure calendar

RUN curl -sL https://getcomposer.org/installer | php -- --install-dir /usr/bin --filename composer

WORKDIR /var/www/html
COPY ./ ./
RUN composer install