<?php

use Kata\Util\Currency;
use PHPUnit\Framework\TestCase;

class CurrencyTest extends TestCase
{
    public function testCannotInstantiateWithNew(): void
    {
        $this->expectException(Throwable::class);
        new Currency;
    }

    public function testFormatReturnsCorrectValue(): void
    {
        $result = Currency::format(1000);
        $this->assertEquals('£10.00', $result);
    }
}
