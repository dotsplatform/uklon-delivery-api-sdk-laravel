<?php
/**
 * Description of RegisterWebhookRequest.php
 * @copyright Copyright (c) DOTSPLATFORM, LLC
 * @author    Yehor Herasymchuk <yehor@dotsplatform.com>
 */

namespace Dots\Uklon\Client\Requests\Webhooks\Simulate;

use Dots\Uklon\Client\Requests\BaseUklonRequest;
use Saloon\Enums\Method;

/**
 * STAGE ONLY
 *
 * Simulate a webhook call for a given webhook.
 *
 * After receiving this request the system will call the callbackUrl with a simulated update.
 */
class SimulateWebhookRequest extends BaseUklonRequest
{
    private const ENDPOINT_TEMPLATE = '/v2/laas/webhooks/%d/simulate';

    protected Method $method = Method::POST;

    public function __construct(
        private readonly int $webhookId,
    ) {
    }

    public function resolveEndpoint(): string
    {
        return sprintf(self::ENDPOINT_TEMPLATE, $this->webhookId);
    }
}
