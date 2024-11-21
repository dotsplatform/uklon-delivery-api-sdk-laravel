<?php
/**
 * Description of ValidateOrderResponseGenerator.php
 * @copyright Copyright (c) DOTSPLATFORM, LLC
 * @author    Bogdan Mamontov <bohdan.mamontov@dotsplatform.com>
 */

namespace Dots\Uklon\Mock\Data;

use Dots\Uklon\Client\Resources\Consts\ValidationResult;

class ValidateOrderResponseGenerator
{
    public static function generateSuccess(?ValidationResult $result = null): array
    {
        return [
            'validationResult' => $result->value ?? ValidationResult::EXECUTABLE->value,
        ];
    }
}
