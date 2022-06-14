<?php

namespace Kata;

interface CartItem
{
    public function name(): string;

    public function price(): int;

    public function equals(CartItem $other): bool;
}
