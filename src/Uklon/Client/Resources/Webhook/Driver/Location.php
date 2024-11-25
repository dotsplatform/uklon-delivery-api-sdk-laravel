<?php
/**
 * Description of WebhookOrder.php
 * @copyright Copyright (c) DOTSPLATFORM, LLC
 * @author    Bogdan Mamontov <bohdan.mamontov@dotsplatform.com>
 */

namespace Dots\Uklon\Client\Resources\Webhook\Driver;

use Dots\Data\DTO;

class Location extends DTO
{
    protected float $latitude;

    protected float $longitude;

    protected int $eta;

    public function getLatitude(): float
    {
        return $this->latitude;
    }

    public function getLongitude(): float
    {
        return $this->longitude;
    }

    public function getEta(): int
    {
        return $this->eta;
    }
}