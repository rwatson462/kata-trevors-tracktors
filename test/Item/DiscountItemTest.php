<?php

use Kata\Item\DiscountItem;
use PHPUnit\Framework\TestCase;

class DiscountItemTest extends TestCase
{
    public function testCannotInstantiateWithNew(): void
    {
        $this->expectException(Throwable::class);
        new DiscountItem;
    }

    public function testCanInstantiate(): void
    {
        $product = DiscountItem::create('prod-name', 1000, 0);
        $this->assertInstanceOf(DiscountItem::class, $product);
    }

    public function testPriceIsCorrect(): void
    {
        $product = DiscountItem::create('prod-name', 1000, 0);
        $this->assertEquals(1000, $product->price());
    }
}
