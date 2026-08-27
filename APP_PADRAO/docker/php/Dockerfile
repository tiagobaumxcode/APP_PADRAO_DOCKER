FROM php:8.3-fpm

WORKDIR /var/www

# Instalar dependências do sistema e Node.js/NPM
RUN apt-get update && apt-get install -y \
    build-essential \
    libpng-dev \
    libjpeg62-turbo-dev \
    libfreetype6-dev \
    locales \
    zip \
    jpegoptim optipng pngquant gifsicle \
    vim \
    unzip \
    git \
    curl \
    libpq-dev \
    libzip-dev \
    nodejs \
    npm

RUN apt-get clean && rm -rf /var/lib/apt/lists/*

# Instalar extensões PHP necessárias para Laravel e PostgreSQL
RUN docker-php-ext-install pdo_pgsql pgsql zip exif pcntl
RUN docker-php-ext-configure gd --with-freetype=/usr/include/ --with-jpeg=/usr/include/
RUN docker-php-ext-install gd

# Instalar o Composer globalmente
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

# Instalar o Laravel Installer no PATH GLOBAL (/usr/local/bin)
RUN COMPOSER_HOME=/usr/local/share/composer composer global require "laravel/installer" && \
    ln -s /usr/local/share/composer/vendor/bin/laravel /usr/local/bin/laravel

# Criar usuário do sistema
ARG uid=1000
ARG user=laravel
RUN useradd -G www-data,root -u $uid -d /home/$user $user
RUN mkdir -p /home/$user/.composer && \
    chown -R $user:$user /home/$user /var/www

USER $user
