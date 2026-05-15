FROM php:8.2-fpm-alpine

# 1. Instala dependencias del sistema
RUN apk add --no-cache \
    git \
    unzip \
    libpq-dev \
    postgresql-dev \
    libjpeg-turbo-dev \
    libpng-dev \
    freetype-dev \
    $PHPIZE_DEPS 

# 2. Configura PHP (Base de datos e imágenes)
RUN docker-php-ext-install pdo pdo_pgsql \
    && docker-php-ext-configure gd --with-freetype --with-jpeg \
    && docker-php-ext-install gd

# 3. Instala Composer
ENV COMPOSER_ALLOW_SUPERUSER=1
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

# 4. Limpieza
RUN apk del $PHPIZE_DEPS

# 5. Directorio de trabajo
WORKDIR /var/www/html

# ==========================================
#      AQUÍ EMPIEZA LA MAGIA QUE FALTABA
# ==========================================

# 6. Copia TODO tu código de Windows hacia adentro de la imagen
COPY . .

# 7. Instala las dependencias de Laravel (crea la carpeta vendor automáticamente)
RUN composer install --no-dev --optimize-autoloader

# 8. Da permisos de escritura a las carpetas de logs y cache (Vital para Laravel)
RUN chown -R www-data:www-data /var/www/html/storage /var/www/html/bootstrap/cache

# 9. Comando de arranque (Convierte el contenedor en Servidor Web)
CMD php artisan serve --host=0.0.0.0 --port=8000