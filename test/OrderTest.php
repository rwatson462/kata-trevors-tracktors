<?php

use Kata\Order;
use PHPUnit\Framework\TestCase;

class OrderTest extends TestCase
{
    public function testCannotInstantiateWithNew(): void
    {
        $this->expectException(Throwable::class);
        $cart = new Order;
    }
}
