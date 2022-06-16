<?php

use Kata\Util\PriceFormatter;
use PHPUnit\Framework\TestCase;

class PriceFormatterTest extends TestCase
{
    public function testCannotInstantiateWithNew(): void
    {
        $this->expectException(Throwable::class);
        new PriceFormatter;
    }

    public function testFormatReturnsCorrectValue(): void
    {
        $result = PriceFormatter::format(1000);
        $this->assertEquals('£10.00', $result);
    }
}
