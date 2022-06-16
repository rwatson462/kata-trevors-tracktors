<?php

use Kata\Cart;
use PHPUnit\Framework\TestCase;

class CartTest extends TestCase
{
    public function testCannotInstantiateWithNew(): void
    {
        $this->expectException(Throwable::class);
        $cart = new Cart;
    }
}
