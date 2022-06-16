<?php

use Kata\Price;
use PHPUnit\Framework\TestCase;

class PriceTest extends TestCase
{

    public function testCannotInstantiateWithNew(): void
    {
        $this->expectException(Throwable::class);
        new Price;
    }

    public function testCanUseCreateFunction(): void
    {
        $price = Price::create(1000);
        $this->assertInstanceOf(Price::class, $price);
    }

    public function testCanGetCorrectPrice(): void
    {
        $priceValue = 10000;
        $price = Price::create($priceValue);

        $this->assertEquals($priceValue, $price->amount());
    }
}
