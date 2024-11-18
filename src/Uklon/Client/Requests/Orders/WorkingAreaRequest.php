<?php
/**
 * Description of WorkingAreaRequest.php
 * @copyright Copyright (c) DOTSPLATFORM, LLC
 * @author    Oleksandr Polosmak <o.polosmak@dotsplatform.com>
 */

namespace Dots\Uklon\Client\Requests\Orders;

use Dots\Uklon\Client\Requests\BaseUklonRequest;
use Dots\Uklon\Client\Responses\ValidateOrderResponseDTO;
use Saloon\Http\Response;

class WorkingAreaRequest extends BaseUklonRequest
{
    private const ENDPOINT = '/v2/laas/working-areas';

    public function createDtoFromResponse(Response $response): array
    {
        return $response->json();
    }

    public function resolveEndpoint(): string
    {
        return self::ENDPOINT;
    }
}
