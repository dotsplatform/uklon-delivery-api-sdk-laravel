<?php
/**
 * Description of OrderCreate.php
 * @copyright Copyright (c) DOTSPLATFORM, LLC
 * @author    Yehor Herasymchuk <yehor@dotsplatform.com>
 */

namespace Dots\Uklon\Commands;

class OrderSimulateSuccessfulDeliveryUklonCommand extends BaseUklonCommand
{
    public $signature = 'uklon:orders:simulate:success {trackingNumber}';

    public function handle(): void
    {
        $connector = $this->getUklonConnector();
        $trackingNumber = $this->assertStringValue($this->argument('trackingNumber'));
        $connector->simulateSuccessfulDelivery($trackingNumber);
    }
}
