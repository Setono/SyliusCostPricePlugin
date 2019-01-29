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
     * @var int|null
     */
    protected $costPrice = null;

    /**
     * @return string
     */
    public function getCostPriceCurrency(): string
    {
        return $this->costPriceCurrency;
    }

    /**
     * @param string $costPriceCurrency
     */
    public function setCostPriceCurrency(string $costPriceCurrency): void
    {
        $this->costPriceCurrency = $costPriceCurrency;
    }

    /**
     * @return int|null
     */
    public function getCostPrice(): ?int
    {
        return $this->costPrice;
    }

    /**
     * @param int|null $costPrice
     */
    public function setCostPrice(?int $costPrice): void
    {
        $this->costPrice = $costPrice;
    }
}
