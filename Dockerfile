# PHP Docker image for Yii 2.0 Framework runtime
# ==============================================

FROM php:7.3-fpm-alpine

# Install system packages & PHP extensions required for Yii 2.0 Framework
RUN apk --update --virtual build-deps add \
        autoconf \
        make \
        gcc \
        g++ \
        libtool \
        icu-dev \
        curl-dev \
        freetype-dev \
        imagemagick-dev \
        pcre-dev \
        postgresql-dev \
        # imap-dev \
        openssl-dev \
        libjpeg-turbo-dev \
        c-client \
        libpng-dev \
        libxml2-dev \
        libzip-dev && \
    apk add \
        git \
        curl \
        bash \
        bash-completion \
        icu \
        imagemagick \
        pcre \
        freetype \
        libintl \
        libjpeg-turbo \
        libpng \
        libltdl \
        libxml2 \
        libzip \
        unzip \
        mysql-client \
        openssh \
        git \
        postgresql && \
    docker-php-ext-configure gd \
        --with-gd \
        --with-freetype-dir=/usr/include/ \
        --with-png-dir=/usr/include/ \
        --with-jpeg-dir=/usr/include/ && \
    docker-php-ext-configure bcmath && \
    # docker-php-ext-configure imap \
    #     --with-imap \
    #     --with-imap-ssl && \
    docker-php-ext-install \
        soap \
        curl \
        bcmath \
        exif \
        gd \
        # iconv \
        intl \
        mbstring \
        opcache \
        # imap \
        pdo_mysql \
        pdo_pgsql && \
    pecl install \
        imagick && \
    apk del \
        build-deps

RUN echo "extension=imagick.so" > /usr/local/etc/php/conf.d/pecl-imagick.ini
# RUN echo "extension=imagick.so" > /usr/local/etc/php/conf.d/pecl-imagick.ini && \
#     echo "extension=imap.so" > /usr/local/etc/php/conf.d/imap.ini

# Configure version constraints
ENV PHP_ENABLE_XDEBUG=0 \
    PATH=/app:/app/vendor/bin:/root/.composer/vendor/bin:$PATH \
    TERM=linux \
    VERSION_PRESTISSIMO_PLUGIN=^0.3.7

# Install composer
RUN curl -sS https://getcomposer.org/installer | php -- \
        --filename=composer \
        --install-dir=/usr/local/bin && \
        echo "alias composer='composer'" >> /root/.bashrc && \
        composer

# Install github personal token
RUN git config --global url."https://{GITHUB_API_TOKEN}:@github.com/".insteadOf "https://github.com/"

# Add configuration files
COPY ./docker/php/dockerconf/ /

WORKDIR /app

ENTRYPOINT ["docker-php-entrypoint"]

CMD ["/bin/bash", "./docker/php/startup.sh"]