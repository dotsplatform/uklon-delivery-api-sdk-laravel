<?php
/**
 * Description of OrderResponse.php
 * @copyright Copyright (c) DOTSPLATFORM, LLC
 * @author    Bogdan Mamontov <bohdan.mamontov@dotsplatform.com>
 */

namespace Dots\Uklon\Client\Resources;

use Dots\Data\DTO;

class Distance extends DTO
{
    protected int $cityMeters;

    protected int $suburbanMeters;

    public function getTotalDistance(): int
    {
        return $this->cityMeters + $this->suburbanMeters;
    }

    public function getCityMeters(): int
    {
        return $this->cityMeters;
    }

    public function getSuburbanMeters(): int
    {
        return $this->suburbanMeters;
    }
}
