ARG image_tag=latest
ARG php_version
FROM elifesciences/proofreader-php_composer:${image_tag} AS build
FROM php:${php_version}-cli-alpine

RUN apk add --no-cache bash

WORKDIR /srv/proofreader-php

COPY bin/ bin/
COPY .php_cs .php_cs
COPY --from=build /app/vendor/ vendor/

USER www-data
