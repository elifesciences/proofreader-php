FROM php:7.1-cli
RUN curl https://getcomposer.org/download/1.5.2/composer.phar -o /usr/local/bin/composer && chmod +x /usr/local/bin/composer
COPY . /opt/proofreader
WORKDIR /opt/proofreader
RUN composer install
CMD bin/proofreader
