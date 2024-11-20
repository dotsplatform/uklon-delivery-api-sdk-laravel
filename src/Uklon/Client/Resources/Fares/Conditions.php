<?php
/**
 * Description of PointDTO.php
 * @copyright Copyright (c) DOTSPLATFORM, LLC
 * @author    Bogdan Mamontov <bohdan.mamontov@dotsplatform.com>
 */

namespace Dots\Uklon\Client\Resources\Fares;

use Dots\Data\DTO;

class Conditions extends DTO
{
    protected ?int $max_weight_grams;

    public function getMaxWeightGrams(): ?int
    {
        return $this->max_weight_grams;
    }
}