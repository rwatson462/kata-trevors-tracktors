<?php

namespace Kata\Util;

class Currency
{
    public static function format(int $value): string
    {
        return '£' . number_format($value/100, 2);
    }
}