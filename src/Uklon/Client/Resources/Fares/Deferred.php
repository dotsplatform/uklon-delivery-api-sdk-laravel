<?php
/**
 * Description of PointDTO.php
 * @copyright Copyright (c) DOTSPLATFORM, LLC
 * @author    Bogdan Mamontov <bohdan.mamontov@dotsplatform.com>
 */

namespace Dots\Uklon\Client\Resources\Fares;

use Dots\Data\DTO;

class Deferred extends DTO
{
    protected int $arrival;

    public function getArrival(): int
    {
        return $this->arrival;
    }
}