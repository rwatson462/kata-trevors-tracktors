<?php

namespace Kata;

class ProductCatalog
{
    public static function get(string $productName): Product
    {
        return match($productName) {
            'Front wheels' => Product::create(
                name: 'Front wheels',
                price: 10999,
                vatPercent: 1500
            ),
            'Rear wheels' => Product::create(
                name: 'Rear wheels',
                price: 52703,
                vatPercent: 1500
            ),
            'Second hand stank seat' => Product::create(
                name: 'Second hand stank seat',
                price: 39599,
                vatPercent: 1500
            ),
            'Bouncing Balls Gear Box protector' => Product::create(
                name: 'Bouncing Balls Gear Box protector',
                price: 4999,
                vatPercent: 0),
            'Shipping' => Product::create(
                name: 'Shipping',
                price: 15000,
                vatPercent: 0
            ),
            'Air freshner' => Product::create(
                name: 'Air freshner',
                price: 0,
                vatPercent: 0
            ),
        };
    }
}
