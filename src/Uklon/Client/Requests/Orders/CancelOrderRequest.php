<?php
/**
 * Description of CreateOrderRequest.php
 * @copyright Copyright (c) DOTSPLATFORM, LLC
 * @author    Yehor Herasymchuk <yehor@dotsplatform.com>
 */

namespace Dots\Uklon\Client\Requests\Orders;

use Dots\Uklon\Client\Requests\PutUklonRequest;

/**
 * @url https://logistics-docs.glovoapp.com/laas-partners/index.html#operation/cancelParcel
 * This endpoint enables you to cancel an order that is currently ongoing or scheduled for the future.
 *
 * You can cancel an order if it is in one of the following states:
 * CREATED, SCHEDULED, ACTIVATED, ACCEPTED, and WAITING_FOR_PICKUP
 *
 * Please note that if you cancel a delivery in the ACCEPTED or WAITING_FOR_PICKUP state,
 * you will incur a cancellation fee
 */
class CancelOrderRequest extends PutUklonRequest
{
    private const string ENDPOINT_TEMPLATE = '/api/v1/orders/%s/cancel';

    public function __construct(
        protected readonly string $orderId,
    ) {
    }

    public function resolveEndpoint(): string
    {
        return sprintf(self::ENDPOINT_TEMPLATE, $this->orderId);
    }
}
