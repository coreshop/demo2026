#!/bin/sh
set -e

# first arg is `-f` or `--some-option`
if [ "${1#-}" != "$1" ]; then
  set -- php-fpm "$@"
fi

/usr/local/bin/wait_db
/usr/local/bin/install
bin/console coreshop:install
COMPOSER_MEMORY_LIMIT=-1 composer dump-autoload --classmap-authoritative --optimize
bin/console coreshop:install:demo

exec docker-php-entrypoint "$@"
