<?php
/**
 * Description of WebhooksCreateForDriverUklonCommand.php
 * @copyright Copyright (c) DOTSPLATFORM, LLC
 * @author    Bogdan Mamontov <bohdan.mamontov@dotsplatform.com>
 */

namespace Dots\Uklon\Commands;

use Saloon\Exceptions\SaloonException;

class WebhooksGetForDriverUklonCommand extends BaseUklonCommand
{
    public $signature = 'uklon:webhooks:get:driver';

    public function handle(): void
    {
        $connector = $this->getUklonConnector();
        try {
            $connector->getWebhookForDriver();
        } catch (SaloonException $e) {
            $this->error($e->getMessage());
        }
    }
}
