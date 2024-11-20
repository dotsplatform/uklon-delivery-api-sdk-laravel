<?php
/**
 * Description of OrderCreate.php
 * @copyright Copyright (c) DOTSPLATFORM, LLC
 * @author    Yehor Herasymchuk <yehor@dotsplatform.com>
 */

namespace Dots\Uklon\Commands;

class OrderInfoUklonCommand extends BaseUklonCommand
{
    public $signature = 'uklon:orders:info {orderId}';

    public function handle(): void
    {
        $connector = $this->getUklonConnector();
        $trackingNumber = $this->assertStringValue($this->argument('orderId'));
        $order = $connector->getOrder($trackingNumber);
        dd($order);
    }
}
