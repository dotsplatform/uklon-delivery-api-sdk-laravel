<?php
/**
 * Description of OrderResponse.php
 * @copyright Copyright (c) DOTSPLATFORM, LLC
 * @author    Bogdan Mamontov <bohdan.mamontov@dotsplatform.com>
 */

namespace Dots\Uklon\Client\Resources\Order\Cost;

use Dots\Data\DTO;
use Dots\Uklon\Client\Resources\Buyout;

class Cost extends DTO
{
    protected string $currency;

    protected float $total;

    protected float $minimum = 0;

    protected float $maximum = 0;

    protected float $route;

    protected ?float $return;

    protected ?Buyout $buyout;

    protected ?Idle $idle;

    public function getCurrency(): string
    {
        return $this->currency;
    }

    public function getTotal(): float
    {
        return $this->total;
    }

    public function getMinimum(): float
    {
        return $this->minimum;
    }

    public function getMaximum(): float
    {
        return $this->maximum;
    }

    public function getRoute(): float
    {
        return $this->route;
    }

    public function getReturn(): ?float
    {
        return $this->return;
    }

    public function getBuyout(): Buyout
    {
        return $this->buyout;
    }

    public function getIdle(): Idle
    {
        return $this->idle;
    }
}
