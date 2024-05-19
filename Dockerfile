FROM php:8.1.4-apache

RUN apt-get update -y && apt-get install -y \
    openssl \
    zip \
    unzip \
    git

RUN docker-php-ext-install pdo_mysql

RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

RUN echo 'ServerName localhost' >> /etc/apache2/apache2.conf

RUN a2enmod rewrite

COPY . /var/www/html

WORKDIR /var/www/html

RUN composer install \
    --ignore-platform-reqs \
    --no-interaction \
    --no-plugins \
    --no-scripts \
    --prefer-dist

RUN php artisan key:generate

RUN chmod -R 777 storage bootstrap/cache

RUN php artisan storage:link

COPY ./public/.htaccess /var/www/html/public/.htaccess

EXPOSE 80

CMD ["apache2-foreground"]
