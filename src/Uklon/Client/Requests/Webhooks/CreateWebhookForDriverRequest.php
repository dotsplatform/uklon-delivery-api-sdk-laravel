<?php
/**
 * Description of RegisterWebhookRequest.php
 * @copyright Copyright (c) DOTSPLATFORM, LLC
 * @author    Yehor Herasymchuk <yehor@dotsplatform.com>
 */

namespace Dots\Uklon\Client\Requests\Webhooks;

use Dots\Uklon\Client\Requests\PostUklonRequest;
use Dots\Uklon\Client\Requests\Webhooks\DTO\CreateWebhookDTO;
use Dots\Uklon\Client\Responses\Webhooks\WebhookResponseDTO;
use Saloon\Http\Response;

/**
 * Register a webhook for a partner.
 *
 * The webhook will make a POST request to the specified callbackUrl url on
 * any order state update or courier position update.
 *
 * The webhook will be called for all the active orders created by the partner.
 */
class CreateWebhookForDriverRequest extends PostUklonRequest
{
    private const string ENDPOINT = '/api/v1/webhooks/driver';

    public function __construct(
        private readonly CreateWebhookDTO $dto,
    ) {
    }

    public function createDtoFromResponse(Response $response): WebhookResponseDTO
    {
        return WebhookResponseDTO::fromResponse($response);
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
