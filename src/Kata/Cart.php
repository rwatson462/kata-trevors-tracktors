<?php

namespace Kata;

use Kata\Product\CartProduct;
use InvalidArgumentException;

class Cart
{
    protected array $cartItems = [];

    protected function __construct() {}

    public static function create(array $products = []): self
    {
        $cart = new self;

        foreach($products as $product) {
            if(!$product instanceof CartProduct) {
                throw new InvalidArgumentException('Invalid product adding to cart: ' . $product::class);
            }
            $cart->add($product);
        }

        return $cart;
    }

    public function items(): array
    {
        return $this->cartItems;
    }

    public function add(CartProduct $product, int $quantity = 1): void
    {
        while($quantity-- > 0) {
            $this->cartItems[] = $product;
        }
    }
    
    public function remove(CartProduct $product, int $quantity = 1): void
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
