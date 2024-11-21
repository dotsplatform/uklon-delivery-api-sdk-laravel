<?php
/**
 * Description of Courier.php
 * @copyright Copyright (c) DOTSPLATFORM, LLC
 * @author    Bogdan Mamontov <bohdan.mamontov@dotsplatform.com>
 */

namespace Dots\Uklon\Client\Responses\Orders;

use Dots\Uklon\Client\Responses\UklonResponseDTO;

class OrderCourierPositionResponseDTO extends UklonResponseDTO
{
    protected float $latitude;

    protected float $longitude;

    protected ?int $bearing;

    protected ?int $next_point_eta;

    public function getLatitude(): float
    {
        return $this->latitude;
    }

    public function getLongitude(): float
    {
        return $this->longitude;
    }

    public function getBearing(): ?int
    {
        return $this->bearing;
    }

    public function getNextPointEta(): ?int
    {
        return $this->next_point_eta;
    }
}
