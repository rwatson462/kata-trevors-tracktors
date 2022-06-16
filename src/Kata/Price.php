<?php

namespace Kata;

class Price
{
    protected function __construct(
        private int $price = 0
    ) {}

    public static function create(int $price): self
    {
        return new self($price);
    }

    public function amount(): int
    {
        return $this->price;
    }
}
