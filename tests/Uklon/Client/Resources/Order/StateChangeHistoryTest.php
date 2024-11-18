<?php
/**
 * Description of StateChangeHistoryTest.php
 * @copyright Copyright (c) DOTSPLATFORM, LLC
 * @author    Yehor Herasymchuk <yehor@dotsplatform.com>
 */

namespace Tests\Uklon\Client\Resources\Order;

use Dots\Uklon\Client\Resources\Order\StateChangeHistory;
use Tests\TestCase;

class StateChangeHistoryTest extends TestCase
{
    /**
     * @dataProvider provideStateChangeHistoryData
     */
    public function testStateChangeHistory(
        string $date,
        ?string $reason,
        string $value
    ): void {
        $data = [
            'date' => $date,
            'reason' => $reason,
            'value' => $value,
        ];

        $stateChangeHistory = StateChangeHistory::fromArray($data);

        $this->assertSame($date, $stateChangeHistory->getDate()->__toString());
        $this->assertSame($reason, $stateChangeHistory->getReason());
        $this->assertSame($value, $stateChangeHistory->getValue()->value);
    }

    public static function provideStateChangeHistoryData(): array
    {
        return [
            [
                '2023-05-15T09:00:00+00:00',
                'Package ready for pickup',
                'ACCEPTED',
            ],
            [
                '2023-05-15T09:00:00+00:00',
                null,
                'PICKED',
            ],
        ];
    }
}
