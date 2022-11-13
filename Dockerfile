FROM php:7.2.2-apache
RUN docker-php-ext-install mysqli
# https://fuubar.wordpress.com/2018/03/24/docker-y-los-permisos-en-directorios-compartidos/
# Direktorioaren jabe www-data izateko:
RUN usermod -u 1000 www-data
RUN groupmod -g 1000 www-data
RUN chown www-data:www-data /var/log/apache2/