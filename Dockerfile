FROM php:8.1-fpm

# Argumentos (Usuário)
# ARG user=thiago
# ARG uid=1000

# Instalando extensões do sistema (libs)
RUN apt-get update && apt-get install -y \
    git \
    curl \
    libpng-dev \
    libonig-dev \
    libxml2-dev \
    libzip-dev zip unzip

# Limpando o cache
RUN apt-get clean && rm -rf /var/lib/apt/lists/*

# Instalando extensões do PHP
RUN docker-php-ext-install pdo_mysql mbstring exif pcntl bcmath gd sockets zip

# Pegando o composer e passando para o container
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

# Criar usuário do sistema (com o usuário que foi pego lá em cima)
# RUN useradd -G www-data,root -u $uid -d /home/$user $user
RUN mkdir -p /home/$user/.composer && \
    chown -R $user:$user /home/$user

# Instalando Redis
RUN pecl install -o -f redis \
    && rm -rf /tmp/pear \
    && docker-php-ext-enable redis

# Setando o diretório de trabalho
WORKDIR /var/www

# Copy custom configurations PHP
COPY docker/php/custom.ini /usr/local/etc/php/conf.d/custom.ini

# Indicando qual usuário estamos utilizando para acessar esse container
USER $user
