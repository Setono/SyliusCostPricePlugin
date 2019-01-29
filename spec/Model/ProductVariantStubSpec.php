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

    public function it_has_default_cost_price(): void
    {
        $this->getCostPriceCurrency()->shouldBe('');
        $this->getCostPrice()->shouldBe(null);
    }

    public function it_should_be_able_to_change_cost_price(): void
    {
        $this->setCostPriceCurrency('USD');
        $this->setCostPrice('10');

        $this->getCostPriceCurrency()->shouldBe('USD');
        $this->getCostPrice()->shouldBe(10);

        $this->setCostPriceCurrency('');
        $this->setCostPrice(null);

        $this->getCostPriceCurrency()->shouldBe('');
        $this->getCostPrice()->shouldBe(null);
    }
}
