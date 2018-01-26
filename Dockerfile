FROM elifesciences/php_cli

USER elife
RUN mkdir -p /srv/proofreader
WORKDIR /srv/proofreader
COPY composer.json composer.lock /srv/proofreader/
RUN composer install --classmap-authoritative --no-dev
COPY . /srv/proofreader

USER www-data
CMD bin/proofreader
