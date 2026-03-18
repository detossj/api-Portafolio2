FROM php:8.2-apache

# Instalar dependencias del sistema y drivers para PostgreSQL
RUN apt-get update && apt-get install -y \
    libpq-dev \
    zip \
    unzip \
    git \
    && docker-php-ext-install pdo pdo_pgsql

# Habilitar el módulo rewrite de Apache (vital para las rutas de Laravel)
RUN a2enmod rewrite

# Copiar Composer desde la imagen oficial
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

# Configurar el directorio de trabajo
WORKDIR /var/www/html

# Copiar todo el código de tu proyecto al contenedor
COPY . .

# Apuntar Apache a la carpeta "public" de Laravel
ENV APACHE_DOCUMENT_ROOT /var/www/html/public
RUN sed -ri -e 's!/var/www/html!${APACHE_DOCUMENT_ROOT}!g' /etc/apache2/sites-available/*.conf
RUN sed -ri -e 's!/var/www/!${APACHE_DOCUMENT_ROOT}!g' /etc/apache2/apache2.conf /etc/apache2/conf-available/*.conf

# Instalar las librerías de Laravel
RUN composer install --no-dev --optimize-autoloader

# Darle los permisos correctos a Laravel para que no tire errores de lectura
RUN chown -R www-data:www-data /var/www/html/storage /var/www/html/bootstrap/cache