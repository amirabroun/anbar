# PHP 8.2 FPM image for the anbar stack (nginx + php-fpm)
FROM php:8.2.6-fpm

# Base system packages
RUN apt-get update && \
    apt-get install -y --no-install-recommends curl wget zip unzip g++ nano && \
    apt-get clean && rm -rf /var/lib/apt/lists/*

# Libraries needed by the PHP extensions below
RUN apt-get update && \
    apt-get install -y --no-install-recommends \
        libfreetype6-dev libjpeg-dev libpng-dev libonig-dev libxml2-dev \
        libzip-dev libldap2-dev libwebp-dev libcurl4-openssl-dev libssl-dev \
        libxslt-dev libicu-dev && \
    apt-get clean && rm -rf /var/lib/apt/lists/*

# PHP extensions needed by anbar (pdo_mysql, mbstring, gd, ...)
RUN docker-php-ext-install pdo pdo_mysql mbstring gd zip intl exif bcmath opcache sockets

# Larger uploads
RUN echo "post_max_size=200M" >> /usr/local/etc/php/conf.d/uploads.ini && \
    echo "upload_max_filesize=200M" >> /usr/local/etc/php/conf.d/uploads.ini

# anbar: bootstrap core.php on every request (mimics Apache's auto_prepend_file in .htaccess)
RUN echo "auto_prepend_file=/usr/share/nginx/www/core.php" > /usr/local/etc/php/conf.d/anbar.ini && \
    echo 'include_path=".:/usr/share/nginx/www:/usr/local/lib/php"' >> /usr/local/etc/php/conf.d/anbar.ini

# Create a group and user to run the application
RUN groupadd -g 1000 www && \
    useradd -u 1000 -ms /bin/bash -g www www

WORKDIR /usr/share/nginx/www

COPY --chown=www:www . .

USER www

EXPOSE 9000

CMD [ "php-fpm" ]
