<?php

use Kata\VatRate;
use PHPUnit\Framework\TestCase;

class VatRateTest extends TestCase
{
    public function testCannotInstantiateWithNew(): void
    {
        $this->expectException(Throwable::class);
        new VatRate;
    }

    public function testCanUseGetFunction(): void
    {
        $vatRate = VatRate::get('free');
        $this->assertInstanceOf(VatRate::class, $vatRate);
    }

    public function testGetFunctionThrowsWithInvalidData(): void
    {
        $this->expectException(InvalidArgumentException::class);
        VatRate::get('invalid');
    }

    public function testFreeVatRatIsCorrect(): void
    {
        $vatRate = VatRate::get('free');
        $this->assertEquals(0, $vatRate->rate());
        $this->assertEquals('free', $vatRate->name());
    }

    public function testStandardVatRateIsCorrect(): void
    {
        $vatRate = VatRate::get('std');

        // standard vat rate is variable so just check it's greater than zero
        $this->assertGreaterThan(0, $vatRate->rate());
        $this->assertEquals('std', $vatRate->name());
    }
}
