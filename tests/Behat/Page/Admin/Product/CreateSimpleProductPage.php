<?php

declare(strict_types=1);

namespace Tests\Setono\SyliusCostPricePlugin\Behat\Page\Admin\Product;

use Sylius\Behat\Page\Admin\Product\CreateSimpleProductPage as BaseCreatePage;

class CreateSimpleProductPage extends BaseCreatePage
{
    /**
     * @param $costPriceCurrency
     * @throws \Behat\Mink\Exception\ElementNotFoundException
     */
    public function setCostPriceCurrency($costPriceCurrency): void
    {
        $this->getElement('costPriceCurrency')->setValue($costPriceCurrency);
    }

    /**
     * @param $costPrice
     * @throws \Behat\Mink\Exception\ElementNotFoundException
     */
    public function setCostPrice($costPrice): void
    {
        $this->getElement('costPrice')->setValue($costPrice);
    }

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
