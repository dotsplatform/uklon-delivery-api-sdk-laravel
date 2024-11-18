<?php
/**
 * Description of PickupDetailsTest.php
 * @copyright Copyright (c) DOTSPLATFORM, LLC
 * @author    Yehor Herasymchuk <yehor@dotsplatform.com>
 */

namespace Tests\Uklon\Client\Resources\Order;

use Dots\Uklon\Client\Resources\Order\PickupDetails;
use Tests\TestCase;

class PickupDetailsTest extends TestCase
{
    /**
     * @dataProvider providePickupDetailsData
     */
    public function testPickupDetails(
        array $addressData,
        ?string $pickupOrderCode,
        ?string $pickupTime,
        ?string $pickupPhone,
    ): void {
        $data = [
            'address' => $addressData,
            'pickupOrderCode' => $pickupOrderCode,
            'pickupTime' => $pickupTime,
            'pickupPhone' => $pickupPhone,
        ];

        $pickupDetails = PickupDetails::fromArray($data);
        $this->assertEquals($data, $pickupDetails->toArray());
    }

    public static function providePickupDetailsData(): array
    {
        return [
            [
                [
                    'rawAddress' => '123 Main St',
                    'cityName' => 'New York',
                    'country' => 'USA',
                    'postalCode' => '10001',
                    'details' => 'Apartment 1A',
                    'streetName' => 'Main St',
                    'streetNumber' => '123',
                    'coordinates' => [
                        'latitude' => 40.712776,
                        'longitude' => -74.005974,
                    ],
                ],
                '12345',
                '2023-05-13T13:21:22+00:00',
                '1234567890',
            ],
            [
                [
                    'rawAddress' => '456 Elm St',
                    'cityName' => 'Los Angeles',
                    'country' => 'USA',
                    'postalCode' => '90001',
                    'details' => null,
                    'streetName' => 'Elm St',
                    'streetNumber' => '456',
                    'coordinates' => [
                        'latitude' => 34.052235,
                        'longitude' => -118.243683,
                    ],
                ],
                null,
                null,
                null,
            ],
        ];
    }
}
