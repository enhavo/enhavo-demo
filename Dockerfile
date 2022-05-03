FROM enhavo/enhavo-app:7.4-apache-0.3

WORKDIR /var/www/current

ENV APP_ENV prod

COPY .env .env
COPY assets assets
COPY bin bin
COPY config config
COPY fixtures fixtures
COPY migrations migrations
COPY public public
COPY src src
COPY templates templates
COPY translations translations
COPY composer.json composer.json
COPY composer.lock composer.lock
COPY package.json package.json
COPY symfony.lock symfony.lock
COPY tsconfig.json tsconfig.json
COPY webpack.config.js webpack.config.js
COPY yarn.lock yarn.lock
COPY docker/my_init.d/03_env.bash /etc/my_init.d/03_env.bash
COPY docker/my_init.d/04_init.bash /etc/my_init.d/04_init.bash

RUN apt-get install -y wait-for-it && \
    chmod 744 /etc/my_init.d/03_env.bash && \
	chmod 744 /etc/my_init.d/04_init.bash && \
    composer install && \
	yarn install && \
	yarn routes:dump && \
	yarn encore prod && \
 	chown www-data:www-data -R var
