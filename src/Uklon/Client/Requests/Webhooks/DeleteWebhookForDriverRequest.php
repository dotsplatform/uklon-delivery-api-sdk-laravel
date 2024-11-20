<?php
/**
 * Description of RegisterWebhookRequest.php
 * @copyright Copyright (c) DOTSPLATFORM, LLC
 * @author    Yehor Herasymchuk <yehor@dotsplatform.com>
 */

namespace Dots\Uklon\Client\Requests\Webhooks;

use Dots\Uklon\Client\Requests\DeleteUklonRequest;

/**
 * Delete a webhook created by the partner.
 *
 * If the webhook does not exist a 404 response is returned.
 */
class DeleteWebhookForDriverRequest extends DeleteUklonRequest
{
    private const string ENDPOINT_TEMPLATE = '/api/v1/webhooks/driver';

    public function resolveEndpoint(): string
    {
        return self::ENDPOINT_TEMPLATE;
    }
}
