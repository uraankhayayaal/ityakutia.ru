FROM yiisoftware/yii2-php:8.1-fpm-min

RUN apt-get update && apt-get install -y \
    git \
    curl \
    zip \
    unzip

RUN docker-php-ext-configure pcntl --enable-pcntl \
    && docker-php-ext-install \
    pdo \
    pdo_mysql \
    pcntl

RUN pecl install mongodb && docker-php-ext-enable mongodb
RUN echo "extension=mongodb.so" >> /usr/local/etc/php/php.ini

RUN curl -sS https://getcomposer.org/installer | php -- \
    --filename=composer \
    --install-dir=/usr/local/bin

WORKDIR /app

ENTRYPOINT ["docker-php-entrypoint"]

CMD ["/bin/bash", "./docker/php/startup.sh"]
