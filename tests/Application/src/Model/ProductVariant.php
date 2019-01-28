<?php

declare(strict_types=1);

namespace Tests\Setono\SyliusCostPricePlugin\Application\src\Model;

use Setono\SyliusCostPricePlugin\Model\CostPriceAwareInterface;
use Setono\SyliusCostPricePlugin\Model\ProductVariantTrait;
use Sylius\Component\Core\Model\ProductVariant as BaseProductVariant;

class ProductVariant extends BaseProductVariant implements CostPriceAwareInterface
{
    use ProductVariantTrait;
}
