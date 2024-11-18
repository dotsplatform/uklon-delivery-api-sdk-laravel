<?php
/**
 * Description of EstimatedTimeOfArrivalTest.php
 * @copyright Copyright (c) DOTSPLATFORM, LLC
 * @author    Yehor Herasymchuk <yehor@dotsplatform.com>
 */

namespace Tests\Uklon\Client\Resources;

use DateTime;
use Dots\Uklon\Client\Resources\EstimatedTimeOfArrival;
use Tests\TestCase;

class EstimatedTimeOfArrivalTest extends TestCase
{
    /**
     * @dataProvider getProvideEstimatedTimeOfArrivalTestData
     */
    public function testEstimatedTimeOfArrival(string $typeValue, string $etaDate, string $expectedEtaType, int $expectedTimestamp): void
    {
        $data = [
            'type' => $typeValue,
            'eta' => $etaDate,
        ];

        $eta = EstimatedTimeOfArrival::fromArray($data);

        $this->assertEquals($expectedEtaType, $eta->getType()->value);
        $this->assertEquals($expectedTimestamp, $eta->getEtaTimestamp());
    }

    public static function getProvideEstimatedTimeOfArrivalTestData(): array
    {
        return [
            [
                'PICKUP',
                '2023-05-13T13:21:22Z',
                'PICKUP',
                (new DateTime('2023-05-13T13:21:22Z'))->getTimestamp(),
            ],
            [
                'DELIVERY',
                '2023-06-15T16:45:00Z',
                'DELIVERY',
                (new DateTime('2023-06-15T16:45:00Z'))->getTimestamp(),
            ],
        ];
    }
}
