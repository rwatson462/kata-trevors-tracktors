<?php

use Kata\ProductCatalog;
use Kata\Cart;
use Kata\Util\Receipt;

include __DIR__ . '/autoloader.php';

$frontWheels = ProductCatalog::get('Front wheels');

$cart = Cart::create([
    ProductCatalog::get('Front wheels'),
    ProductCatalog::get('Front wheels'),
]);
// ProductCatalog::get('Rear wheels')

$cart->add(ProductCatalog::get('Rear wheels'));
$cart->add(ProductCatalog::get('Rear wheels'));
$cart->add(ProductCatalog::get('Rear wheels'));
// $cart->remove(ProductCatalog::get('Front wheels'));
// $cart->remove(ProductCatalog::get('Front wheels'));
// $cart->remove(ProductCatalog::get('Front wheels'));
// $cart->add(ProductCatalog::get('Front wheels'));
// $cart->add(ProductCatalog::get('Front wheels'));
$cart->add(ProductCatalog::get('Second hand stank seat'));
$cart->add(ProductCatalog::get('Second hand stank seat'));
$cart->add(ProductCatalog::get('Bouncing Balls Gear Box protector'));

$order = $cart->createOrder();
Receipt::print($order);
