<?php

use Kata\Product\FreeProduct;
use PHPUnit\Framework\TestCase;

class FreeProductTest extends TestCase
{
    public function testCannotInstantiateWithNew(): void
    {
        $this->expectException(Throwable::class);
        new FreeProduct;
    }

    public function testCanInstantiate(): void
    {
        $product = FreeProduct::create('prod-name', 1000, 0);
        $this->assertInstanceOf(FreeProduct::class, $product);
    }

    public function testPriceIsZero(): void
    {
        $product = FreeProduct::create('prod-name', 1000, 0);
        $this->assertEquals(0, $product->price());
    }
}
