<?php
/**
 * Description of OrderCreate.php
 * @copyright Copyright (c) DOTSPLATFORM, LLC
 * @author    Yehor Herasymchuk <yehor@dotsplatform.com>
 */

namespace Dots\Uklon\Commands;

use Dots\Uklon\Client\Requests\Fares\DTO\CreateFareDTO;

class FareCreateUklonCommand extends BaseUklonCommand
{
    public $signature = 'uklon:fares:create';

    public function handle(): void
    {
        $connector = $this->getUklonConnector();
        $order = $connector->createFare($this->getOrder());
        dd($order);
    }

    private function getOrder(): CreateFareDTO
    {
        $data = [
            'city' => 1,
            'pickup_point' => [
                'latitude' => '',
                'longitude' => '',
            ],
            'dropoff_points' => [
                [
                    'latitude' => '',
                    'longitude' => '',
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
            //            'price' => [
            //                'delivery' => [
            //                    'value' => 0,
            //                    'currencyCode' => 'UAH',
            //                ],
            //                'parcel' => [
            //                    'value' => 0,
            //                    'currencyCode' => 'UAH',
            //                ],
            //            ],
        ];

        return CreateFareDTO::fromArray($data);
    }
}
