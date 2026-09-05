# CoreShop 5.1 Demo

Demo shop for [CoreShop](https://www.coreshop.com) 5.1 on Pimcore 12: the Pimcore skeleton plus
CoreShop with its demo data (`coreshop:install:demo`), the classic admin and Pimcore Studio.
The 2026 line lives in [coreshop/demo2026](https://github.com/coreshop/demo2026).

Live: https://demo5.coreshop.org (admin: `/admin`, Studio: `/pimcore-studio`).

## Run locally

Requirements: Docker. The images are built from `ghcr.io/cors-gmbh/pimcore-docker`.

```bash
cp .env .env.local            # adjust if needed
docker compose up -d
docker compose logs -f php    # wait for "Pimcore installed"; first start installs Pimcore, CoreShop and the demo data
```

Then open http://localhost (shop), http://localhost/admin (user `admin`, password from the
installer output) and http://localhost/pimcore-studio.

The install script `.docker/php/docker-install.sh` reads its secrets from the environment:

| Variable | Purpose |
|---|---|
| `PIMCORE_ENCRYPTION_SECRET` | defuse key for `pimcore.encryption.secret` (`vendor/bin/generate-defuse-key`) |
| `PIMCORE_INSTANCE_IDENTIFIER` | Pimcore instance identifier |
| `PIMCORE_PRODUCT_KEY` | Pimcore product key, optional for a demo |

Set them in `.env.local` for docker compose; in Kubernetes they come from the `pimcore` secret of
the manifest repository.

## CI/CD

| Workflow | Trigger | What it does |
|---|---|---|
| `build.yml` | push to `main`, PR | builds the images `php-alpine-fpm`, `php-alpine-supervisord`, `nginx`; on `main` pushes them to `europe-west3-docker.pkg.dev/cors-wolke/cors/coreshop/demo5/*` tagged `main-<sha>` and bumps the tags in [coreshop/demo5-manifest](https://github.com/coreshop/demo5-manifest) |
| `static.yml` | push, PR | `composer validate`, YAML/Twig/container lint, phpstan level 1 on `src/` |
| `composer-update.yml` | daily 03:00, manual | `composer update` as a pull request |

Required repository secrets:

- `GOOGLE_CREDENTIALS`: service account JSON with Artifact Registry writer on `cors-wolke`
- `MANIFEST_PUSH_TOKEN`: fine-grained GitHub token with `contents: write` on `coreshop/demo5-manifest`

Deployment itself happens from the manifest repository (Helm chart, synced by the cluster).

## License

CoreShop is licensed under the CoreShop Commercial License (CCL); the demo project code is MIT-style
skeleton code from Pimcore.
