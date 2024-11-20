<?php
/**
 * Description of OrderCreate.php
 * @copyright Copyright (c) DOTSPLATFORM, LLC
 * @author    Yehor Herasymchuk <yehor@dotsplatform.com>
 */

namespace Dots\Uklon\Commands;

class OrderCourierPositionUklonCommand extends BaseUklonCommand
{
    public $signature = 'uklon:orders:courier:position {orderId}';

    public function handle(): void
    {
        $connector = $this->getUklonConnector();
        $orderId = $this->assertStringValue($this->argument('orderId'));
        $order = $connector->getOrderCourierPosition($orderId);
        dd($order);
    }
}
