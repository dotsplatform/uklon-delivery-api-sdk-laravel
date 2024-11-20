<?php
/**
 * Description of PointDTO.php
 * @copyright Copyright (c) DOTSPLATFORM, LLC
 * @author    Bogdan Mamontov <bohdan.mamontov@dotsplatform.com>
 */

namespace Dots\Uklon\Client\Resources\Fares\Products;

use Dots\Data\DTO;

class Products extends DTO
{
    protected ?Car $car;

    protected ?Courier $courier;

    public function getCar(): ?Car
    {
        return $this->car;
    }

    public function getCourier(): ?Courier
    {
        return $this->courier;
    }
}