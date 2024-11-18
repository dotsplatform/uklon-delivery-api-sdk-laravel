<?php
/**
 * Description of OrderCreate.php
 * @copyright Copyright (c) DOTSPLATFORM, LLC
 * @author    Yehor Herasymchuk <yehor@dotsplatform.com>
 */

namespace Dots\Uklon\Commands;

class OrderCourierPositionUklonCommand extends BaseUklonCommand
{
    public $signature = 'uklon:orders:courier:position {trackingNumber}';

    public function handle(): void
    {
        $connector = $this->getUklonConnector();
        $trackingNumber = $this->assertStringValue($this->argument('trackingNumber'));
        $order = $connector->getOrderCourierPosition($trackingNumber);
        dd($order);
    }
}
