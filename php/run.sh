#!/bin/bash

# Cron Environment Setup
chmod 644 /etc/crontab
crontab /etc/crontab
touch /var/log/cron.log
chmod 777 /var/log/cron.log
env >> /etc/environment
service cron start

# Copy xdebug config
# mv /usr/local/etc/php/config/xdebug.ini /usr/local/etc/php/conf.d/xdebug.ini

# Start supervisord and services
/usr/bin/supervisord -c /etc/supervisord.conf

chmod -R 777 /var/www/html/data

composer install --no-interaction --verbose
