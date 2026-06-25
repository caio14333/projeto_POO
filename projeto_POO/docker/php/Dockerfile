FROM php:8.3-fpm

# Dependências do sistema
RUN apt-get update && apt-get install -y \
    git \
    curl \
    libpng-dev \
    libonig-dev \
    libxml2-dev \
    zip \
    unzip \
    libzip-dev \
    default-mysql-client \
    && apt-get clean \
    && rm -rf /var/lib/apt/lists/*

# Extensões do PHP necessárias pro Laravel
RUN docker-php-ext-install pdo_mysql mbstring exif pcntl bcmath gd zip

# Instalar o Composer
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

WORKDIR /var/www/html

EXPOSE 9000

CMD ["php-fpm"]
