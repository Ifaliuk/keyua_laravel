FROM php:7.4.14-apache

RUN apt-get update \
    && apt-get install -y vim \
    && apt-get install -y mc

RUN docker-php-ext-install pdo pdo_mysql

RUN pecl install redis-5.1.1 \
    && pecl install xdebug-2.9.8 \
    && docker-php-ext-enable redis xdebug

#Install composer
RUN mkdir /tmp/composer_install \
    && cd /tmp/composer_install \
    && php -r "copy('https://getcomposer.org/installer', 'composer-setup.php');" \
    && php -r "if (hash_file('sha384', 'composer-setup.php') === '756890a4488ce9024fc62c56153228907f1545c228516cbf63f885e036d37e9a59d27d63f46af1d4d07ee0f76181c7d3') { echo 'Installer verified'; } else { echo 'Installer corrupt'; unlink('composer-setup.php'); } echo PHP_EOL;" \
    && php composer-setup.php \
    && php -r "unlink('composer-setup.php');" \
    && mv composer.phar /usr/local/bin/composer \
    && rm -rf /tmp/composer_install \
    && composer self-update --1

RUN a2enmod rewrite
