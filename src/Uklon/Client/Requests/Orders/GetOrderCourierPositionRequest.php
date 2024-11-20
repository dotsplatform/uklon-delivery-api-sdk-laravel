<?php
/**
 * Description of GetOrderCourierInformationRequest.php
 * @copyright Copyright (c) DOTSPLATFORM, LLC
 * @author    Yehor Herasymchuk <yehor@dotsplatform.com>
 */

namespace Dots\Uklon\Client\Requests\Orders;

use Dots\Uklon\Client\Requests\BaseUklonRequest;
use Dots\Uklon\Client\Responses\Orders\OrderCourierPositionResponseDTO;
use Saloon\Http\Response;

/**
 * @url https://logistics-docs.glovoapp.com/laas-partners/index.html#operation/getCourierPosition
 *
 * Get courier position
 *
 * This endpoint retrieves the live location of the courier assigned to a particular order.
 */
class GetOrderCourierPositionRequest extends BaseUklonRequest
{
    private const string ENDPOINT_TEMPLATE = '/api/v1/orders/%s/driver/location';

    public function __construct(
        protected readonly string $trackingNumber,
    ) {
    }

    public function resolveEndpoint(): string
    {
        return sprintf(self::ENDPOINT_TEMPLATE, $this->trackingNumber);
    }

    public function createDtoFromResponse(Response $response): OrderCourierPositionResponseDTO
    {
        return OrderCourierPositionResponseDTO::fromResponse($response);
    }
}
