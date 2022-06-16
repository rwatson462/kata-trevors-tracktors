<?php

namespace Kata\Product;

interface CartProduct
{
    public function id(): string;
    
    public function name(): string;

    public function price(): int;

    public function equals(CartProduct $other): bool;
}
