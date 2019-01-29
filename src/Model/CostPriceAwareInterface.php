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
     * @param string $costPriceCurrency
     */
    public function setCostPriceCurrency(string $costPriceCurrency): void;

    /**
     * @return int|null
     */
    public function getCostPrice(): ?int;

    /**
     * @param int|null $costPrice
     */
    public function setCostPrice(?int $costPrice): void;
}
