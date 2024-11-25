<?php
/**
 * Description of CreateOrderRequest.php
 * @copyright Copyright (c) DOTSPLATFORM, LLC
 * @author    Bogdan Mamontov <bohdan.mamontov@dotsplatform.com>
 */

namespace Dots\Uklon\Client\Requests\Orders;

use Dots\Uklon\Client\Requests\Orders\DTO\CancelOrderDTO;
use Dots\Uklon\Client\Requests\PutUklonRequest;

class CancelOrderRequest extends PutUklonRequest
{
    private const string ENDPOINT_TEMPLATE = '/api/v1/orders/%s/cancel';

    public function __construct(
        protected readonly string $orderId,
        protected readonly CancelOrderDTO $dto,
    ) {
    }

    protected function defaultBody(): array
    {
        return $this->dto->toArray();
    }

    public function resolveEndpoint(): string
    {
        return sprintf(self::ENDPOINT_TEMPLATE, $this->orderId);
    }
}
