<?php

/**
 * Rename this file to _ExampleTest.php to enable this test
 */

use Kata\Cart;
use PHPUnit\Framework\TestCase;

class _ExampleTest extends TestCase
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
