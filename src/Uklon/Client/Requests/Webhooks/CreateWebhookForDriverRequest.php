<?php
/**
 * Description of RegisterWebhookRequest.php
 * @copyright Copyright (c) DOTSPLATFORM, LLC
 * @author    Bogdan Mamontov <bohdan.mamontov@dotsplatform.com>
 */

namespace Dots\Uklon\Client\Requests\Webhooks;

use Dots\Uklon\Client\Requests\PostUklonRequest;
use Dots\Uklon\Client\Requests\Webhooks\DTO\CreateWebhookDTO;

class CreateWebhookForDriverRequest extends PostUklonRequest
{
    private const string ENDPOINT = '/api/v1/webhooks/driver';

    public function __construct(
        private readonly CreateWebhookDTO $dto,
    ) {
    }

    public function defaultBody(): array
    {
        return $this->dto->toArray();
    }

    public function resolveEndpoint(): string
    {
        return self::ENDPOINT;
    }
}
