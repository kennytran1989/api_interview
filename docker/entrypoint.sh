#!/bin/sh
cp '.env.example' '.env'
composer install --ignore-platform-reqs
php artisan migrate:refresh --seed
php artisan l5-swagger:generate
service cron start
php-fpm
exec "$@"