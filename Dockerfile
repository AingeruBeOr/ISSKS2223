FROM php:7.2.2-apache
RUN docker-php-ext-install mysqli
# "/var/www" direktorioaren jabea "www-data"-ra aldatu da direktorio horretan log-ak idatzi ahal izateko.  
RUN chown -R www-data:www-data /var/www
#RUN mkdir /var/www/html
RUN chown -R www-data:www-data /var/www/html/