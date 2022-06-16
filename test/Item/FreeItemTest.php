<?php

use Kata\Item\FreeItem;
use PHPUnit\Framework\TestCase;

class FreeItemTest extends TestCase
{
    public function testCannotInstantiateWithNew(): void
    {
        $this->expectException(Throwable::class);
        new FreeItem;
    }

    public function testCanInstantiate(): void
    {
        $product = FreeItem::create('prod-name', 1000, 0);
        $this->assertInstanceOf(FreeItem::class, $product);
    }

    public function testPriceIsZero(): void
    {
        $product = FreeItem::create('prod-name', 1000, 0);
        $this->assertEquals(0, $product->price());
    }
}
