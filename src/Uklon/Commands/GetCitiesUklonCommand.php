<?php
/**
 * Description of OrderCreate.php
 * @copyright Copyright (c) DOTSPLATFORM, LLC
 * @author    Yehor Herasymchuk <yehor@dotsplatform.com>
 */

namespace Dots\Uklon\Commands;

class GetCitiesUklonCommand extends BaseUklonCommand
{
    public $signature = 'uklon:cities';

    public function handle(): void
    {
        $connector = $this->getUklonConnector();
        $order = $connector->getCities();
        dd($order);
    }
}
