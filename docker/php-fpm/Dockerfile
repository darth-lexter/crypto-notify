FROM php:8.2-fpm

# Install php extensions
RUN apt-get update && apt-get install -y libmagickwand-dev --no-install-recommends && \
    apt-get install -y libcurl4-openssl-dev pkg-config libssl-dev && \
    rm -rf /var/lib/apt/lists/*
ADD https://github.com/mlocati/docker-php-extension-installer/releases/latest/download/install-php-extensions /usr/local/bin/
RUN chmod +x /usr/local/bin/install-php-extensions && sync
RUN install-php-extensions zip && docker-php-ext-enable zip

RUN docker-php-ext-install pdo pdo_mysql gd \
    && pecl install xdebug && docker-php-ext-enable xdebug

# Install composer
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

# PHP configs
COPY php.ini /usr/local/etc/php/conf.d/php.ini

# Add user
WORKDIR /var/www/code

RUN groupadd -g 1000 www
RUN useradd -u 1000 -ms /bin/bash -g www www

USER www

# Aliases
RUN echo "alias sf='php bin/console'" >> ~/.bashrc
RUN echo "alias a='php artisan'" >> ~/.bashrc

# Expose port 9000 and start php-fpm server
EXPOSE 9000
CMD ["php-fpm"]
