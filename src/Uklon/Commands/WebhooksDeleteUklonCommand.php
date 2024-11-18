<?php
/**
 * Description of WebhooksListGlovoCommand.php
 * @copyright Copyright (c) DOTSPLATFORM, LLC
 * @author    Yehor Herasymchuk <yehor@dotsplatform.com>
 */

namespace Dots\Uklon\Commands;

use Dots\Uklon\Client\Responses\ErrorResponseDTO;
use Saloon\Exceptions\SaloonException;

class WebhooksDeleteUklonCommand extends BaseUklonCommand
{
    public $signature = 'uklon:webhooks:delete {webhookId}';

    public function handle(): void
    {
        $connector = $this->getUklonConnector();
        try {
            $webhookId = $this->assertIntValue($this->argument('webhookId'));
            $connector->deleteWebhook($webhookId);
        } catch (SaloonException $e) {
            $this->error($e->getMessage());
        }
    }
}
