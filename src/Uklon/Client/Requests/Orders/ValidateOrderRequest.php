<?php
/**
 * Description of CreateOrderRequest.php
 * @copyright Copyright (c) DOTSPLATFORM, LLC
 * @author    Yehor Herasymchuk <yehor@dotsplatform.com>
 */

namespace Dots\Uklon\Client\Requests\Orders;

use Dots\Uklon\Client\Requests\Orders\DTO\ValidateOrderDTO;
use Dots\Uklon\Client\Requests\PostUklonRequest;
use Dots\Uklon\Client\Responses\ValidateOrderResponseDTO;
use Saloon\Http\Response;

/**
 * Before creating an order, you can use this endpoint to validate if it can be executed.
 * This validation process ensures that the relevant city is available and
 * that the pickup time falls within the active time of the platform.
 *
 * This endpoint geolocates a point based on the address provided in the rawAddress field.
 * The coordinates field is optional and can be used to provide more accurate geolocation information.
 * However, if coordinates are provided, they will take precedence over rawAddress in determining the location of the point.
 */
class ValidateOrderRequest extends PostUklonRequest
{
    private const ENDPOINT = '/v2/laas/parcels/validation';

    public function __construct(
        protected readonly ValidateOrderDTO $dto,
    ) {
    }

    public function createDtoFromResponse(Response $response): ValidateOrderResponseDTO
    {
        return ValidateOrderResponseDTO::fromResponse($response);
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
