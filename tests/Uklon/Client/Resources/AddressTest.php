<?php
/**
 * Description of AddressTest.php
 * @copyright Copyright (c) DOTSPLATFORM, LLC
 * @author    Yehor Herasymchuk <yehor@dotsplatform.com>
 */

namespace Tests\Uklon\Client\Resources;

use Dots\Uklon\Client\Resources\Address;
use Dots\Uklon\Client\Resources\Coordinates;
use Tests\TestCase;

class AddressTest extends TestCase
{
    public static function getProvideAddressTestData(): array
    {
        return [
            'complete address' => [
                '123 Main St',
                'New York',
                'USA',
                '10001',
                'Apartment 1A',
                'Main St',
                '123',
                [
                    'latitude' => 40.712776,
                    'longitude' => -74.005974,
                ],
            ],
            'address without optional fields' => [
                '456 Elm St',
                'Los Angeles',
                null,
                null,
                null,
                null,
                null,
                null,
            ],
        ];
    }

    /**
     * @dataProvider getProvideAddressTestData
     */
    public function testAddress(
        string $rawAddress,
        string $cityName,
        ?string $country,
        ?string $postalCode,
        ?string $details,
        ?string $streetName,
        ?string $streetNumber,
        ?array $coordinatesData
    ): void {
        $data = [
            'rawAddress' => $rawAddress,
            'cityName' => $cityName,
            'country' => $country,
            'postalCode' => $postalCode,
            'details' => $details,
            'streetName' => $streetName,
            'streetNumber' => $streetNumber,
            'coordinates' => $coordinatesData,
        ];

        $address = Address::fromArray($data);
        $addressData = $address->toArray();

        $this->assertEquals($rawAddress, $address->getRawAddress());
        $this->assertEquals($cityName, $address->getCityName());
        $this->assertEquals($country, $address->getCountry());
        $this->assertEquals($postalCode, $address->getPostalCode());
        $this->assertEquals($details, $address->getDetails());
        $this->assertEquals($streetName, $address->getStreetName());
        $this->assertEquals($streetNumber, $address->getStreetNumber());
        $this->assertSame($rawAddress, $addressData['rawAddress']);
        $this->assertSame($cityName, $addressData['cityName']);
        $this->assertSame($country, $addressData['country']);
        $this->assertSame($postalCode, $addressData['postalCode']);
        $this->assertSame($details, $addressData['details']);
        $this->assertSame($streetName, $addressData['streetName']);
        $this->assertSame($streetNumber, $addressData['streetNumber']);

        if ($coordinatesData) {
            $this->assertInstanceOf(Coordinates::class, $address->getCoordinates());
            $this->assertEquals($coordinatesData['latitude'], $address->getCoordinates()->getLatitude());
            $this->assertEquals($coordinatesData['longitude'], $address->getCoordinates()->getLongitude());
            $this->assertSame($coordinatesData['latitude'], $addressData['coordinates']['latitude']);
            $this->assertSame($coordinatesData['longitude'], $addressData['coordinates']['longitude']);
        } else {
            $this->assertNull($address->getCoordinates());
            $this->assertNull($addressData['coordinates']);
        }
    }
}
