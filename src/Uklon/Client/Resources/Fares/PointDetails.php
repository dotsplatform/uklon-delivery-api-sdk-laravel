<?php
/**
 * Description of PointDTO.php
 * @copyright Copyright (c) DOTSPLATFORM, LLC
 * @author    Bogdan Mamontov <bohdan.mamontov@dotsplatform.com>
 */

namespace Dots\Uklon\Client\Resources\Fares;

use Dots\Data\DTO;

class PointDetails extends DTO
{
    protected float $latitude;

    protected float $longitude;

    protected ?string $address;

    public function getLatitude(): float
    {
        return $this->latitude;
    }

    public function getLongitude(): float
    {
        return $this->longitude;
    }

    public function getAddress(): ?string
    {
        return $this->address;
    }
}