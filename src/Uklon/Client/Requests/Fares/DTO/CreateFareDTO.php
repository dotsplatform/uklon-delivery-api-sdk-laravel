<?php
/**
 * Description of CreateOrderDTO.php
 * @copyright Copyright (c) DOTSPLATFORM, LLC
 * @author    Bogdan Mamontov <bohdan.mamontov@dotsplatform.com>
 */

namespace Dots\Uklon\Client\Requests\Fares\DTO;

use Dots\Data\DTO;
use Dots\Uklon\Client\Resources\Fares\Conditions;
use Dots\Uklon\Client\Resources\Fares\PointsDetails;
use Dots\Uklon\Client\Resources\Fares\Products\Products;
use Dots\Uklon\Client\Resources\Point;

class CreateFareDTO extends DTO
{
    protected int $city;

    protected Point $pickup_point;

    protected PointsDetails $dropoff_points;

    protected ?Products $products;

    protected ?Conditions $conditions;

    protected ?string $strategy_id;

    public function getCity(): int
    {
        return $this->city;
    }

    public function getPickupPoint(): Point
    {
        return $this->pickup_point;
    }

    public function getDropoffPoints(): PointsDetails
    {
        return $this->dropoff_points;
    }

    public function getProducts(): ?Products
    {
        return $this->products;
    }

    public function getConditions(): ?Conditions
    {
        return $this->conditions;
    }

    public function getStrategyId(): ?string
    {
        return $this->strategy_id;
    }
}
