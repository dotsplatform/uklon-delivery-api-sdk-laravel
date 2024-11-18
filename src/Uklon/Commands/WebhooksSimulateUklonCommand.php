<?php
/**
 * Description of WebhooksListGlovoCommand.php
 * @copyright Copyright (c) DOTSPLATFORM, LLC
 * @author    Yehor Herasymchuk <yehor@dotsplatform.com>
 */

namespace Dots\Uklon\Commands;

use Dots\Uklon\Client\Responses\ErrorResponseDTO;
use Saloon\Exceptions\SaloonException;

class WebhooksSimulateUklonCommand extends BaseUklonCommand
{
    public $signature = 'uklon:webhooks:simulate {webhookId}';

    public function handle(): void
    {
        $connector = $this->getUklonConnector();
        try {
            $webhookId = $this->assertIntValue($this->argument('webhookId'));
            $connector->simulateWebhook($webhookId);
        } catch (SaloonException $e) {
            $this->error($e->getMessage());
        }
    }
}
