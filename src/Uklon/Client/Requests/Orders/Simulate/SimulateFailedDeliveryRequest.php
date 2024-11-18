<?php
/**
 * Description of SimulateSuccessfullDelivery.php
 * @copyright Copyright (c) DOTSPLATFORM, LLC
 * @author    Yehor Herasymchuk <yehor@dotsplatform.com>
 */

namespace Dots\Uklon\Client\Requests\Orders\Simulate;

use Dots\Uklon\Client\Requests\PostUklonRequest;

/**
 * @url https://logistics-docs.glovoapp.com/laas-partners/index.html#operation/simulateSuccessfulAttempt
 * Simulate the state changes of a test order in a failed delivery flow.
 *
 * States will be updated internally, you can review the complete flow with the endpoint:
 */
class SimulateFailedDeliveryRequest extends PostUklonRequest
{
    private const ENDPOINT_TEMPLATE = '/v2/laas/parcels/%s/simulate/failed-attempt';

    public function __construct(
        protected readonly string $trackingNumber,
    ) {
    }

    public function resolveEndpoint(): string
    {
        return sprintf(self::ENDPOINT_TEMPLATE, $this->trackingNumber);
    }
}
