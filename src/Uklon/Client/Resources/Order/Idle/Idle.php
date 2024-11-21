<?php
/**
 * Description of OrderResponse.php
 * @copyright Copyright (c) DOTSPLATFORM, LLC
 * @author    Yehor Herasymchuk <yehor@dotsplatform.com>
 */

namespace Dots\Uklon\Client\Resources\Order\Idle;

use Dots\Data\DTO;
use Dots\Uklon\Client\Resources\Consts\IdleState;

class Idle extends DTO
{
    protected IdleState $state;

    protected ?Free $free;

    protected ?Paid $paid;

    public function getState(): IdleState
    {
        return $this->state;
    }

    public function getFree(): ?Free
    {
        return $this->free;
    }

    public function getPaid(): ?Paid
    {
        return $this->paid;
    }
}
