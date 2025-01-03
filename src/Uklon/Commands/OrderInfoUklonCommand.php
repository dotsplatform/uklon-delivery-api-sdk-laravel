<?php
/**
 * Description of OrderCreate.php
 * @copyright Copyright (c) DOTSPLATFORM, LLC
 * @author    Bogdan Mamontov <bohdan.mamontov@dotsplatform.com>
 */

namespace Dots\Uklon\Commands;

class OrderInfoUklonCommand extends BaseUklonCommand
{
    public $signature = 'uklon:orders:info {orderId}';

    public function handle(): void
    {
        $connector = $this->getUklonConnector();
        $orderId = $this->assertStringValue($this->argument('orderId'));
        $order = $connector->getOrder($orderId);
        dd($order);
    }
}
