FROM php:8.1.1-apache-buster
COPY --from=composer:latest /usr/bin/composer /usr/local/bin/composer
WORKDIR /var/www/html
RUN apt update && apt -y install zip
COPY ./docker/php/default.conf /etc/apache2/sites-enabled/000-default.conf
# RUN chmod -R 777 /var/www/html/storage/logs/
#RUN apk --no-cache add pcre-dev ${PHPIZE_DEPS} \
#      && pecl install xdebug \
#      && docker-php-ext-enable xdebug \
#      && apk del pcre-dev ${PHPIZE_DEPS}
#RUN echo "xdebug.mode=coverage" >> /usr/local/etc/php/conf.d/docker-php-ext-xdebug.ini
