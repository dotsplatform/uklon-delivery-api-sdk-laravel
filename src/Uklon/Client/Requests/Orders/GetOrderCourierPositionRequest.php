<?php
/**
 * Description of GetOrderCourierInformationRequest.php
 * @copyright Copyright (c) DOTSPLATFORM, LLC
 * @author    Bogdan Mamontov <bohdan.mamontov@dotsplatform.com>
 */

namespace Dots\Uklon\Client\Requests\Orders;

use Dots\Uklon\Client\Requests\BaseUklonRequest;
use Dots\Uklon\Client\Responses\Orders\OrderCourierPositionResponseDTO;
use Saloon\Http\Response;

class GetOrderCourierPositionRequest extends BaseUklonRequest
{
    private const string ENDPOINT_TEMPLATE = '/api/v1/orders/%s/driver/location';

    public function __construct(
        protected readonly string $orderId,
    ) {
    }

    public function resolveEndpoint(): string
    {
        return sprintf(self::ENDPOINT_TEMPLATE, $this->orderId);
    }

    public function createDtoFromResponse(Response $response): OrderCourierPositionResponseDTO
    {
        return OrderCourierPositionResponseDTO::fromResponse($response);
    }
}
