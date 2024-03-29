<?php

namespace Kata\Discount;

use Kata\Cart;
use Kata\Product\CartProduct;
use Kata\Product\FreeProduct;
use Kata\Product;
use Kata\ProductCatalog;

class BuyXGetXFree implements Discount
{
    protected function __construct(
        private CartProduct $qualifyingItem,
        private int $qualifyingQuantity,
        private CartProduct $freeItem,
        private int $freeQuantity
    ) {
    }

    public static function create(
        string $qualifyingItem,
        int $qualifyingQuantity,
        string $freeItemStr,
        int $freeQuantity
    ): self
    {
        $product = ProductCatalog::get($freeItemStr);

        $freeItem = FreeProduct::create(
            $product->name(),
            0,
            0
        );
        
        return new self(
            ProductCatalog::get($qualifyingItem),
            $qualifyingQuantity,
            $freeItem,
            $freeQuantity
        );
    }

    public function qualifies(Cart $cart): bool
    {
        $numItems = 0;
        foreach($cart->items() as $item) {
            if($item->equals($this->qualifyingItem)) {
                $numItems++;
            }
        }

        return floor($numItems / $this->qualifyingQuantity) > 0;
    }

    public function apply(Cart $cart): void
    {
        $numItems = 0;
        foreach($cart->items() as $item) {
            if($item->equals($this->qualifyingItem)) {
                $numItems++;
            }
        }

        $multiples = floor($numItems / $this->qualifyingQuantity);
        while($multiples-- > 0) {
            $cart->add($this->freeItem, $this->freeQuantity);
        }
    }
}
