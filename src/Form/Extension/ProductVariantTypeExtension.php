<?php

declare(strict_types=1);

namespace Setono\SyliusCostPricePlugin\Form\Extension;

use Sylius\Bundle\MoneyBundle\Form\DataTransformer\SyliusMoneyTransformer;
use Sylius\Bundle\ProductBundle\Form\Type\ProductVariantType;
use Sylius\Component\Currency\Context\CurrencyContextInterface;
use Sylius\Component\Locale\Context\LocaleContextInterface;
use Symfony\Component\Form\AbstractTypeExtension;
use Symfony\Component\Form\Extension\Core\Type\CurrencyType;
use Symfony\Component\Form\Extension\Core\Type\NumberType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Intl\Intl;

class ProductVariantTypeExtension extends AbstractTypeExtension
{
    /**
     * @var string
     */
    protected $preferredCurrency;

    /**
     * @var string
     */
    protected $preferredCurrencyName;

    public function __construct(LocaleContextInterface $locale, CurrencyContextInterface $currencyContext)
    {
        $this->preferredCurrency = $currencyContext->getCurrencyCode();
        $this->preferredCurrencyName = Intl::getCurrencyBundle()->getCurrencyNames($locale->getLocaleCode())[$this->preferredCurrency];
    }

    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder->add('costPriceCurrency', CurrencyType::class, [
            'label' => 'setono_sylius_cost_price.form.product_variant.costPriceCurrency',
            'preferred_choices' => [$this->preferredCurrencyName => $this->preferredCurrency],
        ]);

        $builder->add('costPrice', NumberType::class, [
            'label' => 'setono_sylius_cost_price.form.product_variant.costPrice',
        ]);

        $builder->get('costPrice')
            ->resetViewTransformers()
            ->addViewTransformer(new SyliusMoneyTransformer(2, false, null, 100));
    }

    public static function getExtendedTypes(): iterable
    {
        return [ProductVariantType::class];
    }
}
