FROM elifesciences/php_cli

USER elife
RUN mkdir -p /srv/proofreader
WORKDIR /srv/proofreader
COPY --chown=elife:elife composer.json /srv/proofreader/
RUN composer install --classmap-authoritative --no-dev
COPY --chown=elife:elife . /srv/proofreader

USER www-data
CMD bin/proofreader
