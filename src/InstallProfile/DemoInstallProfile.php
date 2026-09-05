<?php

declare(strict_types=1);

namespace App\InstallProfile;

use Pimcore\Bundle\ApplicationLoggerBundle\PimcoreApplicationLoggerBundle;
use Pimcore\Bundle\CustomReportsBundle\PimcoreCustomReportsBundle;
use Pimcore\Bundle\GenericDataIndexBundle\PimcoreGenericDataIndexBundle;
use Pimcore\Bundle\GenericExecutionEngineBundle\PimcoreGenericExecutionEngineBundle;
use Pimcore\Bundle\InstallBundle\EnvVarDefinition\Definitions\DatabaseEnvVarDefinition;
use Pimcore\Bundle\InstallBundle\EnvVarDefinition\Definitions\DoctrineMessengerEnvVarDefinition;
use Pimcore\Bundle\InstallBundle\EnvVarDefinition\Definitions\OpenSearchEnvVarDefinition;
use Pimcore\Bundle\InstallBundle\EnvVarDefinition\Definitions\ProductRegistrationEnvVarDefinition;
use Pimcore\Bundle\InstallBundle\Profile\DataSource\DataSourceInterface;
use Pimcore\Bundle\InstallBundle\Profile\InstallProfileInterface;
use Pimcore\Bundle\InstallBundle\Profile\InstallStep;
use Pimcore\Bundle\InstallBundle\Profile\InstallStepFilterInterface;
use Pimcore\Bundle\InstallBundle\Profile\PostInstallCommand;
use Pimcore\Bundle\SeoBundle\PimcoreSeoBundle;
use Pimcore\Bundle\StudioBackendBundle\PimcoreStudioBackendBundle;
use Pimcore\Bundle\StudioUiBundle\PimcoreStudioUiBundle;

/**
 * Install profile for the CoreShop demo shop.
 *
 * Extends CoreShop's minimal profile (CoreShop\Bundle\CoreBundle\InstallProfile\CoreShopInstallProfile)
 * with the Pimcore bundles the demo enables and runs the CoreShop installer plus the demo
 * fixtures as post-install commands, so one call sets up the whole shop:
 *
 *     vendor/bin/pimcore-install \
 *         --install-profile 'App\InstallProfile\DemoInstallProfile' \
 *         --skip-validation --no-interaction
 *
 * All configuration is read from the environment (DATABASE_URL, PIMCORE_OPENSEARCH_DSN,
 * PIMCORE_MESSENGER_TRANSPORT_DSN_PREFIX, PIMCORE_ENCRYPTION_SECRET, PIMCORE_INSTANCE_IDENTIFIER,
 * PIMCORE_PRODUCT_KEY, PIMCORE_ADMIN_USER, PIMCORE_ADMIN_PASSWORD).
 */
final readonly class DemoInstallProfile implements InstallProfileInterface, InstallStepFilterInterface
{
    public function getName(): string
    {
        return 'CoreShop Demo';
    }

    public function getDescription(): string
    {
        return 'Installs Pimcore with Studio, CoreShop and the CoreShop demo data.';
    }

    public function getBundles(): array
    {
        // Bundles with their own installers (schema, permissions, search indexes). CoreShop's
        // bundles are registered through CoreShopCoreBundle and installed by `coreshop:install`.
        return [
            PimcoreGenericDataIndexBundle::class,
            PimcoreGenericExecutionEngineBundle::class,
            PimcoreStudioBackendBundle::class,
            PimcoreStudioUiBundle::class,
            PimcoreApplicationLoggerBundle::class,
            PimcoreSeoBundle::class,
            PimcoreCustomReportsBundle::class,
        ];
    }

    public function getEnvVarDefinitions(): array
    {
        return [
            new DatabaseEnvVarDefinition(),
            new OpenSearchEnvVarDefinition(),
            new DoctrineMessengerEnvVarDefinition(),
            new ProductRegistrationEnvVarDefinition(),
        ];
    }

    public function getDataSource(): ?DataSourceInterface
    {
        return null;
    }

    public function getPostInstallCommands(): array
    {
        // Higher priority runs first. The post-install runner keys commands by name, so the
        // index rebuild here replaces the one the Generic Data Index installer registers.
        return [
            new PostInstallCommand(
                command: 'coreshop:install',
                label: 'Installing CoreShop',
                priority: 100,
            ),
            new PostInstallCommand(
                command: 'generic-data-index:update:index',
                label: 'Creating search index',
                priority: 90,
                arguments: ['-r'],
            ),
            new PostInstallCommand(
                command: 'coreshop:install:demo',
                label: 'Installing CoreShop demo data',
                priority: 80,
            ),
            new PostInstallCommand(
                command: 'pimcore:thumbnails:image',
                label: 'Pre-generating the product thumbnails',
                priority: 70,
                arguments: ['--thumbnails=coreshop_productGrid,coreshop_productList,coreshop_productDetail,coreshop_productDetailThumbnail,coreshop_productCart,coreshop_productCartPreview', '--skip-high-res'],
            ),
        ];
    }

    public function getSkippedInstallSteps(): array
    {
        // The environment is provided by the container / Kubernetes secret, the installer must
        // not write a .env.local into the image.
        return [InstallStep::WriteEnv];
    }
}
