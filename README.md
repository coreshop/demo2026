# CoreShop 2026 Demo

Demo shop for [CoreShop](https://www.coreshop.com) 2026.x on Pimcore 2026: the Pimcore skeleton plus
CoreShop with its demo data (`coreshop:install:demo`) and Pimcore Studio. There is no classic (ExtJS)
admin on this line. The Pimcore 12 / CoreShop 5.1 line lives in [coreshop/demo5](https://github.com/coreshop/demo5).

Live: https://demo2026.coreshop.org (Studio: `/pimcore-studio`).

## Run locally

Requirements: Docker with Compose v2.24 or newer and the running cors dev traefik (network
`cors_dev`, host names `*.localhost`). The images come from `ghcr.io/cors-gmbh/pimcore-docker`
(PHP 8.4); the repository is bind-mounted, nothing is built locally.

```bash
cp .env .env.local
# fill in PIMCORE_ENCRYPTION_SECRET, PIMCORE_INSTANCE_IDENTIFIER and PIMCORE_PRODUCT_KEY in .env.local
docker compose up -d
docker compose logs -f install   # wait for "CoreShop demo installed"
```

The first start runs the one-shot `install` service (`.docker/php/docker-dev-install.sh`): it
installs the composer dependencies when `vendor/` is missing, waits for the database and runs
`.docker/php/docker-install.sh`. The php, php-debug and supervisord containers start after it has
finished. Later starts detect the existing installation and skip it; `docker compose down -v` gives
you a fresh shop.

| URL | Login |
|---|---|
| https://coreshop2026-demo.localhost | shop |
| https://coreshop2026-demo.localhost/pimcore-studio | `admin` / `coreshop` (Studio; `PIMCORE_INSTALL_ADMIN_USERNAME` / `PIMCORE_INSTALL_ADMIN_PASSWORD`) |

The first start installs Pimcore, CoreShop and the demo data in one go through the Pimcore 2026
install profile `App\InstallProfile\DemoInstallProfile` (`src/InstallProfile`): it registers the
Studio, Generic Data Index, Application Logger, SEO and Custom Reports bundles and runs
`coreshop:install`, `generic-data-index:update:index -r` and `coreshop:install:demo` as post-install
commands. The container entrypoint waits for the database and calls `.docker/php/docker-install.sh`,
which skips the installation when the database already contains a Pimcore installation. The same
thing by hand:

```bash
vendor/bin/pimcore-install --install-profile 'App\InstallProfile\DemoInstallProfile' --skip-validation --no-interaction
```

The installer reads everything from the environment (`.env` plus the optional `.env.local`, both passed
to every PHP container; no `.env.local` is written):

| Variable | Purpose |
|---|---|
| `DATABASE_URL` | Doctrine DSN of the app database (built from `DATABASE_*` in `.env` by Symfony; docker compose sets it explicitly for the local stack) |
| `PIMCORE_OPENSEARCH_DSN` | OpenSearch endpoint; docker compose sets `http://os:9200` for the local stack (the dev config alone is not enough: `pimcore-install` re-reads `.env` with override and runs as `prod`) |
| `PIMCORE_ENCRYPTION_SECRET` | defuse key for `pimcore.encryption.secret` (`vendor/bin/generate-defuse-key`) |
| `PIMCORE_INSTANCE_IDENTIFIER` | Pimcore instance identifier |
| `PIMCORE_PRODUCT_KEY` | Pimcore product key, **required**: Pimcore 2026 refuses to boot with a secret but without a registered key |
| `PIMCORE_INSTALL_ADMIN_USERNAME`, `PIMCORE_INSTALL_ADMIN_PASSWORD` | admin user created by the installer, default `admin` / `coreshop` in the local stack |

The local stack runs `APP_ENV=dev` (dev config points the OpenSearch client to the `os` container);
in Kubernetes the variables come from the `pimcore` secret of the manifest repository.

### Studio frontend builds

The CoreShop bundles ship their Studio frontend as a zip in `Resources/build-dist`, which Pimcore's
`StudioBuildCacheWarmer` extracts into `Resources/public/studio` on `cache:warmup`. The extractor
requires the parent directory `Resources/public` to exist, and CoreShop 2026.2.1 does not ship it
for 21 of its 22 bundles with a build, so Studio answers 500 ("Cannot extract the Studio frontend
build archive"). The Dockerfile and the install script create the missing directories before the
warmup as a workaround; remove it once CoreShop ships the directories (or the extractor creates them).

## CI/CD

| Workflow | Trigger | What it does |
|---|---|---|
| `build.yml` | push to `main`, PR | builds the images `php-alpine-fpm`, `php-alpine-supervisord`, `nginx`; on `main` pushes them to `ghcr.io/coreshop/demo2026/{php-fpm,php-supervisord,nginx}` tagged `main-<sha>` and `latest` and bumps the tags in [coreshop/demo2026-manifest](https://github.com/coreshop/demo2026-manifest) |
| `static.yml` | push, PR | `composer validate`, YAML/Twig/container lint, phpstan level 1 on `src/` |
| `composer-update.yml` | daily 03:00, manual | `composer update` as a pull request |

Required secrets:

- `GITHUB_TOKEN` (automatic, `packages: write`): pushes the images to the GitHub Container Registry
- `GH_APP_ID`, `GH_APP_PRIVATE_KEY` (org secrets, already present): the coreshop GitHub App mints the token
  for the manifest push; the app must be installed on `coreshop/demo2026-manifest` with `contents: write`

No `COMPOSER_AUTH` is needed, every dependency comes from packagist.org.

The container packages are created private by GitHub on the first push; switch
`ghcr.io/coreshop/demo2026/*` to public once in the GitHub UI (Packages → package → settings), or keep them
private and let the cluster pull with the `ghcr-pull` secret described in the manifest repository.

Deployment itself happens from the manifest repository (Helm chart, synced by the cluster).

## License

CoreShop is licensed under the CoreShop Commercial License (CCL); the demo project code is MIT-style
skeleton code from Pimcore.
