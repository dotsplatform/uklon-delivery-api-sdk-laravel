<?php
/**
 * Description of PackageDetailsTest.php
 * @copyright Copyright (c) DOTSPLATFORM, LLC
 * @author    Bogdan Mamontov <bohdan.mamontov@dotsplatform.com>
 */

namespace Tests\Uklon\Client\Resources\Order;

use Dots\Uklon\Client\Resources\Order\PackageDetails;
use Tests\TestCase;

class PackageDetailsTest extends TestCase
{
    /**
     * @dataProvider providePackageDetailsData
     */
    public function testPackageDetails(
        string $contentTypeValue,
        ?string $description,
        ?float $parcelValue,
        ?float $weight,
        string $expectedContentType
    ): void {
        $data = [
            'contentType' => $contentTypeValue,
            'description' => $description,
            'parcelValue' => $parcelValue,
            'weight' => $weight,
        ];

        $packageDetails = PackageDetails::fromArray($data);
        $packageDetailsData = $packageDetails->toArray();

        $this->assertSame($expectedContentType, $packageDetails->getContentType()->value);
        $this->assertSame($description, $packageDetails->getDescription());
        $this->assertSame($parcelValue, $packageDetails->getParcelValue());
        $this->assertSame($weight, $packageDetails->getWeight());
        $this->assertEquals($data, $packageDetailsData);
    }

    public static function providePackageDetailsData(): array
    {
        return [
            [
                'FOOD',
                'Pizza and drinks',
                20.0,
                3.5,
                'FOOD',
            ],
            [
                'GENERIC_PARCEL',
                'Documents',
                150.0,
                0.5,
                'GENERIC_PARCEL',
            ],
            [
                'FOOD',
                null,
                null,
                null,
                'FOOD',
            ],
        ];
    }
}
