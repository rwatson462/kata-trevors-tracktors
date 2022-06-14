#!/usr/local/bin/php
<?php

use Kata\ProductCatalog;
use Kata\Cart;
use Kata\Util\Receipt;

include __DIR__ . '/autoloader.php';

// Test 1: 1 of each item in basket.  Should qualify for free shipping
$cart = Cart::create([
    ProductCatalog::get('Front wheels'),
    ProductCatalog::get('Rear wheels'),
    ProductCatalog::get('Second hand stank seat'),
    ProductCatalog::get('Bouncing Balls Gear Box protector')
]);

$order = $cart->createOrder();
Receipt::print($order);
