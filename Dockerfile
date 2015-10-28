FROM php:5.6

RUN apt-get update && apt-get install -y git zlib1g-dev && rm -rf /var/lib/apt/lists/*
RUN docker-php-ext-install zip

RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin
RUN composer.phar global require psy/psysh:~0.5

COPY files/entrypoint.sh /entrypoint.sh

ENTRYPOINT ["/entrypoint.sh"]
