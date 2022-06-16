<?php

namespace Kata\Product;

class Product implements CartProduct
{
    protected function __construct(
        private string $name,
        private int $price,
        private int $vatPercent
    ) {
    }

    public static function create(
        string $name,
        int $price,
        int $vatPercent
    ): self {
        return new self($name,$price,$vatPercent);
    }

    public function id(): string
    {
        // Temporary measure as these products don't have unique identifiers
        return $this->name;
    }

    public function name(): string
    {
        return $this->name;
    }

    public function price(): int
    {
        return $this->price + $this->vat();
    }

    public function vat(): int
    {
        // divide by 10000 to account for pence in the price
        return round($this->price * $this->vatPercent / 10000);
    }

    public function equals(CartProduct $other): bool
    {
        return $this->id() === $other->id();
    }
}
