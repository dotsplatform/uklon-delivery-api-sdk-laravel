<?php
/**
 * Description of OrderCreate.php
 * @copyright Copyright (c) DOTSPLATFORM, LLC
 * @author    Yehor Herasymchuk <yehor@dotsplatform.com>
 */

namespace Dots\Uklon\Commands;

use Saloon\Exceptions\SaloonException;

class OrderCourierContactUklonCommand extends BaseUklonCommand
{
    public $signature = 'uklon:orders:courier:contact {trackingNumber}';

    public function handle(): void
    {
        $connector = $this->getUklonConnector();
        try {
            $trackingNumber = $this->assertStringValue($this->argument('trackingNumber'));
            $dto = $connector->getOrderCourierContact($trackingNumber);
            dd($dto);
        } catch (SaloonException $e) {
            $this->error($e->getMessage());
        }
    }
}
