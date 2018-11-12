FROM php:7.0-apache
RUN docker-php-ext-install pecl \
    && pecl install Oauth \
    && docker-php-ext-enable Oauth
COPY /Applications/MAMP/htdocs/postier/ /var/www/html
EXPOSE 80
