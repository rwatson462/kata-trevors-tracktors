<?php

use Kata\Item\Product;
use PHPUnit\Framework\TestCase;

class ProductTest extends TestCase
{
    public function testCannotInstantiateWithNew(): void
    {
        $this->expectException(Throwable::class);
        new Product;
    }

    public function testIntantiationWithValidData(): void
    {
        $productName = 'prod-name';
        $price = 10000;
        $vatRate = 1000;
        $amountOfVat = $price * $vatRate / 10000;
        $priceInclVat = $price + $amountOfVat;

        $product = Product::create(
            $productName, $price, $vatRate
        );

        $this->assertInstanceOf(Product::class, $product);
        $this->assertEquals($productName, $product->name());
        $this->assertEquals($amountOfVat, $product->vat());
        $this->assertEquals($priceInclVat, $product->price());
    }

    public function testVatReturnsCorrectAmount(): void
    {
        $product = Product::create('prod-name', 10000, 100);
        $this->assertEquals(100, $product->vat());
    }

    public function testPriceCorrectlyAddsVat(): void
    {
        $product = Product::create('prod-name', 10000, 100);
        $this->assertEquals(10100, $product->price());
    }

    public function testEqualsMethodIdentifiesSameProduct(): void
    {
        $productName = 'prod-name';
        $product1 = Product::create($productName, 10000, 100);
        $product2 = Product::create($productName, 10000, 100);

        $this->assertTrue($product1->equals($product2));
        $this->assertTrue($product2->equals($product1));
    }

    public function testEqualsMethodIdentifiesDifferentProducts(): void
    {
        $product1 = Product::create('prod-name-1', 10000, 100);
        $product2 = Product::Create('prod-name-2', 10000, 100);

        $this->assertFalse($product1->equals($product2));
        $this->assertFalse($product2->equals($product1));
    }
}
