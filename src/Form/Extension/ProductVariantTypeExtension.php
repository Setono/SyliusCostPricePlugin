<?php

declare(strict_types=1);

namespace Setono\SyliusCostPricePlugin\Form\Extension;

use Symfony\Component\Form\Extension\Core\Type\CurrencyType;
use Sylius\Bundle\ProductBundle\Form\Type\ProductVariantType;
use Symfony\Component\Form\AbstractTypeExtension;
use Symfony\Component\Form\Extension\Core\Type\NumberType;
use Symfony\Component\Form\FormBuilderInterface;

class ProductVariantTypeExtension extends AbstractTypeExtension
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder->add('costPriceCurrency', CurrencyType::class, [
            'label' => 'setono_sylius_cost_price.form.product_variant.costPriceCurrency'
        ]);

        $builder->add('costPrice', NumberType::class, [
            'label' => 'setono_sylius_cost_price.form.product_variant.costPrice'
        ]);
    }

    public static function getExtendedTypes(): iterable
    {
        return [ProductVariantType::class];
    }
}
