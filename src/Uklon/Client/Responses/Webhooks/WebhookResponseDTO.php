<?php
/**
 * Description of WebhooksResponseDTO.php
 * @copyright Copyright (c) DOTSPLATFORM, LLC
 * @author    Bogdan Mamontov <bohdan.mamontov@dotsplatform.com>
 */

namespace Dots\Uklon\Client\Responses\Webhooks;

use Dots\Uklon\Client\Resources\Webhook\Order\OrderUpdatesWebhookDTO;
use Dots\Uklon\Client\Responses\UklonResponseDTO;
use Saloon\Http\Response;

class WebhookResponseDTO extends UklonResponseDTO
{
    protected OrderUpdatesWebhookDTO $webhook;

    public static function fromResponse(Response $response): static
    {
        $data = [
            'webhook' => $response->json(),
        ];

        return static::fromArray($data);
    }

    public static function fromArray(array $data): static
    {
        $data['webhook'] = OrderUpdatesWebhookDTO::fromArray($data['webhook']);

        return parent::fromArray($data);
    }

    public function getWebhook(): OrderUpdatesWebhookDTO
    {
        return $this->webhook;
    }
}
