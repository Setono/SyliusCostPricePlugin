<?php

declare(strict_types=1);

namespace Tests\Setono\SyliusCostPricePlugin\Behat\Context\Ui\Admin;

use Behat\Behat\Context\Context;
use Tests\Setono\SyliusCostPricePlugin\Behat\Page\Admin\Product\CreateSimpleProductPage;
use Tests\Setono\SyliusCostPricePlugin\Behat\Page\Admin\Product\UpdateSimpleProductPage;

final class ManagingProductsContext implements Context
{
    /**
     * @var CreateSimpleProductPage
     */
    private $createSimpleProductPage;

    /**
     * @var UpdateSimpleProductPage
     */
    private $updateSimpleProductPage;

    public function __construct(CreateSimpleProductPage $createSimpleProductPage, UpdateSimpleProductPage $updateSimpleProductPage)
    {
        $this->createSimpleProductPage = $createSimpleProductPage;
        $this->updateSimpleProductPage = $updateSimpleProductPage;
    }

    /**
     * @When I set its cost price currency to :costPriceCurrency
     */
    public function iSetItsCostPriceCurrencyTo($costPriceCurrency): void
    {
        $this->createSimpleProductPage->setCostPriceCurrency($costPriceCurrency);
    }

    /**
     * @When I set its cost price to :costPrice
     */
    public function iSetItsCostPriceTo($costPrice): void
    {
        $this->createSimpleProductPage->setCostPrice($costPrice);
    }
}
