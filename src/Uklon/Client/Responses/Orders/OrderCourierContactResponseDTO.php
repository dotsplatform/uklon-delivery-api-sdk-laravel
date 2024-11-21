<?php
/**
 * Description of Courier.php
 * @copyright Copyright (c) DOTSPLATFORM, LLC
 * @author    Bogdan Mamontov <bohdan.mamontov@dotsplatform.com>
 */

namespace Dots\Uklon\Client\Responses\Orders;

use Dots\Uklon\Client\Responses\UklonResponseDTO;

class OrderCourierContactResponseDTO extends UklonResponseDTO
{
    protected string $courierName;

    // +34666666666
    protected string $courierPhone;

    public function getCourierName(): string
    {
        return $this->courierName;
    }

    public function getCourierPhone(): string
    {
        return $this->courierPhone;
    }
}
