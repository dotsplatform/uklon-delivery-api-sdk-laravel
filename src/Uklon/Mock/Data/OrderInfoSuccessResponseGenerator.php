<?php
/**
 * Description of CreateOrderSucccessResponse.php
 * @copyright Copyright (c) DOTSPLATFORM, LLC
 * @author    Bogdan Mamontov <bohdan.mamontov@dotsplatform.com>
 */

namespace Dots\Uklon\Mock\Data;

use Dots\Uklon\Client\Resources\Consts\OrderStatusState;
use Dots\Uklon\Client\Resources\Consts\Product;
use Illuminate\Support\Str;

class OrderInfoSuccessResponseGenerator
{
    public static function generate(array $data = []): array
    {
        return array_merge([
            'id' => Str::uuid7()->toString(),
            'status' => OrderStatusState::PROCESSING,
            'product' => Product::CAR->value,
            'times' => [
                'creation' => time(),
            ],
            'sender' => [
                'name' => 'Viktor',
                'phone' => '+380666666666',
            ],
            'receivers' => [
                [
                    'name' => 'Bob',
                    'phone' => '+380666666665',
                ],
            ],
        ], $data);
    }
}
