<?php
/**
 * Description of Address.php
 * @copyright Copyright (c) DOTSPLATFORM, LLC
 * @author    Bogdan Mamontov <bohdan.mamontov@dotsplatform.com>
 */

namespace Dots\Uklon\Client\Resources\Order;

use Dots\Data\DTO;
use Dots\Uklon\Client\Resources\Consts\DisabilityType;

class Driver extends DTO
{
    protected float $rating;

    protected int $marks_count;

    protected DisabilityType $disabilityType;

    protected string $image_url;

    protected int $registered_at;

    protected int $completed_orders;

    protected string $name;

    protected string $phone;

    public function getRating(): float
    {
        return $this->rating;
    }

    public function getMarksCount(): int
    {
        return $this->marks_count;
    }

    public function getDisabilityType(): DisabilityType
    {
        return $this->disabilityType;
    }

    public function getImageUrl(): string
    {
        return $this->image_url;
    }

    public function getRegisteredAt(): int
    {
        return $this->registered_at;
    }

    public function getCompletedOrders(): int
    {
        return $this->completed_orders;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function getPhone(): string
    {
        return $this->phone;
    }
}
