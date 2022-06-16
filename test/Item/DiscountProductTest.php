<?php

use Kata\Product\DiscountProduct;
use PHPUnit\Framework\TestCase;

class DiscountProductTest extends TestCase
{
    public function testCannotInstantiateWithNew(): void
    {
        $this->expectException(Throwable::class);
        new DiscountProduct;
    }

    public function testCanInstantiate(): void
    {
        $product = DiscountProduct::create('prod-name', 1000, 0);
        $this->assertInstanceOf(DiscountProduct::class, $product);
    }

    public function testPriceIsCorrect(): void
    {
        $product = DiscountProduct::create('prod-name', 1000, 0);
        $this->assertEquals(1000, $product->price());
    }
}
