<?php
/**
 * Description of WebhooksCreateForOrderUklonCommand.php
 * @copyright Copyright (c) DOTSPLATFORM, LLC
 * @author    Bogdan Mamontov <bohdan.mamontov@dotsplatform.com>
 */

namespace Dots\Uklon\Commands;

use Saloon\Exceptions\SaloonException;

class WebhooksGetForOrderUklonCommand extends BaseUklonCommand
{
    public $signature = 'uklon:webhooks:get:order';

    public function handle(): void
    {
        $connector = $this->getUklonConnector();
        try {
            $connector->getWebhookForOrder();
        } catch (SaloonException $e) {
            $this->error($e->getMessage());
        }
    }
}
