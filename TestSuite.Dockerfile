FROM php:8.1

WORKDIR /var/www

# Requirements for composer to be able to download other packages
RUN apt update -y
RUN apt upgrade -y
RUN apt install -y libzip-dev

# Composer dependency
RUN docker-php-ext-install zip

# Download and install Composer, make globally available
RUN php -r "copy('https://getcomposer.org/installer', 'composer-setup.php');" \
    && php -r "if (hash_file('sha384', 'composer-setup.php') === '55ce33d7678c5a611085589f1f3ddf8b3c52d662cd01d4ba75c0ee0459970c2200a51f492d557530c71c15d8dba01eae') { echo 'Installer verified'; } else { echo 'Installer corrupt'; unlink('composer-setup.php'); } echo PHP_EOL;" \
    && php composer-setup.php \
    && php -r "unlink('composer-setup.php');" \
    && mv composer.phar /usr/local/bin/composer \
    && chmod +x /usr/local/bin/composer

# Pre-built config includes phpunit and our Kata namespace
COPY composer.json /var/www/composer.json

# Update dependencies (i.e. install phpunit)
RUN composer update

# Make phpunit globally available
RUN ln -s /var/www/vendor/bin/phpunit /usr/local/bin/phpunit
