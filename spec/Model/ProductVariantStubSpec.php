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
        $this->getCostPrice()->shouldBe(0);
    }

    public function it_should_be_able_to_change_cost_price(): void
    {
        $this->setCostPriceCurrency('USD');
        $this->setCostPrice('10');

        $this->getCostPriceCurrency()->shouldBe('USD');
        $this->getCostPrice()->shouldBe(10);
    }
}
