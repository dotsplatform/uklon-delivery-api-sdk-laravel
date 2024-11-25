<?php
/**
 * Description of WebhookDeleteForOrderUklonCommand.php
 * @copyright Copyright (c) DOTSPLATFORM, LLC
 * @author    Bogdan Mamontov <bohdan.mamontov@dotsplatform.com>
 */

namespace Dots\Uklon\Commands;

use Dots\Uklon\Client\Exceptions\UklonException;

class WebhookDeleteForOrderUklonCommand extends BaseUklonCommand
{
    public $signature = 'uklon:webhooks:delete:order';

    public function handle(): void
    {
        $connector = $this->getUklonConnector();
        try {
            $connector->deleteWebhookForOrder();
        } catch (UklonException $e) {
            $this->error($e->getErrorResponseDTO()->getMessage());
        }
    }
}
