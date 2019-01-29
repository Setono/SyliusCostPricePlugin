<?php

declare(strict_types=1);

namespace Setono\SyliusCostPricePlugin\Model;

interface CostPriceAwareInterface
{
    /**
     * @return string|null
     */
    public function getCostPriceCurrency(): ?string;

    /**
     * @param string|null $costPriceCurrency
     */
    public function setCostPriceCurrency(?string $costPriceCurrency): void;

    /**
     * @return int|null
     */
    public function getCostPrice(): ?int;

    /**
     * @param int|null $costPrice
     */
    public function setCostPrice(?int $costPrice): void;
}
