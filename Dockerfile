FROM php:8.0-fpm
COPY composer.json composer.lock /var/www/


WORKDIR /var/www

RUN apt-get update && apt-get install -y \
    build-essential \
    libpng-dev \
    libjpeg62-turbo-dev \
    libfreetype6-dev \
    libzip-dev \
    locales \
    zip \
    jpegoptim optipng pngquant gifsicle \
    vim \
    unzip \
    wget \
    git \
    curl


RUN apt-get clean && rm -rf /var/lib/apt/lists/*

RUN docker-php-ext-install pdo_mysql zip exif bcmath pcntl

#RUN curl -o- https://raw.githubusercontent.com/nvm-sh/nvm/v0.37.0/install.sh | bash && . /root/.nvm/nvm.sh && nvm install node

RUN wget https://nodejs.org/dist/v15.5.1/node-v15.5.1-linux-x64.tar.xz && tar xf node-v15.5.1-linux-x64.tar.xz && cp -r node-v15.5.1-linux-x64/* /usr/local/

RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

# RUN groupadd -g 1000 www
# RUN useradd -u 1000 -ms /bin/bash -g www-data www-data

RUN node -v && sleep 10

COPY . /var/www

WORKDIR /var/www
RUN composer install && npm run prod

COPY --chown=www-data:www-data . /var/www

COPY .test_env_docker /var/www/.env

RUN chown -R www-data:www-data /var/www/bootstrap /var/www/storage
USER www-data

EXPOSE 9000

CMD php artisan migrate
CMD php artisan route:clear
CMD php artisan config:clear
CMD php artisan cache:clear

CMD ["php-fpm"]
