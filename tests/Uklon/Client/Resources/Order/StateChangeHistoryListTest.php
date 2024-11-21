<?php
/**
 * Description of StateChangeHistoryListTest.php
 * @copyright Copyright (c) DOTSPLATFORM, LLC
 * @author    Bogdan Mamontov <bohdan.mamontov@dotsplatform.com>
 */

namespace Tests\Uklon\Client\Resources\Order;

use Dots\Uklon\Client\Resources\Order\StateChangeHistory;
use Dots\Uklon\Client\Resources\Order\StateChangeHistoryList;
use Tests\TestCase;

class StateChangeHistoryListTest extends TestCase
{
    public function testStateChangeHistoryList(): void
    {
        $data = [
            [
                'date' => '2023-05-13T13:21:22Z',
                'reason' => 'Package ready for pickup',
                'value' => 'ACCEPTED',
            ],
            [
                'date' => '2023-05-15T09:00:00Z',
                'reason' => 'Delivered to recipient',
                'value' => 'DELIVERED',
            ],
        ];

        $stateChangeHistoryList = StateChangeHistoryList::fromArray($data);

        $this->assertCount(2, $stateChangeHistoryList);

        foreach ($stateChangeHistoryList as $stateChangeHistory) {
            $this->assertInstanceOf(StateChangeHistory::class, $stateChangeHistory);
        }

        // Testing specific item in the list
        $firstItem = $stateChangeHistoryList->first();
        $this->assertSame('2023-05-13T13:21:22+00:00', $firstItem->getDate()->__toString());
        $this->assertSame('Package ready for pickup', $firstItem->getReason());
        $this->assertSame('ACCEPTED', $firstItem->getValue()->value);
    }

    public function testFromEmptyArray(): void
    {
        $stateChangeHistoryList = StateChangeHistoryList::fromArray([]);

        $this->assertCount(0, $stateChangeHistoryList);
        $this->assertTrue($stateChangeHistoryList->isEmpty());
    }

    public function testEmpty(): void
    {
        $stateChangeHistoryList = StateChangeHistoryList::empty();

        $this->assertCount(0, $stateChangeHistoryList);
        $this->assertTrue($stateChangeHistoryList->isEmpty());
    }
}
