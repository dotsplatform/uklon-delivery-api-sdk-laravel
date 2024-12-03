<?php
/**
 * Description of GetActiveOrdersRequest.php
 * @copyright Copyright (c) DOTSPLATFORM, LLC
 * @author    Bogdan Mamontov <bohdan.mamontov@dotsplatform.com>
 */

namespace Dots\Uklon\Client\Requests\Orders;

use Dots\Uklon\Client\Requests\BaseUklonRequest;
use Dots\Uklon\Client\Responses\Orders\OrdersInfoResponse;
use Saloon\Http\Response;

class GetActiveOrdersRequest extends BaseUklonRequest
{
    private const string ENDPOINT_TEMPLATE = '/api/v1/orders/active';

    public function resolveEndpoint(): string
    {
        return self::ENDPOINT_TEMPLATE;
    }

    public function createDtoFromResponse(Response $response): OrdersInfoResponse
    {
        return OrdersInfoResponse::fromResponse($response);
    }
}