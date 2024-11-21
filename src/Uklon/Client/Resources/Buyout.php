<?php
/**
 * Description of Address.php
 * @copyright Copyright (c) DOTSPLATFORM, LLC
 * @author    Bogdan Mamontov <bohdan.mamontov@dotsplatform.com>
 */

namespace Dots\Uklon\Client\Resources;

use Dots\Data\DTO;

class Buyout extends DTO
{
    protected float $cost;

    public function getCost(): float
    {
        return $this->cost;
    }
}
