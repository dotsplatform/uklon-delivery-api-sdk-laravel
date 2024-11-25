<?php
/**
 * Description of RegisterWebhookRequest.php
 * @copyright Copyright (c) DOTSPLATFORM, LLC
 * @author    Bogdan Mamontov <bohdan.mamontov@dotsplatform.com>
 */

namespace Dots\Uklon\Client\Requests\Webhooks;

use Dots\Uklon\Client\Requests\BaseUklonRequest;

class
GetWebhookForDriverRequest extends BaseUklonRequest
{
    private const string ENDPOINT_TEMPLATE = '/api/v1/webhooks/driver';

    public function resolveEndpoint(): string
    {
        return self::ENDPOINT_TEMPLATE;
    }
}
