<?php
/**
 * Description of OrderResponse.php
 * @copyright Copyright (c) DOTSPLATFORM, LLC
 * @author    Bogdan Mamontov <bohdan.mamontov@dotsplatform.com>
 */

namespace Dots\Uklon\Client\Resources\Fares\Estimations;

use Dots\Data\DTO;

class ProductEstimation extends DTO
{
    protected EstimatedCost $cost;

    protected EstimatedRoute $route;

    public static function fromArray(array $data): static
    {
        $data['cost'] = EstimatedCost::fromArray($data['cost']);
        $data['route'] = EstimatedRoute::fromArray($data['route']);

        return parent::fromArray($data);
    }

    public function getCost(): EstimatedCost
    {
        return $this->cost;
    }

    public function getRoute(): EstimatedRoute
    {
        return $this->route;
    }
}
