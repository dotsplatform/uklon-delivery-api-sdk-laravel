<?php
/**
 * Description of OrderCreate.php
 * @copyright Copyright (c) DOTSPLATFORM, LLC
 * @author    Bogdan Mamontov <bohdan.mamontov@dotsplatform.com>
 */

namespace Dots\Uklon\Commands;

use Dots\Uklon\Client\Requests\Fares\DTO\CreateFareDTO;
use Dots\Uklon\Client\Requests\Orders\DTO\CreateOrderDTO;
use Dots\Uklon\Client\Resources\Consts\Product;
use Dots\Uklon\Client\Resources\PlaceReceivers;
use Dots\Uklon\Client\Responses\Fares\FareResponseDTO;

class OrderCreateUklonCommand extends BaseUklonCommand
{
    public $signature = 'uklon:orders:create';

    public function handle(): void
    {
        $connector = $this->getUklonConnector();
        $fare = $connector->createFare($this->getFare());
        $order = $connector->createOrder($this->getOrder($fare));
        dd($order);
    }

    private function getOrder(FareResponseDTO $fare): CreateOrderDTO
    {
        $data = [
            'fare_id' => $fare->getId(),
            'product' => Product::CAR->value,
            'sender' => [
                'name' => 'Yehor',
                'phone' => '+380631837252',
            ],
            'receivers' => PlaceReceivers::fromArray([
                [
                    'name' => 'Viktor',
                    'phone' => '+380631839999',
                ],
            ])->toArray(),
        ];

        return CreateOrderDTO::fromArray($data);
    }

    private function getFare(): CreateFareDTO
    {
        $data = [
            'city' => 1,
            'pickup_point' => [
                'latitude' => 51.5044742,
                'longitude' => 31.2894746,
                'address' => 'Some address',
            ],
            'dropoff_points' => [
                [
                    'latitude' => 51.4920781,
                    'longitude' => 31.1732924,
                    'address' => 'Some address 2',
                ],
            ],
            'products' => [
                'car' => [
                    'door' => false,
                    'confirmation_code' => false,
                    'surprise' => false,
                    'buyout' => false,
                    'age_verification' => false,
                ],
            ],
        ];

        return CreateFareDTO::fromArray($data);
    }
}
