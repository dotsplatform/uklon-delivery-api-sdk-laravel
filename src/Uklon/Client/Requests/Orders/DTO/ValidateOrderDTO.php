<?php
/**
 * Description of CreateOrderDTO.php
 * @copyright Copyright (c) DOTSPLATFORM, LLC
 * @author    Yehor Herasymchuk <yehor@dotsplatform.com>
 */

namespace Dots\Uklon\Client\Requests\Orders\DTO;

use Dots\Data\DTO;
use Dots\Uklon\Client\Resources\Address;
use Dots\Uklon\Client\Resources\Order\PickupDetails;

class ValidateOrderDTO extends DTO
{
    protected Address $address;

    protected PickupDetails $pickupDetails;

    public function getAddress(): Address
    {
        return $this->address;
    }

    public function getPickupDetails(): PickupDetails
    {
        return $this->pickupDetails;
    }
}
