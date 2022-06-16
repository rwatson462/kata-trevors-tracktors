<?php

use Kata\Item\CartItem;
use Kata\ProductCatalog;
use PHPUnit\Framework\TestCase;

class ProductCatalogTest extends TestCase
{
    public function testCannotInstantiateWithNew(): void
    {
        $this->expectException(Throwable::class);
        new ProductCatalog;
    }

    public function testCanGetFrontWheelsProduct(): void
    {
        $productName = 'Front wheels';
        $frontWheels = ProductCatalog::get($productName);
        $this->assertInstanceOf(CartItem::class, $frontWheels);
        $this->assertEquals($productName, $frontWheels->name());
    }

    public function testInvalidProductThrowsException(): void
    {
        $this->expectException(\InvalidArgumentException::class);
        ProductCatalog::get('invalid-product');
    }
}
