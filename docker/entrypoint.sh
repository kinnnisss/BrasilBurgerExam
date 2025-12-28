#!/bin/sh
set -e

mkdir -p /var/www/html/var/cache /var/www/html/var/log
chown -R www-data:www-data /var/www/html/var
chmod -R 775 /var/www/html/var
rm -rf /var/www/html/var/cache/*

su -s /bin/sh www-data -c "php /var/www/html/bin/console cache:clear --env=prod || true"
su -s /bin/sh www-data -c "php /var/www/html/bin/console cache:warmup --env=prod || true"

exec apache2-foreground
