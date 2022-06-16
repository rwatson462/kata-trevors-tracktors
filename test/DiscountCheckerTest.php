<?php

use Kata\DiscountChecker;
use PHPUnit\Framework\TestCase;

class DiscountCheckerTest extends TestCase
{
    public function testCannotInstantiateWithNew(): void
    {
        $this->expectException(Throwable::class);
        new DiscountChecker;
    }
}
