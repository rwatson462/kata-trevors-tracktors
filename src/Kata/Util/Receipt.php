<?php

namespace Kata\Util;

use Kata\Order;

class Receipt
{
    public static function print(Order $order)
    {
        $orderItems = $order->lines();

        // @todo use array_reduce to get a list of products and quantities
        // @todo then use array_map on the result to create the string
        $cartContents = array_reduce(
            $orderItems,
            function($carry, $item) {
                if(isset($carry[$item->id()])) {
                    $carry[$item->id()]['qty'] += 1;
                    $carry[$item->id()]['price'] += $item->price();
                    return $carry;
                }

                $carry[$item->id()] = [
                    'name' => $item->name(),
                    'qty' => 1,
                    'price' => $item->price()
                ];
                return $carry;
            },
            []
        );

        $cartContents = array_map(
            fn($content) =>
                str_pad($content['name'], 40)
                . ' x '
                . str_pad($content['qty'], 3)
                . ' '
                . Currency::format($content['price']),
            $cartContents
        );
        sort($cartContents);

        $cartContents[] = str_repeat('=', 60);
        $cartContents[] = str_pad('Order total', 47) . Currency::format($order->total());
        
        echo implode("\n", $cartContents) . "\n";
    }
}
