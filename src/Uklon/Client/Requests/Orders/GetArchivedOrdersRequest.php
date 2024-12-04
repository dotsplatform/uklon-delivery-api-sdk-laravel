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

class GetArchivedOrdersRequest extends BaseUklonRequest
{
    private const string ENDPOINT_TEMPLATE = '/api/v1/orders/archived';

    public function __construct(
        protected readonly int $limit,
    ) {
    }

    public function resolveEndpoint(): string
    {
        $query = http_build_query(['limit' => $this->limit]);
        return sprintf('%s?%s', self::ENDPOINT_TEMPLATE, $query);
    }

    public function createDtoFromResponse(Response $response): OrdersInfoResponse
    {
        return OrdersInfoResponse::fromResponse($response);
    }
}