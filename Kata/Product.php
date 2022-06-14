<?php

namespace Kata;

class Product implements CartItem
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

    public function equals(CartItem $other): bool
    {
        return $this->name() === $other->name();
    }
}
