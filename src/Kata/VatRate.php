<?php

namespace Kata;

use InvalidArgumentException;

class VatRate
{
    private static array $rates = [
        'free' => 0,
        'std'  => 1500  // in "pence" notation = 15%
    ];

    protected function __construct(
        private string $name,
        private int $rate
    ) {}

    public static function get(string $rate): self
    {
        if(isset(self::$rates[$rate])) {
            return new self($rate, self::$rates[$rate]);
        }

        throw new InvalidArgumentException('Vat Rate is not configured');
    }

    public function name(): string
    {
        return $this->name;
    }

    public function rate(): int
    {
        return $this->rate;
    }
}
