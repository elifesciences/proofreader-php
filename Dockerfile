ARG image_tag
ARG php_version
FROM elifesciences/proofreader_composer:${image_tag} AS composer
FROM elifesciences/php_7.3_cli:${php_version}

USER elife
RUN mkdir -p /srv/proofreader-php
WORKDIR /srv/proofreader-php
COPY --from=composer --chown=elife:elife /app/vendor /srv/proofreader-php/vendor

COPY --chown=elife:elife bin/ bin/
COPY --chown=elife:elife sample/ sample/

USER root
RUN touch .php_cs.cache && chown www-data:www-data .php_cs.cache

USER www-data
CMD bin/proofreader
