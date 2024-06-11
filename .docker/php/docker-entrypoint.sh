#!/bin/sh
set -e

# first arg is `-f` or `--some-option`
if [ "${1#-}" != "$1" ]; then
  set -- php-fpm "$@"
fi

/usr/local/bin/wait_db
/usr/local/bin/install
bin/console coreshop:install
bin/console pimcore:bundle:install PimcoreStudioBackendBundle --no-post-change-commands
bin/console pimcore:bundle:install PimcoreGenericDataIndexBundle --no-post-change-commands
bin/console pimcore:bundle:install PimcoreApplicationLoggerBundle --no-post-change-commands
bin/console coreshop:install:demo

exec docker-php-entrypoint "$@"
