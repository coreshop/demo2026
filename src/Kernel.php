<?php

/**
 * Pimcore
 *
 * This source file is available under two different licenses:
 * - GNU General Public License version 3 (GPLv3)
 * - Pimcore Enterprise License (PEL)
 * Full copyright and license information is available in
 * LICENSE.md which is distributed with this source code.
 *
 * @copyright  Copyright (c) Pimcore GmbH (http://www.pimcore.org)
 * @license    http://www.pimcore.org/license     GPLv3 and PEL
 */

namespace App;

use CoreShop\Bundle\CoreBundle\CoreShopCoreBundle;
use Pimcore\Bundle\SimpleBackendSearchBundle\PimcoreSimpleBackendSearchBundle;
use Pimcore\HttpKernel\BundleCollection\BundleCollection;
use Pimcore\Kernel as PimcoreKernel;

class Kernel extends PimcoreKernel
{
    public function registerBundlesToCollection(BundleCollection $collection): void
    {
        // bundles.php registers this with priority 0, which loads its admin JS after CoreShop's.
        // CoreShop's selector/object.js extends pimcore.bundle.search.element.selector.object,
        // so the search bundle has to be booted before CoreShopResourceBundle (priority 3800).
        $collection->addBundle(new PimcoreSimpleBackendSearchBundle(), 20000);

        $collection->addBundle(new \CoreShop\Bundle\FrontendBundle\CoreShopFrontendBundle(), 1800);
    }
}
