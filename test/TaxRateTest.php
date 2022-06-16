<?php

use Kata\TaxRate;
use PHPUnit\Framework\TestCase;

class TaxRateTest extends TestCase
{
    public function testCannotInstantiateWithNew(): void
    {
        $this->expectException(Throwable::class);
        new TaxRate;
    }

    public function testCanUseGetFunction(): void
    {
        $vatRate = TaxRate::get('free');
        $this->assertInstanceOf(TaxRate::class, $vatRate);
    }

    public function testGetFunctionThrowsWithInvalidData(): void
    {
        $this->expectException(InvalidArgumentException::class);
        TaxRate::get('invalid');
    }

    public function testFreeVatRatIsCorrect(): void
    {
        $vatRate = TaxRate::get('free');
        $this->assertEquals(0, $vatRate->rate());
        $this->assertEquals('free', $vatRate->name());
    }

    public function testStandardTaxRateIsCorrect(): void
    {
        $vatRate = TaxRate::get('std');

        // standard vat rate is variable so just check it's greater than zero
        $this->assertGreaterThan(0, $vatRate->rate());
        $this->assertEquals('std', $vatRate->name());
    }
}
