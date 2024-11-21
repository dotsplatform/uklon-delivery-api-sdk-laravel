<?php
/**
 * Description of Address.php
 * @copyright Copyright (c) DOTSPLATFORM, LLC
 * @author    Yehor Herasymchuk <yehor@dotsplatform.com>
 */

namespace Dots\Uklon\Client\Resources\Order;

use Dots\Data\DTO;
use Dots\Uklon\Client\Resources\Distance;

class Route extends DTO
{
    protected int $city;

    protected Distance $distance;

    protected Points $points;

    public function getCity(): int
    {
        return $this->city;
    }

    public function getDistance(): Distance
    {
        return $this->distance;
    }

    public function getPoints(): Points
    {
        return $this->points;
    }
}
