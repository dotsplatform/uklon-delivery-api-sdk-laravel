<?php
/**
 * Description of CreateOrderRequest.php
 * @copyright Copyright (c) DOTSPLATFORM, LLC
 * @author    Bogdan Mamontov <bohdan.mamontov@dotsplatform.com>
 */

namespace Dots\Uklon\Client\Requests\Orders;

use Dots\Uklon\Client\Requests\Orders\DTO\CreateOrderDTO;
use Dots\Uklon\Client\Requests\PostUklonRequest;
use Dots\Uklon\Client\Responses\Orders\OrderResponseDTO;
use Saloon\Http\Response;

class CreateOrderRequest extends PostUklonRequest
{
    private const string ENDPOINT = '/api/v1/orders';

    public function __construct(
        protected readonly CreateOrderDTO $dto,
    ) {
    }

    protected function defaultBody(): array
    {
        return $this->dto->toArray();
    }

    public function resolveEndpoint(): string
    {
        return self::ENDPOINT;
    }
}
