FROM php:7.3-fpm

# WORKDIR /var/www
# Install dependencies
RUN apt-get update && apt-get install -y \
    cron \
    build-essential \
    libpng-dev \
    libjpeg62-turbo-dev \
    libfreetype6-dev \
    locales \
    zip \
    libmcrypt-dev\
    jpegoptim optipng pngquant gifsicle \
    vim \
    unzip \
    git \
    curl \
    libzip-dev

# Clear cache
RUN apt-get clean && rm -rf /var/lib/apt/lists/*

# Install extensions
RUN docker-php-ext-install pdo_mysql mbstring mysqli zip exif pcntl
RUN docker-php-ext-configure gd --with-gd --with-freetype-dir=/usr/include/ --with-jpeg-dir=/usr/include/ --with-png-dir=/usr/include/
RUN docker-php-ext-install gd

# Install PHP Composer
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer
# Copy crontab file to the cron.d directory

# COPY ./docker/php-server/crontab /etc/cron.d/crontab
RUN echo "* * * * * /usr/local/bin/php /var/www/artisan schedule:run >> /var/log/cron.log 2>&1" >> /etc/cron.d/product-cron

# Give execution rights on the cron job
RUN chmod 0644 /etc/cron.d/product-cron

# Apply cron job

RUN crontab /etc/cron.d/product-cron
# RUN service cron start
# Create the log file to be able to run tail

RUN touch /var/log/cron.log
# Expose port 9000 and start php-fpm server
# CMD ["cron && php-fpm"]
CMD bash -c "cron && php-fpm"
EXPOSE 9000
