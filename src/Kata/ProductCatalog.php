<?php

namespace Kata;

use Kata\Product\Product;

class ProductCatalog
{
    protected function __construct() {}

    private static array $products = [
        ['Front wheels', 10999, 1500],
        ['Rear wheels', 52703, 1500],
        ['Second hand stank seat', 39599, 1500],
        ['Bouncing Balls Gear Box protector', 4999, 0],
        ['Air freshner', 0, 0],
        ['Shipping', 15000, 0],
    ];

    public static function get(string $productName): Product
    {
        foreach(self::$products as $product) {
            if($product[0] === $productName) {
                return Product::create(...$product);
            }
        }

        throw new \InvalidArgumentException("No product found for $productName");
    }
}
