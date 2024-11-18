<?php
/**
 * Description of Courier.php
 * @copyright Copyright (c) DOTSPLATFORM, LLC
 * @author    Yehor Herasymchuk <yehor@dotsplatform.com>
 */

namespace Dots\Uklon\Client\Responses;

class OrderCourierPositionResponseDTO extends GlovoResponseDTO
{
    protected float $latitude;

    protected float $longitude;

    public function getLatitude(): float
    {
        return $this->latitude;
    }

    public function getLongitude(): float
    {
        return $this->longitude;
    }
}
