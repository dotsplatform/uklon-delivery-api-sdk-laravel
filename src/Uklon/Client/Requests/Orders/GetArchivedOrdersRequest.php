<?php
/**
 * Description of GetActiveOrdersRequest.php
 * @copyright Copyright (c) DOTSPLATFORM, LLC
 * @author    Bogdan Mamontov <bohdan.mamontov@dotsplatform.com>
 */

namespace Dots\Uklon\Client\Requests\Orders;

use Dots\Uklon\Client\Requests\BaseUklonRequest;
use Dots\Uklon\Client\Responses\Orders\OrdersInfoResponseDTO;
use Saloon\Http\Response;

class GetArchivedOrdersRequest extends BaseUklonRequest
{
    private const string ENDPOINT_TEMPLATE = '/api/v1/orders/archived';

    public function __construct(
        protected readonly int $limit,
        protected readonly ?string $cursor = null,
    ) {
    }

    public function resolveEndpoint(): string
    {
        $query = $this->generateQuery();
        return sprintf('%s?%s', self::ENDPOINT_TEMPLATE, $query);
    }

    public function createDtoFromResponse(Response $response): OrdersInfoResponseDTO
    {
        return OrdersInfoResponseDTO::fromResponse($response);
    }

    private function generateQuery(): string
    {
        $queryParams = [
            'limit' => $this->limit,
        ];

        if ($this->cursor) {
            $queryParams['cursor'] = $this->cursor;
        }

        return http_build_query($queryParams);
    }
}