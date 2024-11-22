<?php
/**
 * Description of WebhooksResponseDTO.php
 * @copyright Copyright (c) DOTSPLATFORM, LLC
 * @author    Bogdan Mamontov <bohdan.mamontov@dotsplatform.com>
 */

namespace Dots\Uklon\Client\Responses\Webhooks;

use Dots\Uklon\Client\Resources\Webhook\WebhookDTO;
use Dots\Uklon\Client\Responses\UklonResponseDTO;
use Saloon\Http\Response;

class WebhookResponseDTO extends UklonResponseDTO
{
    protected WebhookDTO $webhook;

    public static function fromResponse(Response $response): static
    {
        $data = [
            'webhook' => $response->json(),
        ];

        return static::fromArray($data);
    }

    public static function fromArray(array $data): static
    {
        $data['webhook'] = WebhookDTO::fromArray($data['webhook']);

        return parent::fromArray($data);
    }

    public function getWebhook(): WebhookDTO
    {
        return $this->webhook;
    }
}
