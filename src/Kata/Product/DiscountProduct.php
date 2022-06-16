<?php

namespace Kata\Product;

class DiscountProduct implements CartProduct
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
        return new self($name . ' (discounted)', $price, $vatPercent);
    }

    public function id(): string
    {
        return $this->name;
    }

    public function name(): string
    {
        return $this->name;
    }

    public function price(): int
    {
        return $this->price;
    }

    public function equals(CartProduct $other): bool
    {
        return $this->id() === $other->id();
    }
}
