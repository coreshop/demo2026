#!/bin/sh
set -e

export PIMCORE_INSTALL_ENCRYPTION_SECRET=***REMOVED***
export PIMCORE_INSTALL_INSTANCE_IDENTIFIER=***REMOVED***
export PIMCORE_INSTALL_PRODUCT_KEY=***REMOVED***

echo "Install Pimcore"
vendor/bin/pimcore-install --skip-database-config --no-interaction

rm -rf var/config/system.yml
rm -rf var/cache

touch /var/www/html/var/tmp/.pimcore_installed
