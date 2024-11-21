<?php
/**
 * Description of OrderCreate.php
 * @copyright Copyright (c) DOTSPLATFORM, LLC
 * @author    Bogdan Mamontov <bohdan.mamontov@dotsplatform.com>
 */

namespace Dots\Uklon\Commands;

use Dots\Uklon\Client\Requests\Fares\DTO\CreateFareDTO;

class FareCreateUklonCommand extends BaseUklonCommand
{
    public $signature = 'uklon:fares:create';

    public function handle(): void
    {
        $connector = $this->getUklonConnector();
        $order = $connector->createFare($this->getFare());
        dd($order);
    }

    private function getFare(): CreateFareDTO
    {
        $data = [
            'city' => 1,
            'pickup_point' => [
                'latitude' => 51.5044742,
                'longitude' => 31.2894746,
            ],
            'dropoff_points' => [
                [
                    'latitude' => 51.4920781,
                    'longitude' => 31.1732924,
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
