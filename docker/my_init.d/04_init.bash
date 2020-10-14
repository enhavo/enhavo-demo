#!/usr/bin/env bash

cd /var/www/current

echo "init application"

bin/console doctrine:migrations:migrate -n
bin/console doctrine:fixtures:load -n
bin/console enhavo:init
