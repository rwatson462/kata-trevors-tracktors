<?php

use Kata\Item\CartItem;
use Kata\ProductCatalog;
use PHPUnit\Framework\TestCase;

class ProductCatalogTest extends TestCase
{
    public function testCannotInstantiateWithNew(): void
    {
        $this->expectException(Throwable::class);
        $cart = new ProductCatalog;
    }

    public function testCanGetFrontWheelsProduct(): void
    {
        $productName = 'Front wheels';
        $frontWheels = ProductCatalog::get($productName);
        $this->assertInstanceOf(CartItem::class, $frontWheels);
        $this->assertEquals($productName, $frontWheels->name());
    }
}
