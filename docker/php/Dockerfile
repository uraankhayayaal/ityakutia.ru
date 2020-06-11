FROM php:7.3-fpm
RUN apt-get update && apt-get install -y \
        libfreetype6-dev \
        libjpeg62-turbo-dev \
        libmcrypt-dev \
        libpng-dev \
        zlib1g-dev \
        libxml2-dev \
        libonig-dev \
        libzip-dev \
        zip \
        libonig-dev
RUN docker-php-ext-configure gd --with-freetype-dir=/usr/include/freetype --with-jpeg-dir=/usr/include/ \
    && docker-php-ext-configure zip --with-libzip \
    && docker-php-ext-install -j$(nproc) gd \
    && docker-php-ext-install pdo pdo_mysql mbstring json intl opcache zip
    
# Install composer
RUN php -r "readfile('http://getcomposer.org/installer');" | php -- --install-dir=/usr/bin/ --filename=composer

WORKDIR /app

ENTRYPOINT ["docker-php-entrypoint"]

CMD composer update && \
    php init --env=Development --overwrite=All --interactive=0 && \
    php yii migrate --interactive=0 && \
    php-fpm