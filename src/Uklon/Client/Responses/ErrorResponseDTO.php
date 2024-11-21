<?php
/**
 * Description of ErrorResponseDTO.php
 * @copyright Copyright (c) DOTSPLATFORM, LLC
 * @author    Bogdan Mamontov <bohdan.mamontov@dotsplatform.com>
 */

namespace Dots\Uklon\Client\Responses;

use Dots\Uklon\Client\Resources\Consts\ErrorCodes;

class ErrorResponseDTO extends UklonResponseDTO
{
    protected ErrorCodes $code;

    protected ?string $description;

    protected array $errors = [];

    public static function fromArray(array $data): static
    {
        $data['code'] = ErrorCodes::fromResponse($data['code'] ?? '');

        return parent::fromArray($data);
    }

    public function getCode(): ErrorCodes
    {
        return $this->code;
    }

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function getErrors(): array
    {
        return $this->errors;
    }
}
