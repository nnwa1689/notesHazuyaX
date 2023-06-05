#!/bin/bash
set -e

echo "Deployment started ..."

# Enter maintenance mode or return true
# if already is in maintenance mode
# (php artisan down) || true

# Pull the latest version of the app
sudo git pull origin production

# Install composer dependencies
sudo composer install --no-dev --no-interaction --prefer-dist --optimize-autoloader

# Clear the old cache
php artisan clear-compiled

# Recreate cache
php artisan optimize

php artisan cache:clear
php artisan config:cache
php artisan view:clear

# Compile npm assets
# npm run prod

# Run database migrations
# php artisan migrate --force

# Exit maintenance mode
# php artisan up

echo "Deployment finished!"
