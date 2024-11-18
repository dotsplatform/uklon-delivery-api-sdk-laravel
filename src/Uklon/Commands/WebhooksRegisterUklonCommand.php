<?php
/**
 * Description of WebhooksListGlovoCommand.php
 * @copyright Copyright (c) DOTSPLATFORM, LLC
 * @author    Yehor Herasymchuk <yehor@dotsplatform.com>
 */

namespace Dots\Uklon\Commands;

use Dots\Uklon\Client\Requests\Webhooks\DTO\RegisterWebhookDTO;
use Dots\Uklon\Client\Resources\Consts\WebhookEventType;
use Dots\Uklon\Client\Responses\ErrorResponseDTO;
use Saloon\Exceptions\SaloonException;

class WebhooksRegisterUklonCommand extends BaseUklonCommand
{
    public $signature = 'uklon:webhooks:register';

    public function handle(): void
    {
        $connector = $this->getUklonConnector();
        try {
            $dto = $connector->registerWebhook($this->getRegisterWebhookDTO());
            $this->info('Webhook registered. ID: '.$dto->getWebhook()->getWebhookId());
        } catch (SaloonException $e) {
            $this->error($e->getMessage());
        }
    }

    private function getRegisterWebhookDTO(): RegisterWebhookDTO
    {
        return RegisterWebhookDTO::fromArray([
            'callbackUrl' => 'https://api-release.dotsdev.live/api/v1/integrations/glovo/webhooks',
            'eventType' => WebhookEventType::POSITION_UPDATE,
            'partnerSecret' => 'secret',
            'retryConfig' => [
                'maxRetryCount' => 3,
            ],
        ]);
    }
}
