<?php
/**
 * Description of OrderPrice.php
 * @copyright Copyright (c) DOTSPLATFORM, LLC
 * @author    Yehor Herasymchuk <yehor@dotsplatform.com>
 */

namespace Dots\Uklon\Client\Resources\Order;

use Dots\Data\DTO;
use Dots\Uklon\Client\Resources\Price;

class OrderPrice extends DTO
{
    protected Price $delivery;

    protected Price $parcel;

    public function getDelivery(): Price
    {
        return $this->delivery;
    }

    public function getParcel(): Price
    {
        return $this->parcel;
    }
}
