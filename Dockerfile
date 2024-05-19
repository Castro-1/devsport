FROM php:8.1.4-apache

# Instalar dependencias necesarias
RUN apt-get update -y && apt-get install -y openssl zip unzip git
RUN docker-php-ext-install pdo_mysql
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

# Copiar los archivos del proyecto al contenedor
COPY . /var/www/html
COPY ./public/.htaccess /var/www/html/public/.htaccess
COPY ./apache-config.conf /etc/apache2/sites-available/000-default.conf

WORKDIR /var/www/html

# Instalar dependencias de PHP
RUN composer install \
    --ignore-platform-reqs \
    --no-interaction \
    --no-plugins \
    --no-scripts \
    --prefer-dist

# Generar clave de aplicación, ejecutar migraciones y establecer permisos
RUN php artisan key:generate
RUN php artisan migrate

# Establecer permisos y propiedad correctos
RUN chown -R www-data:www-data /var/www/html
RUN chmod -R 777 /var/www/html/storage /var/www/html/bootstrap/cache

# Habilitar módulo rewrite de Apache
RUN a2enmod rewrite

# Exponer el puerto 80
EXPOSE 80

# Crear el enlace simbólico después de montar los volúmenes y asegurarse de que el contenedor tiene permisos adecuados
CMD ["sh", "-c", "php artisan storage:link && apache2-foreground"]
