<?php

declare(strict_types=1);

namespace Tests\Setono\SyliusCostPricePlugin\Application\Entity;

use Doctrine\ORM\Mapping as ORM;
use Setono\SyliusCostPricePlugin\Model\CostPriceAwareInterface;
use Setono\SyliusCostPricePlugin\Model\ProductVariantTrait;
use Sylius\Component\Core\Model\ProductVariant as BaseProductVariant;

/**
 * @ORM\Entity
 * @ORM\Table(name="sylius_product_variant")
 */
class ProductVariant extends BaseProductVariant implements CostPriceAwareInterface
{
    use ProductVariantTrait;
}
