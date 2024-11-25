<?php
/**
 * Description of WebhooksCreateForDriverUklonCommand.php
 * @copyright Copyright (c) DOTSPLATFORM, LLC
 * @author    Bogdan Mamontov <bohdan.mamontov@dotsplatform.com>
 */

namespace Dots\Uklon\Commands;

use Dots\Uklon\Client\Exceptions\UklonException;
use Dots\Uklon\Client\Requests\Webhooks\DTO\CreateWebhookDTO;
use Ramsey\Uuid\Uuid;

class WebhooksCreateForDriverUklonCommand extends BaseUklonCommand
{
    public $signature = 'uklon:webhooks:create:driver {webhookUrl?}';

    public function handle(): void
    {
        $connector = $this->getUklonConnector();
        $webhookUrl = $this->argument('webhookUrl');
        try {
            $connector->createWebhookForDriver($this->getRegisterWebhookDTO($webhookUrl));
        } catch (UklonException $e) {
            $this->error($e->getErrorResponseDTO()->getMessage());
        }
    }

    private function getRegisterWebhookDTO(
        ?string $webhookUrl = null,
    ): CreateWebhookDTO  {
        return CreateWebhookDTO::fromArray([
            'url' => $webhookUrl ?? config('uklon.webhooks.driver.url'),
            'key' => Uuid::uuid7()->toString(),
        ]);
    }
}
