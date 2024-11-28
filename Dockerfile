# Use a imagem PHP base
FROM php:8.2-apache

# Instalar as dependências necessárias
RUN apt-get update && apt-get install -y \
    libpng-dev \
    libjpeg-dev \
    libfreetype6-dev \
    git \
    curl \
    unzip \
    && rm -rf /var/lib/apt/lists/*


# Instalar Xdebug via PECL
RUN pecl install xdebug && docker-php-ext-enable xdebug

# Instalar as extensões PHP necessárias (pdo e pdo_mysql)
RUN docker-php-ext-install pdo pdo_mysql

# Habilitar mod_rewrite no Apache
RUN a2enmod rewrite

# Configuração do Xdebug no php.ini
RUN echo "zend_extension=$(find /usr/local/lib/php/extensions/ -name 'xdebug.so')" > /usr/local/etc/php/conf.d/20-xdebug.ini \
    && echo "xdebug.mode=debug" >> /usr/local/etc/php/conf.d/20-xdebug.ini \
    && echo "xdebug.start_with_request=yes" >> /usr/local/etc/php/conf.d/20-xdebug.ini \
    && echo "xdebug.client_host=host.docker.internal" >> /usr/local/etc/php/conf.d/20-xdebug.ini \
    && echo "xdebug.client_port=9003" >> /usr/local/etc/php/conf.d/20-xdebug.ini \
    && echo "xdebug.log_level=0" >> /usr/local/etc/php/conf.d/20-xdebug.ini

# Copiar o código da aplicação para o contêiner
WORKDIR /var/www/html
COPY . .

# Expor a porta 80 para acessar o serviço HTTP
EXPOSE 80

# Iniciar o Apache no container
CMD ["apache2-foreground"]