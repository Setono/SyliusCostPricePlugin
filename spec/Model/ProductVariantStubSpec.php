<?php

namespace spec\Setono\SyliusCostPricePlugin\Model;

use Setono\SyliusCostPricePlugin\Model\ProductVariantStub;
use PhpSpec\ObjectBehavior;

class ProductVariantStubSpec extends ObjectBehavior
{
    public function it_is_initializable(): void
    {
        $this->shouldHaveType(ProductVariantStub::class);
    }

    public function it_has_default_cost_price_and_cost_price_currency(): void
    {
        $this->getCostPriceCurrency()->shouldBe(null);
        $this->getCostPrice()->shouldBe(null);
    }

    public function it_should_be_able_to_change_cost_price(): void
    {
        $this->setCostPrice('10');
        $this->getCostPrice()->shouldBe(10);
        $this->setCostPrice(null);
        $this->getCostPrice()->shouldBe(null);
    }

    public function it_should_be_able_change_cost_price_currency(): void
    {
        $this->setCostPriceCurrency('USD');
        $this->getCostPriceCurrency()->shouldBe('USD');
        $this->setCostPriceCurrency('');
        $this->getCostPriceCurrency()->shouldBe('');
        $this->setCostPriceCurrency(null);
        $this->getCostPriceCurrency()->shouldBe(null);
    }
}
