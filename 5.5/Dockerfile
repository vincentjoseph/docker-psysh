FROM php:5.5

ENV PHP_MANUAL_LANGUAGE en

RUN apt-get update && apt-get install -y git zlib1g-dev wget && rm -rf /var/lib/apt/lists/*
RUN docker-php-ext-install zip

# Use composer to install a stable version of PsySH
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin
RUN composer.phar global require psy/psysh:@stable
RUN mkdir -p $HOME/.local/share/psysh

COPY files/entrypoint.sh /entrypoint.sh

WORKDIR /root/.composer/vendor/bin

ENTRYPOINT ["/entrypoint.sh"]
