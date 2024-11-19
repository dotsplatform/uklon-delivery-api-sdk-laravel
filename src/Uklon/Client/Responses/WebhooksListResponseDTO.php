<?php
/**
 * Description of WebhooksResponseDTO.php
 * @copyright Copyright (c) DOTSPLATFORM, LLC
 * @author    Yehor Herasymchuk <yehor@dotsplatform.com>
 */

namespace Dots\Uklon\Client\Responses;

use Dots\Uklon\Client\Resources\Webhook\WebhooksList;
use InvalidArgumentException;
use Saloon\Http\Response;

class WebhooksListResponseDTO extends UklonResponseDTO
{
    protected WebhooksList $webhookList;

    public static function fromResponse(Response $response): static
    {
        $data = $response->json('data');
        if (! is_array($data)) {
            throw new InvalidArgumentException('Invalid response data');
        }

        return static::fromArray($data);
    }

    public static function fromArray(array $data): static
    {
        $data['webhookList'] = WebhooksList::fromArray($data['webhookList'] ?? []);

        return parent::fromArray($data);
    }

    public function getWebhookList(): WebhooksList
    {
        return $this->webhookList;
    }
}
