<?php
/**
 * Description of CreateOrderSucccessResponse.php
 * @copyright Copyright (c) DOTSPLATFORM, LLC
 * @author    Bogdan Mamontov <bohdan.mamontov@dotsplatform.com>
 */

namespace Dots\Uklon\Mock\Data;

use Dots\Uklon\Client\Resources\Consts\DropoffStatus;
use Dots\Uklon\Client\Resources\Consts\OrderStatusState;
use Dots\Uklon\Client\Resources\Consts\Product;
use Dots\Uklon\Client\Resources\Distance;
use Dots\Uklon\Client\Resources\Order\Cost\Cost;
use Dots\Uklon\Client\Resources\Order\Creator;
use Dots\Uklon\Client\Resources\Order\DropoffPoint;
use Dots\Uklon\Client\Resources\Order\DropoffPoints;
use Dots\Uklon\Client\Resources\Order\Points;
use Dots\Uklon\Client\Resources\Order\Route;
use Dots\Uklon\Client\Resources\Point;
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
            'creator' => Creator::fromArray([
                'id' => Str::uuid7()->toString(),
                'name' => 'Nick',
                'phone' => '+380666666667',
            ])->toArray(),
            'route' => Route::fromArray([
                'city' => 1,
                'distance' => Distance::fromArray([
                    'cityMeters' => 1000,
                    'suburbanMeters' => 500,
                ])->toArray(),
                'points' => Points::fromArray([
                    'pickup' => Point::fromArray([
                        'latitude' => 50.4501,
                        'longitude' => 30.5234,
                        'address' => 'Address',
                    ])->toArray(),
                    'dropoffs' => DropoffPoints::fromArray([
                        DropoffPoint::fromArray([
                            'latitude' => 51.4501,
                            'longitude' => 31.5234,
                            'address' => 'Address 2',
                            'status' => DropoffStatus::DELIVERED->value,
                            'id' => random_int(1, 100),
                        ])->toArray(),
                    ])->toArray(),
                ])->toArray(),
            ]),
            'cost' => Cost::fromArray([
                'currency' => 'UAH',
                'total' => 100,
                'minimum' => 100,
                'maximum' => 100,
                'route' => 100,
            ]),
            'suspended' => false,
            'deferred' => false,
        ], $data);
    }
}
