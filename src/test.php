#!/usr/local/bin/php
<?php

use Kata\ProductCatalog;
use Kata\Cart;
use Kata\Util\Receipt;

include __DIR__ . '/autoloader.php';

// Test 1
echo "\nCreating cart with value > £750.00.  Expect free shipping\n";
Receipt::print(
    Cart::create([
        ProductCatalog::get('Front wheels'),
        ProductCatalog::get('Rear wheels'),
        ProductCatalog::get('Bouncing Balls Gear Box protector'),
    ])->createOrder()
);

// Test 2
echo "\nCreating cart with 2 Front wheels.  Expect 2 free front wheels\n";
Receipt::print(
    Cart::create([
        ProductCatalog::get('Front wheels'),
        ProductCatalog::get('Front wheels'),
    ])->createOrder()
);

// Test 3
echo "\nCreating cart with 'Second hand stank seat'.  Expect free Air freshner\n";
Receipt::print(
    Cart::create([
        ProductCatalog::get('Second hand stank seat'),
    ])->createOrder()
);

// Test 4
echo "\nCreating cart with 3 Front wheels.  Expect 2 free front wheels\n";
Receipt::print(
    Cart::create([
        ProductCatalog::get('Front wheels'),
        ProductCatalog::get('Front wheels'),
        ProductCatalog::get('Front wheels'),
    ])->createOrder()
);

// Test 5
echo "\nCreating cart with 4 Front wheels.  Expect 4 free front wheels\n";
Receipt::print(
    Cart::create([
        ProductCatalog::get('Front wheels'),
        ProductCatalog::get('Front wheels'),
        ProductCatalog::get('Front wheels'),
        ProductCatalog::get('Front wheels'),
    ])->createOrder()
);

// Test 6
echo "\nCreating cart with many 'Second hand stank seat'.  Expect 1 free Air freshner for each seat\n";
Receipt::print(
    Cart::create([
        ProductCatalog::get('Second hand stank seat'),
        ProductCatalog::get('Second hand stank seat'),
        ProductCatalog::get('Second hand stank seat'),
    ])->createOrder()
);