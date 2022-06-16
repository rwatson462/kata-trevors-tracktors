<?php

namespace Kata\Discount;

use Kata\Cart;

interface Discount
{
    public function qualifies(Cart $cart): bool;
    public function apply(Cart $cart): void;
}
