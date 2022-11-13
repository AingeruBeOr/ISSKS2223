FROM php:7.2.2-apache
RUN docker-php-ext-install mysqli
# "/var/log/apache2/" direktorioaren jabe www-data izateko:
RUN chown www-data:www-data /var/log/apache2/