<?php

namespace Kata\Product;

use Kata\TaxRate;

class Product implements CartProduct
{
    protected function __construct(
        private string $name,
        private int $price,
        private TaxRate $vatRate
    ) {
    }

    public static function create(
        string $name,
        int $price,
        TaxRate $vatRate
    ): self {
        return new self($name,$price,$vatRate);
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
        if(!isset($this->vatRate)) {
            return 0;
        }

        // divide by 10000 to account for pence in the price
        return round($this->price * $this->vatRate->rate() / 10000);
    }

    public function equals(CartProduct $other): bool
    {
        return $this->id() === $other->id();
    }
}
