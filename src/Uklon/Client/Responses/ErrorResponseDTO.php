<?php
/**
 * Description of ErrorResponseDTO.php
 * @copyright Copyright (c) DOTSPLATFORM, LLC
 * @author    Bogdan Mamontov <bohdan.mamontov@dotsplatform.com>
 */

namespace Dots\Uklon\Client\Responses;

class ErrorResponseDTO extends UklonResponseDTO
{
    protected string $subcode;

    protected string $message;

    protected array $descriptions = [];

    public function getSubcode(): string
    {
        return $this->subcode;
    }

    public function getMessage(): string
    {
        return $this->message;
    }

    public function getDescriptions(): array
    {
        return $this->descriptions;
    }
}
