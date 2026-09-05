#!/bin/sh
set -e

# Installs Pimcore, CoreShop and the demo data through the install profile
# App\InstallProfile\DemoInstallProfile (see src/InstallProfile). Runs once: when the
# database already holds a Pimcore installation the script exits without changes.
#
# Everything is read from the environment (Kubernetes secret / docker compose .env):
#   DATABASE_URL                     Doctrine DSN of the app database (from .env / the environment)
#   PIMCORE_ENCRYPTION_SECRET        defuse key for pimcore.encryption.secret
#   PIMCORE_INSTANCE_IDENTIFIER      Pimcore instance identifier
#   PIMCORE_PRODUCT_KEY              Pimcore product key
#   PIMCORE_INSTALL_ADMIN_USERNAME   admin user to create
#   PIMCORE_INSTALL_ADMIN_PASSWORD   password of that user
for var in PIMCORE_ENCRYPTION_SECRET PIMCORE_INSTANCE_IDENTIFIER PIMCORE_PRODUCT_KEY PIMCORE_INSTALL_ADMIN_USERNAME PIMCORE_INSTALL_ADMIN_PASSWORD; do
  if [ -z "$(printenv "$var")" ]; then
    echo "$var is not set" >&2
    exit 1
  fi
done

if php -r 'require "vendor/autoload.php"; (new Symfony\Component\Dotenv\Dotenv())->bootEnv(".env"); $u = parse_url($_ENV["DATABASE_URL"] ?? ""); $pdo = new PDO(sprintf("mysql:host=%s;port=%d;dbname=%s", $u["host"], $u["port"] ?? 3306, ltrim($u["path"], "/")), $u["user"], $u["pass"]); exit($pdo->query("SHOW TABLES LIKE \"users\"")->rowCount() > 0 ? 0 : 1);' 2>/dev/null; then
  echo "Pimcore is already installed, skipping installation"
  exit 0
fi

export PIMCORE_ADMIN_USER="$PIMCORE_INSTALL_ADMIN_USERNAME"
export PIMCORE_ADMIN_PASSWORD="$PIMCORE_INSTALL_ADMIN_PASSWORD"

echo "Install Pimcore, CoreShop and the demo data"
vendor/bin/pimcore-install \
  --install-profile 'App\InstallProfile\DemoInstallProfile' \
  --skip-validation \
  --no-interaction

rm -rf var/cache
