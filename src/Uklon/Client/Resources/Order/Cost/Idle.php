<?php
/**
 * Description of OrderResponse.php
 * @copyright Copyright (c) DOTSPLATFORM, LLC
 * @author    Yehor Herasymchuk <yehor@dotsplatform.com>
 */

namespace Dots\Uklon\Client\Resources\Order\Cost;

use Dots\Data\DTO;

class Idle extends DTO
{
    protected float $amount;

    protected int $minutes;

    public function getAmount(): float
    {
        return $this->amount;
    }

    public function getMinutes(): int
    {
        return $this->minutes;
    }
}
