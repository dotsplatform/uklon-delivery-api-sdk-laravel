<?php
/**
 * Description of GlovoOAuthResponse.php
 * @copyright Copyright (c) DOTSPLATFORM, LLC
 * @author    Yehor Herasymchuk <yehor@dotsplatform.com>
 */

namespace Dots\Uklon\Client\Responses;

use Saloon\Http\Response;

class UklonOAuthResponse extends UklonResponseDTO
{
    protected string $accessToken;

    protected int $expiresAt;

    protected string $refreshToken;

    protected ?string $twoFactorToken;

    protected string $tokenType;

    protected ?string $scope;

    public static function fromResponse(Response $response): static
    {
        $data = $response->json();
        $data['expiresAt'] = time() + $data['expiresIn'];

        return static::fromArray($data);
    }

    public static function fromArray(array $data): static
    {
        return parent::fromArray($data);
    }

    public function getAccessToken(): string
    {
        return $this->accessToken;
    }

    public function getExpiresAt(): int
    {
        return $this->expiresAt;
    }

    public function getRefreshToken(): string
    {
        return $this->refreshToken;
    }

    public function getTwoFactorToken(): ?string
    {
        return $this->twoFactorToken;
    }

    public function getTokenType(): string
    {
        return $this->tokenType;
    }

    public function getScope(): ?string
    {
        return $this->scope;
    }

    public function isExpired(): bool
    {
        return $this->expiresAt < time();
    }
}
