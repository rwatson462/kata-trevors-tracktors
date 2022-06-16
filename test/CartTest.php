<?php

use Kata\Cart;
use Kata\VatRate;
use Kata\Product\Product;
use PHPUnit\Framework\TestCase;

class CartTest extends TestCase
{
    private VatRate $vatRate;

    public function setUp(): void
    {
        $this->vatRate = $this->createMock(VatRate::class);
        $this->vatRate->method('rate')->willReturn(100);
    }

    public function testCannotInstantiateWithNew(): void
    {
        $this->expectException(Throwable::class);
        new Cart;
    }

    public function testCanInstantiateWithNoItems(): void
    {
        $cart = Cart::create();
        $this->assertInstanceOf(Cart::class, $cart);
    }

    public function testCanInstantiateWithProducts(): void
    {
        $product = Product::create('test-product', 1000, $this->vatRate);
        $cart = Cart::create([$product]);
        $this->assertInstanceOf(Cart::class, $cart);
    }

    public function testCanInstantiateWithInvalidProduct(): void
    {
        $product = new stdclass;

        $this->expectException(InvalidArgumentException::class);

        $cart = Cart::create([$product]);
    }

    public function testCanAddProductToCart(): void
    {
        $product = Product::create('test-product', 1000, $this->vatRate);
        $cart = Cart::create();

        $cart->add($product);

        $this->assertContains($product, $cart->items());
    }

    public function testCanRemoveProductFromCart(): void
    {
        $product = Product::Create('test-product', 1000, $this->vatRate);
        $cart = Cart::create([$product]);

        $this->assertContains($product, $cart->items());

        $cart->remove($product);

        $this->assertNotContains($product, $cart->items());
    }
}
