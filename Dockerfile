FROM enhavo/enhavo-app:7.2-apache-latest

COPY docker/etc/php/php.ini /etc/php/7.2/fpm/php.ini
COPY docker/etc/php/www.conf /etc/php/7.2/fpm/pool.d/www.conf
COPY docker/etc/php/php-cli.ini /etc/php/7.2/cli/php.ini
COPY docker/cron/crontab /var/spool/cron/crontabs/www-data
