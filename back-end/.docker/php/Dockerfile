# Main Image

FROM php:8-zts-buster


# Author(s) Please add your name if you modified anything in this file

LABEL authors="Mostafa A. Hamid <info@manonworld.de>, "


# Main Home Directory

ENV HOME /root


# Update and Install Python

RUN apt-get update && apt-get install -y python3-minimal python3-dev python3-pip build-essential


# Dependencies

RUN apt-get install -y icu-devtools git unzip


# Install Composer for PHP applications

RUN php -r "copy('https://getcomposer.org/installer', 'composer-setup.php');"
RUN php composer-setup.php --install-dir=/usr/local/bin/ --filename=composer
RUN php -r "unlink('composer-setup.php');"


# Other Dependencies

RUN apt-get install -y g++ gcc libxslt-dev autoconf make automake libtool linux-headers-amd64 libz-dev wget


# Install Protobuf and GRPC

ARG PROTOBUF_VERSION=3.17.1
RUN pecl install protobuf-${PROTOBUF_VERSION}
RUN pecl install grpc
RUN docker-php-ext-enable grpc


# Adding basic application libraries and enabling it into PHP engine

RUN docker-php-ext-install \
    intl pcntl xsl \
    soap pdo pdo_mysql 

# Dev PHP Extensions (Remove in Prod)

RUN pecl install xdebug http


RUN apt-get install \
    libmcrypt-dev git \
    && docker-php-ext-configure intl


# Add Redis support

ARG PHPREDIS_VERSION=5.3.4
ARG REDIS_URL=https://github.com/phpredis/phpredis/archive/${PHPREDIS_VERSION}.tar.gz
RUN mkdir -p /usr/src/php/ext/redis \
    && curl -L ${REDIS_URL} | tar xvz -C /usr/src/php/ext/redis --strip 1 \
    && echo 'redis' >> /usr/src/php-available-exts \
    && docker-php-ext-install redis


# PHP Configuration

COPY ./back-end/.docker/php/php.ini /usr/local/etc/php/php.ini
COPY ./back-end/.docker/php/php-fpm-pool.conf 	/usr/local/etc/php/pool.d/www.conf


# Main User

USER root


# Supervisor

RUN apt-get install -y supervisor && rm  -rf /tmp/*
RUN apt-get install -y openrc
RUN mkdir -p /run/openrc/
RUN touch /run/openrc/softlevel
COPY ./back-end/.docker/php/supervisord /etc/init.d/supervisord


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

RUN ["supervisord"]


# Download and install Symfony CLI (dev only)

RUN wget https://get.symfony.com/cli/installer -O - | bash; \
    mv /root/.symfony/bin/symfony /usr/local/bin/symfony;


# Grant executable permission (dev only)

RUN chmod a+x /usr/local/bin/symfony


# Install TLS Support for Symfony

RUN symfony server:ca:install


# Start the test domain (Change testdomain to whatever name you want)

RUN symfony proxy:domain:attach testdomain


# Sets the default Work Directory

WORKDIR /var/www/html


# Copy the Application

COPY ./back-end/app /var/www/html


# Start the Server

RUN ["symfony", "server:start", "-d"]


# Health Check

HEALTHCHECK --interval=3s --timeout=6000s \
    CMD symfony server:start -d && curl -f https://localhost:8000/TestDomain || exit 1
