<?php

namespace Kata;

use Kata\Product\Product;
use Kata\VatRate;

class ProductCatalog
{
    protected function __construct() {}

    private static array $products = [
        ['Front wheels', 10999, 'std'],
        ['Rear wheels', 52703, 'std'],
        ['Second hand stank seat', 39599, 'std'],
        ['Bouncing Balls Gear Box protector', 4999, 'free'],
        ['Air freshner', 0, 'free'],
        ['Shipping', 15000, 'free'],
    ];

    public static function get(string $productName): Product
    {
        foreach(self::$products as $product) {
            if($product[0] === $productName) {
                $product[2] = VatRate::get($product[2]);
                return Product::create(...$product);
            }
        }

        throw new \InvalidArgumentException("No product found for $productName");
    }
}
