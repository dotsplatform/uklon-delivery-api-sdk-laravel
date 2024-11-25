<?php
/**
 * Description of CreateOrderDTO.php
 * @copyright Copyright (c) DOTSPLATFORM, LLC
 * @author    Bogdan Mamontov <bohdan.mamontov@dotsplatform.com>
 */

namespace Dots\Uklon\Client\Requests\Orders\DTO;

use Dots\Data\DTO;
use Dots\Uklon\Client\Resources\Consts\CancelReason;

class CancelOrderDTO extends DTO
{
    protected CancelReason $reason;

    public function getReason(): CancelReason
    {
        return $this->reason;
    }
}
