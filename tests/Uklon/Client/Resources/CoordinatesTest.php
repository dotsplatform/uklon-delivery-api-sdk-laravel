<?php
/**
 * Description of Coordinatestest.php
 * @copyright Copyright (c) DOTSPLATFORM, LLC
 * @author    Yehor Herasymchuk <yehor@dotsplatform.com>
 */

namespace Tests\Uklon\Client\Resources;

use Dots\Uklon\Client\Resources\Coordinates;
use Tests\TestCase;

class CoordinatesTest extends TestCase
{
    /**
     * @dataProvider getProvideCoordinatesData
     */
    public function testCoordinates(float $latitude, float $longitude): void
    {
        $coordinates = Coordinates::fromArray([
            'latitude' => $latitude,
            'longitude' => $longitude,
        ]);

        $this->assertEquals($latitude, $coordinates->getLatitude());
        $this->assertEquals($longitude, $coordinates->getLongitude());
    }

    /**
     * @dataProvider getProvideCoordinatesData
     */
    public function testCoordinatesFromArrayToArray(float $latitude, float $longitude): void
    {
        $dto = Coordinates::fromArray([
            'latitude' => $latitude,
            'longitude' => $longitude,
        ]);
        $coordinates = Coordinates::fromArray($dto->toArray());

        $this->assertEquals($latitude, $coordinates->getLatitude());
        $this->assertEquals($longitude, $coordinates->getLongitude());
    }

    public static function getProvideCoordinatesData(): array
    {
        return [
            'valid coordinates' => [40.712776, -74.005974],
            'zero coordinates' => [0.0, 0.0],
            'negative coordinates' => [-40.712776, -74.005974],
        ];
    }
}
