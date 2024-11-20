<?php
/**
 * Description of CreateOrderRequest.php
 * @copyright Copyright (c) DOTSPLATFORM, LLC
 * @author    Yehor Herasymchuk <yehor@dotsplatform.com>
 */

namespace Dots\Uklon\Client\Requests\Orders;

use Dots\Uklon\Client\Requests\BaseUklonRequest;
use Dots\Uklon\Client\Responses\Orders\OrderResponseDTO;
use Saloon\Http\Response;

/**
 * @url https://logistics-docs.glovoapp.com/laas-partners/index.html#operation/getParcelByTrackingNumber
 * Get the complete information of an Order by Tracking Number.
 */
class GetOrderRequest extends BaseUklonRequest
{
    private const ENDPOINT_TEMPLATE = '/v2/laas/parcels/%s';

    public function __construct(
        protected readonly string $trackingNumber,
    ) {
    }

    public function resolveEndpoint(): string
    {
        return sprintf(self::ENDPOINT_TEMPLATE, $this->trackingNumber);
    }

    public function createDtoFromResponse(Response $response): OrderResponseDTO
    {
        return OrderResponseDTO::fromResponse($response);
    }
}
