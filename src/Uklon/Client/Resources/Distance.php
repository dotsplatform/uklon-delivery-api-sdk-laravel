<?php
/**
 * Description of OrderResponse.php
 * @copyright Copyright (c) DOTSPLATFORM, LLC
 * @author    Yehor Herasymchuk <yehor@dotsplatform.com>
 */

namespace Dots\Uklon\Client\Resources;

use Dots\Data\DTO;

class Distance extends DTO
{
    protected int $cityMeters;

    protected int $suburbanMeters;

    public function getCityMeters(): int
    {
        return $this->cityMeters;
    }

    public function getSuburbanMeters(): int
    {
        return $this->suburbanMeters;
    }
}
