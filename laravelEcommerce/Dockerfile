FROM php:8.2

# Instalar dependências PHP
RUN apt-get update && apt-get install -y \
    git unzip \
    && docker-php-ext-install pdo pdo_mysql

# Instalar Composer
COPY --from=composer:2 /usr/bin/composer /usr/bin/composer

WORKDIR /appLaravel

# Copiar o Laravel para dentro do container
COPY . .

# Instalar dependências
RUN composer install --no-interaction --prefer-dist

# Criar pasta de logs e permissões
RUN mkdir -p storage/framework/sessions storage/framework/views storage/framework/cache \
    && chmod -R 777 storage bootstrap/cache

EXPOSE 8001

# ENTRYPOINT executa o que precisa ANTES do servidor iniciar
ENTRYPOINT ["sh", "-c", "php artisan migrate --force && php artisan serve --host=0.0.0.0 --port=8001"]
