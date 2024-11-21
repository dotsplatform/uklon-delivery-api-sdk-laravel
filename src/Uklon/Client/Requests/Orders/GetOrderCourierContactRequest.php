<?php
/**
 * Description of GetOrderCourierInformationRequest.php
 * @copyright Copyright (c) DOTSPLATFORM, LLC
 * @author    Bogdan Mamontov <bohdan.mamontov@dotsplatform.com>
 */

namespace Dots\Uklon\Client\Requests\Orders;

use Dots\Uklon\Client\Requests\BaseUklonRequest;
use Dots\Uklon\Client\Responses\Orders\OrderCourierContactResponseDTO;
use Saloon\Http\Response;

class GetOrderCourierContactRequest extends BaseUklonRequest
{
    private const ENDPOINT_TEMPLATE = '/v2/laas/parcels/%s/courier-contact';

    public function __construct(
        protected readonly string $trackingNumber,
    ) {
    }

    public function resolveEndpoint(): string
    {
        return sprintf(self::ENDPOINT_TEMPLATE, $this->trackingNumber);
    }

    public function createDtoFromResponse(Response $response): OrderCourierContactResponseDTO
    {
        return OrderCourierContactResponseDTO::fromResponse($response);
    }
}
