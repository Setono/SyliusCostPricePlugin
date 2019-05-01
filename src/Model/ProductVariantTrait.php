<?php

declare(strict_types=1);

namespace Setono\SyliusCostPricePlugin\Model;

use Doctrine\ORM\Mapping as ORM;

trait ProductVariantTrait
{
    /**
     * @ORM\Column(type="string", nullable=true)
     *
     * @var string|null
     */
    protected $costPriceCurrency;

    /**
     * @ORM\Column(type="integer", nullable=true)
     *
     * @var int|null
     */
    protected $costPrice;

    /**
     * @return string|null
     */
    public function getCostPriceCurrency(): ?string
    {
        return $this->costPriceCurrency;
    }

    /**
     * @param string|null $costPriceCurrency
     */
    public function setCostPriceCurrency(?string $costPriceCurrency): void
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
