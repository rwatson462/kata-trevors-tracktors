<?php

namespace Kata\Product;

class FreeProduct extends DiscountProduct
{
    public static function create(
        string $name,
        int $price,
        int $vatPercent
    ): self {
        return new self($name . ' (free)', $price, $vatPercent);
    }

    public function price(): int
    {
        return 0;
    }
}
