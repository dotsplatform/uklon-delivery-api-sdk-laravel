<?php
/**
 * Description of OrderCreate.php
 * @copyright Copyright (c) DOTSPLATFORM, LLC
 * @author    Yehor Herasymchuk <yehor@dotsplatform.com>
 */

namespace Dots\Uklon\Commands;

use Dots\Uklon\Client\Requests\Orders\DTO\CreateOrderDTO;

class OrderCreateUklonCommand extends BaseUklonCommand
{
    public $signature = 'uklon:orders:create';

    public function handle(): void
    {
        $connector = $this->getUklonConnector();
        $order = $connector->createOrder($this->getOrder());
        dd($order);
    }

    private function getOrder(): CreateOrderDTO
    {
        $data = [
            'address' => [
                'cityName' => 'Kyiv',
                'country' => 'Ukraine',
                'rawAddress' => 'Tarasa Shevchenko Blvd, 16, Kyiv, Ukraine, 02000',
            ],
            'contact' => [
                'name' => 'Yehor',
                'phone' => '+380631837252',
            ],
            'pickupDetails' => [
                'contactPhone' => '+380631837252',
                'pickupOrderCode' => '123456',
                'pickupPhone' => '+380631837251',
                'address' => [
                    'cityName' => 'Kyiv',
                    'country' => 'Ukraine',
                    'rawAddress' => 'Tarasa Shevchenko Blvd, 18, Kyiv, Ukraine, 02000',
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

        return CreateOrderDTO::fromArray($data);
    }
}
