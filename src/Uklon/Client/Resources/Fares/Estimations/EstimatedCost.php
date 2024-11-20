<?php
/**
 * Description of OrderResponse.php
 * @copyright Copyright (c) DOTSPLATFORM, LLC
 * @author    Yehor Herasymchuk <yehor@dotsplatform.com>
 */

namespace Dots\Uklon\Client\Resources\Fares\Estimations;

use Dots\Data\DTO;

class EstimatedCost extends DTO
{
    protected float $minimum;

    protected float $recommended;

    protected float $maximum;

    protected float $surge_multiplier;

    protected ?float $return;

    protected float $main_route;

    public function getMinimum(): float
    {
        return $this->minimum;
    }

    public function getRecommended(): float
    {
        return $this->recommended;
    }

    public function getMaximum(): float
    {
        return $this->maximum;
    }

    public function getSurgeMultiplier(): float
    {
        return $this->surge_multiplier;
    }

    public function getReturn(): ?float
    {
        return $this->return;
    }

    public function getMainRoute(): float
    {
        return $this->main_route;
    }
}
