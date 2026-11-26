FROM php:8.3-apache

# .htaccess needs mod_rewrite; CORS block needs mod_headers
RUN a2enmod rewrite headers

# Allow .htaccess in the docroot to take effect
RUN sed -ri 's/AllowOverride None/AllowOverride All/g' /etc/apache2/apache2.conf

COPY . /var/www/html/

# API response cache is written by PHP at runtime
RUN mkdir -p /var/www/html/cache/api \
    && chown -R www-data:www-data /var/www/html/cache
