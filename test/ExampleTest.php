<?php

use Kata\Cart;
use PHPUnit\Framework\TestCase;

class ExampleTest extends TestCase
{
    public function testPhpUnitWorks(): void
    {
        $this->assertTrue(true);
    }

    public function testAutoloaderFindsKataClass(): void
    {
        $cart = Cart::create();
        $this->assertInstanceOf(Cart::class, $cart);
    }
}
