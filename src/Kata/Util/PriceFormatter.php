<?php

namespace Kata\Util;

use Kata\Price;

class PriceFormatter
{
    private function __construct() {}
    
    public static function format(int $price): string
    {
        return '£' . number_format($price/100, 2);
    }
}
