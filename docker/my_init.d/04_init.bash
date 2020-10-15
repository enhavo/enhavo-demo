#!/usr/bin/env bash

cd /var/www/current

echo "init application"

DB_HOST=$(php -r 'echo parse_url(getenv("DATABASE_URL"), PHP_URL_HOST);')
DB_PORT=$(php -r 'echo parse_url(getenv("DATABASE_URL"), PHP_URL_PORT);')

wait-for-it $DB_HOST:$DB_PORT

bin/console doctrine:migrations:migrate -n
bin/console doctrine:fixtures:load -n
bin/console enhavo:init
