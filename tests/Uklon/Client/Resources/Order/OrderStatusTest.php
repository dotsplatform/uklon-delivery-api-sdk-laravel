<?php
/**
 * Description of OrderStatusTest.php
 * @copyright Copyright (c) DOTSPLATFORM, LLC
 * @author    Bogdan Mamontov <bohdan.mamontov@dotsplatform.com>
 */

namespace Tests\Uklon\Client\Resources\Order;

use Dots\Uklon\Client\Resources\Order\OrderStatus;
use Tests\TestCase;

class OrderStatusTest extends TestCase
{
    /**
     * @dataProvider provideOrderStatusData
     */
    public function testOrderStatus(
        string $createdAt,
        string $lastUpdateAt,
        ?string $deliveryAt,
        string $stateValue,
        ?array $stateChangeHistoryData
    ): void {
        $data = [
            'createdAt' => $createdAt,
            'lastUpdateAt' => $lastUpdateAt,
            'deliveryAt' => $deliveryAt,
            'state' => $stateValue,
            'stateChangeHistory' => $stateChangeHistoryData,
        ];

        $orderStatus = OrderStatus::fromArray($data);

        $this->assertEquals($deliveryAt, $orderStatus->getDeliveryAt());
        $this->assertEquals($stateValue, $orderStatus->getState()->value);
        $this->assertEquals($stateChangeHistoryData ?: [], $orderStatus->getStateChangeHistory()->all());
    }

    public static function provideOrderStatusData(): array
    {
        return [
            [
                '2023-05-13T13:21:22Z',
                '2023-05-15T09:00:00Z',
                '2023-05-16',
                'ACCEPTED',
                [

                ],
            ],
            [
                '2023-04-10T08:30:00Z',
                '2023-04-11T10:15:00Z',
                null,
                'REJECTED',
                [
                    // State change history data
                ],
            ],
            [
                '2023-04-10T08:30:00Z',
                '2023-04-11T10:15:00Z',
                null,
                'CREATED',
                null,
            ],
        ];
    }
}
