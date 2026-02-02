FROM php:5.5-apache

# Required extensions for old apps
RUN docker-php-ext-install mysql mysqli pdo pdo_mysql

# Apache rewrite (common in legacy apps)
RUN a2enmod rewrite

# Match legacy php.ini behavior
RUN echo "shot_open_tag=On" >> /usr/local/etc/php/php.ini \
 && echo "register_globals=Off" >> /usr/local/etc/php/php.ini \
 && echo "magic_quotes_gpc=Off" >> /usr/local/etc/php/php.ini

COPY src/ /var/www/html

