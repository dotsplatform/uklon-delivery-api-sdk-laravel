<?php
/**
 * Description of CreateOrderRequest.php
 * @copyright Copyright (c) DOTSPLATFORM, LLC
 * @author    Yehor Herasymchuk <yehor@dotsplatform.com>
 */

namespace Dots\Uklon\Client\Requests\Fares;

use Dots\Uklon\Client\Requests\Fares\DTO\CreateFareDTO;
use Dots\Uklon\Client\Requests\PostUklonRequest;
use Dots\Uklon\Client\Responses\Fares\FareResponseDTO;
use Saloon\Http\Response;

class CreateFareRequest extends PostUklonRequest
{
    private const string ENDPOINT = '/api/v1/fares/estimate';

    public function __construct(
        protected readonly CreateFareDTO $dto,
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

    public function createDtoFromResponse(Response $response): FareResponseDTO
    {
        return FareResponseDTO::fromResponse($response);
    }
}
