<?php

namespace Kata;

class Order
{
    protected function __construct(
        private array $lines
    ) {
    }

    public static function createFromCart(Cart $cart): self
    {
        return new self($cart->items());
    }

    public function lines(): array
    {
        return $this->lines;
    }

    public function total(): int
    {
        return array_reduce($this->lines, fn($carry, $item) => $carry += $item->price(), 0);
    }
}
