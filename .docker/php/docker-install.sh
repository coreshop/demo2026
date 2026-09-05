#!/bin/sh
set -e

# The Pimcore install secrets come from the container environment (Kubernetes
# secret / docker compose .env), they are not part of the repository:
#   PIMCORE_INSTALL_ENCRYPTION_SECRET   defuse key for pimcore.encryption.secret
#   PIMCORE_INSTALL_INSTANCE_IDENTIFIER Pimcore instance identifier
#   PIMCORE_INSTALL_PRODUCT_KEY         Pimcore product key (optional for demos)
for var in PIMCORE_INSTALL_ENCRYPTION_SECRET PIMCORE_INSTALL_INSTANCE_IDENTIFIER; do
  if [ -z "$(printenv "$var")" ]; then
    echo "$var is not set" >&2
    exit 1
  fi
done

echo "Install Pimcore"
vendor/bin/pimcore-install --skip-database-config --no-interaction

rm -rf var/config/system.yml
rm -rf var/cache

touch /var/www/html/var/tmp/.pimcore_installed
