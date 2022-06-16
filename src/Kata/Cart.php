<?php

namespace Kata;

use Kata\Item\CartItem;

class Cart
{
    protected array $cartItems = [];

    public static function create(array $products = []): self
    {
        // make sure we only have a list of Product objects
        $products = array_filter(
            $products,
            fn($product) => $product instanceof CartItem
        );

        $cart = new self;

        foreach($products as $product) {
            $cart->add($product);
        }

        return $cart;
    }

    public function items(): array
    {
        return $this->cartItems;
    }

    public function add(CartItem $product, int $quantity = 1): void
    {
        while($quantity-- > 0) {
            $this->cartItems[] = $product;
        }
    }
    
    public function remove(CartItem $product, int $quantity = 1): void
    {
        while($quantity-- > 0) {
            foreach($this->cartItems as $key => $cartItem) {
                if($cartItem->equals($product)) {
                    array_splice($this->cartItems, $key, 1);
                    return;
                }
            }
        }

        // silently fails if item doesn't exist in cart
    }

    public function createOrder(): Order
    {
        // add shipping automatically
        $this->add(ProductCatalog::get('Shipping'));

        $discountChecker = DiscountChecker::create($this);
        $discountChecker->check();
        $order = Order::createFromCart($this);

        return $order;
    }
}
