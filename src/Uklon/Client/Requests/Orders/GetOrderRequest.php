<?php
/**
 * Description of CreateOrderRequest.php
 * @copyright Copyright (c) DOTSPLATFORM, LLC
 * @author    Bogdan Mamontov <bohdan.mamontov@dotsplatform.com>
 */

namespace Dots\Uklon\Client\Requests\Orders;

use Dots\Uklon\Client\Requests\BaseUklonRequest;
use Dots\Uklon\Client\Responses\Orders\OrderResponseDTO;
use Saloon\Http\Response;

class GetOrderRequest extends BaseUklonRequest
{
    private const string ENDPOINT_TEMPLATE = '/api/v1/orders/%s';

    public function __construct(
        protected readonly string $orderId,
    ) {
    }

    public function resolveEndpoint(): string
    {
        return sprintf(self::ENDPOINT_TEMPLATE, $this->orderId);
    }

    public function createDtoFromResponse(Response $response): OrderResponseDTO
    {
        return OrderResponseDTO::fromResponse($response);
    }
}
