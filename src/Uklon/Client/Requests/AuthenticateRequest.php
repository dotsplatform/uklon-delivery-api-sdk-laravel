<?php
/**
 * Description of AuthenicateRequest.php
 * @copyright Copyright (c) DOTSPLATFORM, LLC
 * @author    Bogdan Mamontov <bohdan.mamontov@dotsplatform.com>
 */

namespace Dots\Uklon\Client\Requests;

use Dots\Uklon\Client\DTO\UklonAuthDTO;
use Dots\Uklon\Client\Responses\UklonOAuthResponse;
use Saloon\Http\Response;

class AuthenticateRequest extends PostUklonRequest
{
    private const string ENDPOINT = '/api/v1/auth';

    public function __construct(
        private readonly UklonAuthDTO $dto
    ) {
    }

    public function createDtoFromResponse(Response $response): UklonOAuthResponse
    {
        return UklonOAuthResponse::fromResponse($response);
    }

    public function defaultBody(): array
    {
        return [
            'app_uid' => $this->dto->getAppUid(),
            'client_id' => $this->dto->getClientId(),
            'client_secret' => $this->dto->getClientSecret(),
        ];
    }

    public function resolveEndpoint(): string
    {
        return self::ENDPOINT;
    }
}
