#!/bin/bash
echo "Running migrations..."
php artisan migrate --force

echo "Seeding database if empty..."
# Only seed if no users exist
php artisan tinker --execute="if(App\Models\User::count() == 0) { Artisan::call('db:seed', ['--force' => true]); }"

echo "Starting Nginx & PHP-FPM..."
service nginx start
php-fpm
