<?php
/**
 * Description of GetOrderCourierInformationRequest.php
 * @copyright Copyright (c) DOTSPLATFORM, LLC
 * @author    Bogdan Mamontov <bohdan.mamontov@dotsplatform.com>
 */

namespace Dots\Uklon\Client\Requests\Cities;

use Dots\Uklon\Client\Requests\BaseUklonRequest;
use Dots\Uklon\Client\Responses\Cities\CitiesResponseDTO;
use Dots\Uklon\Client\Responses\Orders\OrderCourierPositionResponseDTO;
use Saloon\Http\Response;

/**
 * Get cities list
 *
 * Get the available cities for delivery
 */
class GetCitiesRequest extends BaseUklonRequest
{
    private const string ENDPOINT_TEMPLATE = '/api/v1/cities';

    public function resolveEndpoint(): string
    {
        return self::ENDPOINT_TEMPLATE;
    }

    public function createDtoFromResponse(Response $response): CitiesResponseDTO
    {
        return CitiesResponseDTO::fromResponse($response);
    }
}
