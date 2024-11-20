<?php
/**
 * Description of OrderCreate.php
 * @copyright Copyright (c) DOTSPLATFORM, LLC
 * @author    Yehor Herasymchuk <yehor@dotsplatform.com>
 */

namespace Dots\Uklon\Commands;

use Dots\Uklon\Client\Exceptions\UklonException;

class OrderCancelUklonCommand extends BaseUklonCommand
{
    public $signature = 'uklon:orders:cancel {orderId}';

    public function handle(): void
    {
        $connector = $this->getUklonConnector();
        $trackingNumber = $this->assertStringValue($this->argument('orderId'));
        try {
            $connector->cancelOrder($trackingNumber);
        } catch (UklonException $e) {
            $this->error($e->getMessage());
        }
    }
}
