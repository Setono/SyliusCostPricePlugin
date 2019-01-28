<?php

declare(strict_types=1);

namespace Setono\SyliusCostPricePlugin\Model;


trait ProductVariantTrait
{
    /**
     * @var string
     */
    protected $costPriceCurrency = '';

    /**
     * @var int
     */
    protected $costPrice = 0;



    /**
     * @return string
     */
    public function getCostPriceCurrency(): string
    {
        return $this->costPriceCurrency;
    }

    /**
     * @param string $costPriceCurrency
     * @return void
     */
    public function setCostPriceCurrency(string $costPriceCurrency): void
    {
        $this->costPriceCurrency = $costPriceCurrency;
    }

    /**
     * @return int
     */
    public function getCostPrice(): int
    {
        return $this->costPrice;
    }

    /**
     * @param int $costPrice
     * @return void
     */
    public function setCostPrice(int $costPrice): void
    {
        $this->costPrice = $costPrice;
    }
}
