<?php

namespace Kata\Discount;

use Kata\Cart;
use Kata\ProductCatalog;
use Kata\Product\DiscountProduct;

class FreeShippingOverX implements Discount
{
    protected function __construct(
        private int $minOrderValue
    ) {
    }

    public static function create(
        int $minOrderValue
    ) {
        return new self($minOrderValue);
    }

    public function qualifies(Cart $cart): bool
    {
        $orderTotal = 0;
        foreach($cart->items() as $item) {
            $orderTotal += $item->price();
        }

        return $orderTotal > $this->minOrderValue;
    }

    public function apply(Cart $cart): void
    {
        $shippingProduct = ProductCatalog::get('Shipping');
        $cart->add(DiscountProduct::create(
            $shippingProduct->name(),
            -$shippingProduct->price(),
            0 // @todo
        ));
    }
}
