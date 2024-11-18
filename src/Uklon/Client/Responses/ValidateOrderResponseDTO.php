<?php
/**
 * Description of ValidateOrderResponse.php
 * @copyright Copyright (c) DOTSPLATFORM, LLC
 * @author    Yehor Herasymchuk <yehor@dotsplatform.com>
 */

namespace Dots\Uklon\Client\Responses;

use Dots\Uklon\Client\Resources\Consts\ValidationResult;

class ValidateOrderResponseDTO extends GlovoResponseDTO
{
    protected ValidationResult $validationResult;

    public static function fromArray(array $data): static
    {
        $data['validationResult'] = ValidationResult::from($data['validationResult']);

        return parent::fromArray($data);
    }

    public function isExecutable(): bool
    {
        return $this->getValidationResult()->isExecutable();
    }

    public function getValidationResult(): ValidationResult
    {
        return $this->validationResult;
    }
}
