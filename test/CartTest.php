<?php

use Kata\Cart;
use Kata\Product\Product;
use PHPUnit\Framework\TestCase;
use InvalidArgumentException;

class CartTest extends TestCase
{
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
        $product = Product::create('test-product', 1000, 100);
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
        $product = Product::create('test-product', 1000, 100);
        $cart = Cart::create();

        $cart->add($product);

        $this->assertContains($product, $cart->items());
    }

    public function testCanRemoveProductFromCart(): void
    {
        $product = Product::Create('test-product', 1000, 100);
        $cart = Cart::create([$product]);

        $this->assertContains($product, $cart->items());

        $cart->remove($product);

        $this->assertNotContains($product, $cart->items());
    }
}
