<?php

namespace Kata\Item;

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
        return new self($name . ' (discounted)',$price);
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

    public function equals(CartItem $other): bool
    {
        return $this->id() === $other->id();
    }
}