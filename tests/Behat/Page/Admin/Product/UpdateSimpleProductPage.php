<?php

declare(strict_types=1);

namespace Tests\Setono\SyliusCostPricePlugin\Behat\Page\Admin\Product;

use Sylius\Behat\Page\Admin\Product\UpdateSimpleProductPage as BaseUpdatePage;

class UpdateSimpleProductPage extends BaseUpdatePage
{
    /**
     * {@inheritdoc}
     */
    protected function getDefinedElements(): array
    {
        return array_merge(parent::getDefinedElements(), [
            'costPriceCurrency' => '#sylius_product_variant_costPriceCurrency',
            'costPrice' => '#sylius_product_variant_costPrice',
        ]);
    }
}
