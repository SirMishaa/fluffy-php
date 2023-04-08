FROM php:8.2-fpm-alpine
ENV UID=1000
ENV GID=1000
ENV USER=www

WORKDIR /opt/app
RUN apk add --no-cache $PHPIZE_DEPS linux-headers \
    && pecl install xdebug-3.2.1 \
    && docker-php-ext-enable xdebug \
    && echo "xdebug.mode=develop,debug" >> /usr/local/etc/php/conf.d/docker-php-ext-xdebug.ini \
    && echo "xdebug.client_host=host.docker.internal" >> /usr/local/etc/php/conf.d/docker-php-ext-xdebug.ini \
    && cp /usr/local/etc/php/php.ini-development /usr/local/etc/php/php.ini \
    && curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer \
    && addgroup --gid "$GID" "$USER" \
    && adduser --disabled-password --gecos "" --ingroup "$USER" --no-create-home --uid "$UID" "$USER"

# Avoid permission issues by using same UID/GID as host machine
COPY --chown=www:www . /opt/app
USER www

# Default configuration for PHP-FPM official image
EXPOSE 9000
ENTRYPOINT ["docker-php-entrypoint"]
CMD ["php-fpm"]
