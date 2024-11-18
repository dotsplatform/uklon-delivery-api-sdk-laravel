<?php
/**
 * Description of RegisterWebhookRequest.php
 * @copyright Copyright (c) DOTSPLATFORM, LLC
 * @author    Yehor Herasymchuk <yehor@dotsplatform.com>
 */

namespace Dots\Uklon\Client\Requests\Webhooks;

use Dots\Uklon\Client\Requests\BaseUklonRequest;
use Saloon\Enums\Method;

/**
 * Delete a webhook created by the partner.
 *
 * If the webhook does not exist a 404 response is returned.
 */
class DeleteWebhookRequest extends BaseUklonRequest
{
    private const ENDPOINT_TEMPLATE = '/v2/laas/webhooks/%d';

    protected Method $method = Method::DELETE;

    public function __construct(
        private readonly int $webhookId,
    ) {
    }

    public function resolveEndpoint(): string
    {
        return sprintf(self::ENDPOINT_TEMPLATE, $this->webhookId);
    }
}
