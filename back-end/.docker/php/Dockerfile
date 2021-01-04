# Main Image

FROM php:7.4-zts-alpine


# Author(s) Please add your name if you modified anything in this file

LABEL authors="Mostafa A. Hamid <info@manonworld.de>, "


# Main Home Directory

ENV HOME /root


# Update and Install Python

RUN apk add --update python3 python3-dev py-pip build-base


# ICU Dev

RUN apk add --no-cache icu-dev



# Install Composer for PHP applications

RUN apk add composer


# XSLT Dev GCC and g++

RUN apk add --update --no-cache g++ gcc libxslt-dev autoconf make automake libtool linux-headers


# Install Protobuf

ARG PROTOBUF_VERSION=3.12.2
RUN pecl install protobuf-${PROTOBUF_VERSION}
RUN pecl install grpc
RUN docker-php-ext-enable grpc


# Adding basic application libraries and enabling it into PHP engine

RUN docker-php-ext-install \
    intl pcntl xsl \
    soap pdo pdo_mysql 

# Dev PHP Extensions (Remove in Prod)

RUN pecl install xdebug parallel http
RUN pear install PHP_CodeSniffer


RUN apk upgrade --update && apk add \
    libmcrypt-dev git \
    && docker-php-ext-configure intl


# Add Redis support

ARG PHPREDIS_VERSION=5.2.2
ARG REDIS_URL=https://github.com/phpredis/phpredis/archive/${PHPREDIS_VERSION}.tar.gz
RUN mkdir -p /usr/src/php/ext/redis \
    && curl -L ${REDIS_URL} | tar xvz -C /usr/src/php/ext/redis --strip 1 \
    && echo 'redis' >> /usr/src/php-available-exts \
    && docker-php-ext-install redis


# User Management

RUN sed -i "s/999/99/" /etc/group
RUN adduser dev -g root --disabled-password /home/root
RUN passwd -d root
RUN echo "root ALL=(ALL) ALL" > /etc/sudoers


# PHP Configuration

COPY php.ini /usr/local/etc/php/php.ini
COPY php-fpm-pool.conf 	/usr/local/etc/php/pool.d/www.conf


# Main User

USER root


# Supervisor

RUN apk add --update supervisor && rm  -rf /tmp/* /var/cache/apk/*
RUN apk add openrc --no-cache
RUN mkdir -p /run/openrc/
RUN touch /run/openrc/softlevel
COPY supervisord /etc/init.d/supervisord
RUN mkdir /etc/supervisor
RUN echo_supervisord_conf >  /etc/supervisor/supervisord.conf


# Expose PHP-FPM Port

EXPOSE 9000


# Expose Port 8888 for TCP Connections

EXPOSE 8888


# Expose the development server

EXPOSE 8000


# Expose the proxy port

EXPOSE 7080


# Expose secure TLS

EXPOSE 443


# Starting the Supervisor

RUN ["supervisord", "-c" ,"/etc/supervisord.conf"]


# Installing bash

RUN apk add bash


# Download and install Symfony CLI

RUN wget https://get.symfony.com/cli/installer -O - | bash; \
    mv /root/.symfony/bin/symfony /usr/local/bin/symfony;


# Grant executable permission (dev only)

RUN chmod 777 /usr/local/bin/symfony


# User Management

RUN adduser _www -g root --disabled-password /home/root
RUN passwd -d _www
RUN echo "_www ALL=(ALL) ALL" > /etc/sudoers


# Install TLS Support for Symfony

RUN /usr/local/bin/symfony server:ca:install


# Start the test domain (Change testdomain to whatever name you want)

RUN /usr/local/bin/symfony proxy:domain:attach testdomain


# Start the application server 
# Development Server
# You may consider Apache or Nginx for Production

RUN /usr/local/bin/symfony server:start -d


# Sets the default Work Directory

WORKDIR /var/www/html


# Start the Logger

CMD ["symfony", "server:log"]