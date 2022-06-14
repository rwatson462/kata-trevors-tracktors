<?php

namespace Kata\Item;

class FreeItem extends DiscountItem
{
    public function price(): int
    {
        return 0;
    }
}