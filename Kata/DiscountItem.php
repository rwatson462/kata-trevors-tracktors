<?php

namespace Kata;

class DiscountItem implements CartItem
{
    protected function __construct(
        private string $name,
        private int $price
    ) {
    }

    public static function create(
        string $name,
        int $price
    ): self {
        return new self($name,$price);
    }

    public function name(): string
    {
        return $this->name . ' (discounted)';
    }

    public function price(): int
    {
        return $this->price;
    }

    public function equals(CartItem $other): bool
    {
        return $this->name() === $other->name();
    }
}