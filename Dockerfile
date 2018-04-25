ARG image_tag=latest
FROM elifesciences/proofreader-php_composer:${image_tag} AS build
FROM php:7.0.29-cli-alpine

RUN apk add --no-cache bash

WORKDIR /srv/proofreader-php

COPY bin/ bin/
COPY --from=build /app/vendor/ vendor/

USER www-data
