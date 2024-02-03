FROM php:8.1-fpm

RUN apt-get update && apt-get install -y \
        libzip-dev \
        libfreetype6-dev \
        libjpeg62-turbo-dev \
        libmcrypt-dev \
        libpng-dev \
        libicu-dev \
        libpq-dev \
        libxpm-dev \
        libvpx-dev \
        libxml2-dev \
        git \
        curl \
        vim \
        nano \
        postgresql-client \
        nodejs \
        npm \
        yarn \
    #&& pecl install -o -f redis \
    && pecl install mcrypt \
    && pecl install xdebug-3.2.0  \
    && docker-php-ext-install -j$(nproc) gd \
    && docker-php-ext-install -j$(nproc) soap \
    && docker-php-ext-install -j$(nproc) intl \
    && docker-php-ext-install -j$(nproc) zip \
    && docker-php-ext-install -j$(nproc) pgsql \
    && docker-php-ext-install -j$(nproc) pdo_pgsql \
    && docker-php-ext-install -j$(nproc) exif \
#    && docker-php-ext-enable redis \
    && docker-php-ext-enable mcrypt \
    && docker-php-ext-configure gd

# Install composer and add its bin to the PATH.
RUN curl -s http://getcomposer.org/installer | php && \
    echo "export PATH=${PATH}:/var/www/vendor/bin" >> ~/.bashrc && \
    mv composer.phar /usr/local/bin/composer
