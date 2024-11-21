<?php
/**
 * Description of GetOrderCourierInformationRequest.php
 * @copyright Copyright (c) DOTSPLATFORM, LLC
 * @author    Yehor Herasymchuk <yehor@dotsplatform.com>
 */

namespace Dots\Uklon\Client\Requests\Cities;

use Dots\Uklon\Client\Requests\BaseUklonRequest;
use Dots\Uklon\Client\Responses\Cities\CitiesResponseDTO;
use Dots\Uklon\Client\Responses\Orders\OrderCourierPositionResponseDTO;
use Saloon\Http\Response;

/**
 * @url https://logistics-docs.glovoapp.com/laas-partners/index.html#operation/getCourierPosition
 *
 * Get courier position
 *
 * This endpoint retrieves the live location of the courier assigned to a particular order.
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
