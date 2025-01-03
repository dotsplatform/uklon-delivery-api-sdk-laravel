<?php
/**
 * Description of OrderResponse.php
 * @copyright Copyright (c) DOTSPLATFORM, LLC
 * @author    Bogdan Mamontov <bohdan.mamontov@dotsplatform.com>
 */

namespace Dots\Uklon\Client\Resources\Fares\Estimations;

use Dots\Data\DTO;

class EstimatedProducts extends DTO
{
    protected ?EstimatedProduct $car;

    protected ?EstimatedProduct $courier;

    public static function fromArray(array $data): static
    {
        if (isset($data['car'])) {
            $data['car'] = EstimatedProduct::fromArray($data['car']);
        }
        if (isset($data['courier'])) {
            $data['courier'] = EstimatedProduct::fromArray($data['courier']);
        }

        return parent::fromArray($data);
    }

    public function isEmpty(): bool
    {
        return !$this->car && !$this->courier;
    }

    public function getCar(): ?EstimatedProduct
    {
        return $this->car;
    }

    public function getCourier(): ?EstimatedProduct
    {
        return $this->courier;
    }
}
