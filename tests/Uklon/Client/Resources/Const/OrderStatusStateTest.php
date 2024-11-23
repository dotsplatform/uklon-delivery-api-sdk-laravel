<?php
/**
 * Description of OrderStatusStateTest.php
 * @copyright Copyright (c) DOTSPLATFORM, LLC
 * @author    Bogdan Mamontov <bohdan.mamontov@dotsplatform.com>
 */

namespace Tests\Uklon\Client\Resources\Const;

use Dots\Uklon\Client\Resources\Consts\OrderStatusState;
use Tests\TestCase;

class OrderStatusStateTest extends TestCase
{
    public function testOrderStatusStateValues(): void
    {
        $this->assertEquals('placed', OrderStatusState::PLACED->value);
        $this->assertEquals('waiting_for_processing', OrderStatusState::WAITING_FOR_PRECESSING->value);
        $this->assertEquals('processing', OrderStatusState::PROCESSING->value);
        $this->assertEquals('accepted', OrderStatusState::ACCEPTED->value);
        $this->assertEquals('arrived', OrderStatusState::ARRIVED->value);
        $this->assertEquals('running', OrderStatusState::RUNNING->value);
        $this->assertEquals('returning', OrderStatusState::RETURNING->value);
        $this->assertEquals('completed', OrderStatusState::COMPLETED->value);
        $this->assertEquals('suspended', OrderStatusState::SUSPENDED->value);
        $this->assertEquals('cancelled', OrderStatusState::CANCELED->value);
    }

    public function testIsCourierAssigned(): void
    {
        $this->assertFalse(OrderStatusState::PLACED->isCourierAssigned());
        $this->assertFalse(OrderStatusState::WAITING_FOR_PRECESSING->isCourierAssigned());
        $this->assertFalse(OrderStatusState::PROCESSING->isCourierAssigned());
        $this->assertTrue(OrderStatusState::ACCEPTED->isCourierAssigned());
        $this->assertTrue(OrderStatusState::ARRIVED->isCourierAssigned());
        $this->assertTrue(OrderStatusState::RUNNING->isCourierAssigned());
        $this->assertTrue(OrderStatusState::RETURNING->isCourierAssigned());
        $this->assertTrue(OrderStatusState::COMPLETED->isCourierAssigned());
        $this->assertFalse(OrderStatusState::SUSPENDED->isCourierAssigned());
        $this->assertFalse(OrderStatusState::CANCELED->isCourierAssigned());
    }
}
