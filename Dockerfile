ARG image_tag=latest
FROM elifesciences/proofreader-php_composer:${image_tag} AS build
FROM php:7.0.29-cli-alpine

ENV PROJECT_FOLDER=/srv/proofreader-php
RUN mkdir ${PROJECT_FOLDER}
WORKDIR ${PROJECT_FOLDER}

COPY bin/ bin/
COPY --from=build /app/vendor/ vendor/
