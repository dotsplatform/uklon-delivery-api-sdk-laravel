<?php
/**
 * Description of PointDTO.php
 * @copyright Copyright (c) DOTSPLATFORM, LLC
 * @author    Bogdan Mamontov <bohdan.mamontov@dotsplatform.com>
 */

namespace Dots\Uklon\Client\Resources\Fares;

use Dots\Data\DTO;

class Postpayment extends DTO
{
    protected string $merchant_id;

    public function getMerchantId(): string
    {
        return $this->merchant_id;
    }
}