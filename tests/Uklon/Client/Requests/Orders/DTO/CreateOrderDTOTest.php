<?php
/**
 * Description of CreateOrderDTOTest.php
 * @copyright Copyright (c) DOTSPLATFORM, LLC
 * @author    Oleksandr Polosmak <o.polosmak@dotsplatform.com>
 */

namespace Tests\Uklon\Client\Requests\Orders\DTO;

use Dots\Uklon\Client\Requests\Orders\DTO\CreateOrderDTO;
use Tests\TestCase;

class CreateOrderDTOTest extends TestCase
{
    public function testCreateExpectsOk(): void
    {
        $data = $this->generateData();
        $dto = CreateOrderDTO::fromArray($data);
        $this->assertEquals($data, $dto->toArray());
    }

    public function testToRequestDataExpectsPriceIfStageEnvFalse(): void
    {
        $data = $this->generateData();
        $dto = CreateOrderDTO::fromArray($data);
        $requestData = $dto->toRequestData(false);
        $this->assertEquals($data, $requestData);
    }

    public function testToRequestDataExpectsPriceIfStageEnvTrue(): void
    {
        $data = $this->generateData();
        $dto = CreateOrderDTO::fromArray($data);
        $requestData = $dto->toRequestData(true);
        $this->assertNull($requestData['price']);
    }

    private function generateData(array $data = []): array
    {
        return array_merge([
            'address' => [
                'cityName' => 'Kyiv',
                'country' => 'Ukraine',
                'rawAddress' => 'Tarasa Shevchenko Blvd, 16, Kyiv, Ukraine, 02000',
                'postalCode' => null,
                'details' => null,
                'streetName' => null,
                'streetNumber' => null,
                'coordinates' => [
                    'latitude' => 50.4508,
                    'longitude' => 30.5233,
                ],

            ],
            'contact' => [
                'name' => 'Yehor',
                'phone' => '+380631837252',
                'email' => null,
            ],
            'pickupDetails' => [
                'pickupOrderCode' => '123456',
                'pickupPhone' => '+380631837251',
                'pickupTime' => '2021-09-30T12:00:00+03:00',
                'address' => [
                    'cityName' => 'Kyiv',
                    'country' => 'Ukraine',
                    'rawAddress' => 'Tarasa Shevchenko Blvd, 18, Kyiv, Ukraine, 02000',
                    'postalCode' => null,
                    'details' => null,
                    'streetName' => null,
                    'streetNumber' => null,
                    'coordinates' => [
                        'latitude' => 50.4501,
                        'longitude' => 30.5234,
                    ],
                ],
            ],
            'price' => [
                'delivery' => [
                    'value' => 0,
                    'currencyCode' => 'UAH',
                ],
                'parcel' => [
                    'value' => 0,
                    'currencyCode' => 'UAH',
                ],
            ],
            'packageDetails' => null,
            'packageId' => null,
        ], $data);
    }
}
