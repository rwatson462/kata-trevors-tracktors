<?php

namespace Kata;

use Kata\Discount\Discount;
use Kata\Discount\BuyXGetXFree;
use Kata\Discount\FreeShippingOverX;

class DiscountChecker
{
    private array $discounts = [];

    protected function __construct(
        private Cart $cart
    ) {
    }

    public static function create(Cart $cart): self
    {
        $discountChecker = new self($cart);

        $discountChecker->addDiscount(BuyXGetXFree::create(
            'Front wheels', 2,
            'Front wheels', 2
        ));

        $discountChecker->addDiscount(BuyXGetXFree::create(
            'Second hand stank seat', 1,
            'Air freshner', 1
        ));

        
        $discountChecker->addDiscount(FreeShippingOverX::create(
            70000
        ));
        

        return $discountChecker;
    }

    public function addDiscount(Discount $discount): void
    {
        $this->discounts[] = $discount;
    }

    public function check(): void
    {
        foreach($this->discounts as $discount) {
            if($discount->qualifies($this->cart)) {
                $discount->apply($this->cart);
            }
        }
    }
}
