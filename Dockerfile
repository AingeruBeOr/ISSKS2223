FROM php:7.2.2-apache
RUN docker-php-ext-install mysqli
# "/var/www" direktorioaren jabea "www-data"-ra aldatu da direktorio horretan log-ak idatzi ahal izateko.  
RUN chown www-data:www-data /var/www 