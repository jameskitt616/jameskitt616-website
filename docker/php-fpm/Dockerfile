FROM phpdockerio/php:8.1-fpm
WORKDIR "/application"

# Fix debconf warnings upon build
ARG DEBIAN_FRONTEND=noninteractive

# Install selected extensions and other stuff
RUN apt-get update \
    && apt-get -y --no-install-recommends install php8.1-common php8.1-mysql php-xdebug php8.1-gd php8.1-intl php8.1-soap php8.1-mongodb php8.1-mbstring php8.1-xml openjdk-8-jre \
    && apt-get clean; rm -rf /var/lib/apt/lists/* /tmp/* /var/tmp/* /usr/share/doc/*

RUN update-alternatives --set php /usr/bin/php8.1
