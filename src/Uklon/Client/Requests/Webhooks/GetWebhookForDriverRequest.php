<?php
/**
 * Description of RegisterWebhookRequest.php
 * @copyright Copyright (c) DOTSPLATFORM, LLC
 * @author    Bogdan Mamontov <bohdan.mamontov@dotsplatform.com>
 */

namespace Dots\Uklon\Client\Requests\Webhooks;

use Dots\Uklon\Client\Requests\BaseUklonRequest;
use Dots\Uklon\Client\Responses\Webhooks\WebhookResponseDTO;
use Saloon\Http\Response;

class
GetWebhookForDriverRequest extends BaseUklonRequest
{
    private const string ENDPOINT_TEMPLATE = '/api/v1/webhooks/driver';

    public function resolveEndpoint(): string
    {
        return self::ENDPOINT_TEMPLATE;
    }

    public function createDtoFromResponse(Response $response): WebhookResponseDTO
    {
        return WebhookResponseDTO::fromResponse($response);
    }
}
