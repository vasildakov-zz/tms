#!/bin/bash

chmod -R 777 /var/www/html/data

# Cron Environment Setup
chmod 644 /etc/crontab
crontab /etc/crontab
touch /var/log/cron.log
chmod 777 /var/log/cron.log
env >> /etc/environment
service cron start

# Start supervisord and services
/usr/bin/supervisord -c /etc/supervisord.conf