<?php
/**
 * Description of OrderCreate.php
 * @copyright Copyright (c) DOTSPLATFORM, LLC
 * @author    Yehor Herasymchuk <yehor@dotsplatform.com>
 */

namespace Dots\Uklon\Commands;

use Dots\Uklon\Client\Requests\Orders\DTO\ValidateOrderDTO;

class OrderValidateUklonCommand extends BaseUklonCommand
{
    public $signature = 'uklon:orders:validate';

    public function handle(): void
    {
        $connector = $this->getUklonConnector();
        $dto = $connector->validateOrder($this->getValidateOrder());
        dd($dto);
    }

    private function getValidateOrder(): ValidateOrderDTO
    {
        $data = [
            'address' => [
                'cityName' => 'Kyiv',
                'country' => 'Ukraine',
                'rawAddress' => 'Tarasa Shevchenko Blvd, 16, Kyiv, Ukraine, 02000',
            ],
            'pickupDetails' => [
                //                'contactPhone' => '+380631837252',
                //                'pickupOrderCode' => '123456',
                //                'pickupPhone' => '+380631837251',
                'address' => [
                    'cityName' => 'Kyiv',
                    'country' => 'Ukraine',
                    'rawAddress' => 'Tarasa Shevchenko Blvd, 18, Kyiv, Ukraine, 02000',
                ],
            ],
        ];

        return ValidateOrderDTO::fromArray($data);
    }
}
