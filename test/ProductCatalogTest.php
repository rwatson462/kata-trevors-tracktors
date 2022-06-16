<?php

use Kata\Product\CartProduct;
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
        $this->assertInstanceOf(CartProduct::class, $frontWheels);
        $this->assertEquals($productName, $frontWheels->name());
    }

    public function testInvalidProductThrowsException(): void
    {
        $this->expectException(\InvalidArgumentException::class);
        ProductCatalog::get('invalid-product');
    }
}
