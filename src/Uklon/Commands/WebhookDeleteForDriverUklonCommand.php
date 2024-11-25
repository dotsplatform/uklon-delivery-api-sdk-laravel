<?php
/**
 * Description of WebhookDeleteForDriverUklonCommand.php
 * @copyright Copyright (c) DOTSPLATFORM, LLC
 * @author    Bogdan Mamontov <bohdan.mamontov@dotsplatform.com>
 */

namespace Dots\Uklon\Commands;

use Dots\Uklon\Client\Exceptions\UklonException;

class WebhookDeleteForDriverUklonCommand extends BaseUklonCommand
{
    public $signature = 'uklon:webhooks:delete:driver';

    public function handle(): void
    {
        $connector = $this->getUklonConnector();
        try {
            $connector->deleteWebhookForDriver();
        } catch (UklonException $e) {
            $this->error($e->getErrorResponseDTO()->getMessage());
        }
    }
}
