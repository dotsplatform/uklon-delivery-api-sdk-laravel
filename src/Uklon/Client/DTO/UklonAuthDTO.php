<?php
/**
 * Description of UklonAuthDTO.php
 * @copyright Copyright (c) DOTSPLATFORM, LLC
 * @author    Yehor Herasymchuk <yehor@dotsplatform.com>
 */

namespace Dots\Uklon\Client\DTO;

use Dots\Data\DTO;

class UklonAuthDTO extends DTO
{
    protected string $clientId;

    protected string $clientSecret;

    public static function make(string $clientId, string $clientSecret): self
    {
        return self::fromArray([
            'clientId' => $clientId,
            'clientSecret' => $clientSecret,
        ]);
    }

    public function getClientId(): string
    {
        return $this->clientId;
    }

    public function getClientSecret(): string
    {
        return $this->clientSecret;
    }
}
