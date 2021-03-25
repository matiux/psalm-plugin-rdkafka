FROM matiux/php:7.3.6-fpm-alpine3.10-dev

USER root

RUN apk update \
    && apk add \
    #--virtual .ext-build-deps \
    $PHPIZE_DEPS \
    librdkafka \
    librdkafka-dev \
    && pecl install \
    rdkafka \
    && docker-php-ext-enable \
    rdkafka \
    #&& apk del .ext-build-deps \
    && pecl clear-cache \
    #&& docker-php-source delete

RUN rm /usr/local/etc/php/conf.d/docker-php-memlimit.ini
ADD conf/php.ini /usr/local/etc/php

COPY conf/xdebug-starter.sh /usr/local/bin/xdebug-starter
RUN chmod +x /usr/local/bin/xdebug-starter
RUN /usr/local/bin/xdebug-starter

RUN composer self-update --no-plugins

USER utente

RUN echo 'alias test="vendor/bin/phpunit"' >> /home/utente/.bashrc \
    echo 'alias test="vendor/bin/phpunit"' >> /home/utente/.zshrc
