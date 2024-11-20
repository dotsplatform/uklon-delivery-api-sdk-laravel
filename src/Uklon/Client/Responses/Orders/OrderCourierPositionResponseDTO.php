<?php
/**
 * Description of Courier.php
 * @copyright Copyright (c) DOTSPLATFORM, LLC
 * @author    Yehor Herasymchuk <yehor@dotsplatform.com>
 */

namespace Dots\Uklon\Client\Responses\Orders;

use Dots\Uklon\Client\Responses\UklonResponseDTO;

class OrderCourierPositionResponseDTO extends UklonResponseDTO
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
