<?php
/**
 * Description of UklonAuthDTO.php
 * @copyright Copyright (c) DOTSPLATFORM, LLC
 * @author    Bogdan Mamontov <bohdan.mamontov@dotsplatform.com>
 */

namespace Dots\Uklon\Client\DTO;

use Dots\Data\DTO;

class UklonAuthDTO extends DTO
{
    protected string $appUid;

    protected string $clientId;

    protected string $clientSecret;

    public static function make(
        string $appUid,
        string $clientId,
        string $clientSecret,
    ): self {
        return self::fromArray([
            'appUid' => $appUid,
            'clientId' => $clientId,
            'clientSecret' => $clientSecret,
        ]);
    }

    public function getAppUid(): string
    {
        return $this->appUid;
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
