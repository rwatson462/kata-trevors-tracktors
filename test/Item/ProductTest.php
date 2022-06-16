<?php

use Kata\TaxRate;
use Kata\Price;
use Kata\Product\Product;
use PHPUnit\Framework\TestCase;

class ProductTest extends TestCase
{
    private TaxRate $vatRate;

    public function setUp(): void
    {
        $this->vatRate = $this->createMock(TaxRate::class);
        $this->vatRate->method('rate')->willReturn(100);
    }

    public function testCannotInstantiateWithNew(): void
    {
        $this->expectException(Throwable::class);
        new Product;
    }

    public function testIntantiationWithValidData(): void
    {
        $productName = 'prod-name';
        $price = 10000;
        $amountOfVat = 100;
        $priceInclVat = $price + $amountOfVat;

        $product = Product::create(
            $productName, $price, $this->vatRate
        );

        $this->assertInstanceOf(Product::class, $product);
        $this->assertEquals($productName, $product->name());
        $this->assertEquals($amountOfVat, $product->vat());
        $this->assertEquals($priceInclVat, $product->price());
    }

    public function testPriceCorrectlyAddsVat(): void
    {
        $product = Product::create('prod-name', 10000, $this->vatRate);
        $this->assertEquals(10100, $product->price());
    }

    public function testEqualsMethodIdentifiesSameProduct(): void
    {
        $productName = 'prod-name';
        $product1 = Product::create($productName, 10000, $this->vatRate);
        $product2 = Product::create($productName, 10000, $this->vatRate);

        $this->assertTrue($product1->equals($product2));
        $this->assertTrue($product2->equals($product1));
    }

    public function testEqualsMethodIdentifiesDifferentProducts(): void
    {
        $product1 = Product::create('prod-name-1', 10000, $this->vatRate);
        $product2 = Product::Create('prod-name-2', 10000, $this->vatRate);

        $this->assertFalse($product1->equals($product2));
        $this->assertFalse($product2->equals($product1));
    }
}
