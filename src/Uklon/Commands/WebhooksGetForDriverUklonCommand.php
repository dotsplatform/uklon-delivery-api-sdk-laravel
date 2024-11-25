<?php
/**
 * Description of WebhooksCreateForDriverUklonCommand.php
 * @copyright Copyright (c) DOTSPLATFORM, LLC
 * @author    Bogdan Mamontov <bohdan.mamontov@dotsplatform.com>
 */

namespace Dots\Uklon\Commands;

use Dots\Uklon\Client\Exceptions\UklonException;

class WebhooksGetForDriverUklonCommand extends BaseUklonCommand
{
    public $signature = 'uklon:webhooks:get:driver';

    public function handle(): void
    {
        $connector = $this->getUklonConnector();
        try {
            $connector->getWebhookForDriver();
        } catch (UklonException $e) {
            $this->error($e->getErrorResponseDTO()->getMessage());
        }
    }
}
