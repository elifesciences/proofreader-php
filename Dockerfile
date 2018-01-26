FROM elifesciences/php_cli

USER elife
RUN mkdir -p /srv/proofreader-php
WORKDIR /srv/proofreader-php
COPY --chown=elife:elife composer.json /srv/proofreader-php/
RUN composer install --classmap-authoritative --no-dev
COPY --chown=elife:elife . /srv/proofreader-php

USER www-data
CMD bin/proofreader
