<?php
/**
 * Description of OrderStatusStateTest.php
 * @copyright Copyright (c) DOTSPLATFORM, LLC
 * @author    Yehor Herasymchuk <yehor@dotsplatform.com>
 */

namespace Tests\Uklon\Client\Resources\Const;

use Dots\Uklon\Client\Resources\Consts\OrderStatusState;
use Tests\TestCase;

class OrderStatusStateTest extends TestCase
{
    public function testOrderStatusStateValues(): void
    {
        $this->assertEquals('CREATED', OrderStatusState::CREATED->value);
        $this->assertEquals('REJECTED', OrderStatusState::REJECTED->value);
        $this->assertEquals('SCHEDULED', OrderStatusState::SCHEDULED->value);
        $this->assertEquals('ACTIVATED', OrderStatusState::ACTIVATED->value);
        $this->assertEquals('ACCEPTED', OrderStatusState::ACCEPTED->value);
        $this->assertEquals('WAITING_FOR_PICKUP', OrderStatusState::WAITING_FOR_PICKUP->value);
        $this->assertEquals('PICKED', OrderStatusState::PICKED->value);
        $this->assertEquals('WAITING_FOR_DELIVERY', OrderStatusState::WAITING_FOR_DELIVERY->value);
        $this->assertEquals('DELIVERED', OrderStatusState::DELIVERED->value);
        $this->assertEquals('CANCELLED', OrderStatusState::CANCELLED->value);
        $this->assertEquals('NOT_DELIVERED_NOT_RETURNED', OrderStatusState::NOT_DELIVERED_NOT_RETURNED->value);
        $this->assertEquals('RETURNED', OrderStatusState::RETURNED->value);
    }

    public function testIsCourierAssigned(): void
    {
        $this->assertFalse(OrderStatusState::CREATED->isCourierAssigned());
        $this->assertFalse(OrderStatusState::REJECTED->isCourierAssigned());
        $this->assertFalse(OrderStatusState::SCHEDULED->isCourierAssigned());
        $this->assertFalse(OrderStatusState::ACTIVATED->isCourierAssigned());
        $this->assertTrue(OrderStatusState::ACCEPTED->isCourierAssigned());
        $this->assertTrue(OrderStatusState::WAITING_FOR_PICKUP->isCourierAssigned());
        $this->assertTrue(OrderStatusState::PICKED->isCourierAssigned());
        $this->assertTrue(OrderStatusState::WAITING_FOR_DELIVERY->isCourierAssigned());
        $this->assertTrue(OrderStatusState::DELIVERED->isCourierAssigned());
        $this->assertFalse(OrderStatusState::CANCELLED->isCourierAssigned());
        $this->assertFalse(OrderStatusState::NOT_DELIVERED_NOT_RETURNED->isCourierAssigned());
        $this->assertFalse(OrderStatusState::RETURNED->isCourierAssigned());
    }
}
