<?php

declare(strict_types=1);

namespace Setono\SyliusCostPricePlugin\Model;

interface CostPriceAwareInterface
{
    /**
     * @return string
     */
    public function getCostPriceCurrency(): string;

    /**
     * @param string $costPrice
     * @return void
     */
    public function setCostPriceCurrency(string $costPriceCurrency): void;

    /**
     * @return int
     */
    public function getCostPrice(): int;

    /**
     * @param int $costPrice
     * @return void
     */
    public function setCostPrice(int $costPrice): void;
}
