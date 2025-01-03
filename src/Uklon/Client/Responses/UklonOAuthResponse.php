<?php
/**
 * Description of UklonOAuthResponse.php
 * @copyright Copyright (c) DOTSPLATFORM, LLC
 * @author    Bogdan Mamontov <bohdan.mamontov@dotsplatform.com>
 */

namespace Dots\Uklon\Client\Responses;

use Saloon\Http\Response;

class UklonOAuthResponse extends UklonResponseDTO
{
    protected string $accessToken;

    protected ?string $clientId;

    protected int $expiresIn;

    protected ?string $expires;

    protected ?string $issued;

    public static function fromResponse(Response $response): static
    {
        $data = $response->json();
        $data['accessToken'] = $data['access_token'];
        $data['clientId'] = $data['client_id'] ?? null;
        $data['expiresIn'] = $data['expires_in'];

        return static::fromArray($data);
    }

    public function getAccessToken(): string
    {
        return $this->accessToken;
    }

    public function getClientId(): ?string
    {
        return $this->clientId;
    }

    public function getExpiresIn(): int
    {
        return $this->expiresIn;
    }

    public function getExpires(): ?string
    {
        return $this->expires;
    }

    public function getIssued(): ?string
    {
        return $this->issued;
    }
}
