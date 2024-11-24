<?php
/**
 * Description of OrderCreate.php
 * @copyright Copyright (c) DOTSPLATFORM, LLC
 * @author    Bogdan Mamontov <bohdan.mamontov@dotsplatform.com>
 */

namespace Dots\Uklon\Commands;

use Dots\Uklon\Client\Exceptions\UklonException;

class OrderCourierPositionUklonCommand extends BaseUklonCommand
{
    public $signature = 'uklon:orders:courier:position {orderId}';

    public function handle(): void
    {
        $connector = $this->getUklonConnector();
        $orderId = $this->assertStringValue($this->argument('orderId'));
        try {
            $order = $connector->getOrderCourierPosition($orderId);
        } catch (UklonException $e) {
            dd($e);
        }
        dd($order);
    }
}
