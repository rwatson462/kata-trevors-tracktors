<?php

namespace Kata\Item;

interface CartItem
{
    public function id(): string;
    
    public function name(): string;

    public function price(): int;

    public function equals(CartItem $other): bool;
}
