<?php
/**
 * Description of PickupDetails.php
 * @copyright Copyright (c) DOTSPLATFORM, LLC
 * @author    Yehor Herasymchuk <yehor@dotsplatform.com>
 */

namespace Dots\Uklon\Client\Resources\Order;

use Dots\Data\DTO;

class Times extends DTO
{
    protected int $creation;

    protected ?int $acceptance;

    protected ?int $arrival;

    protected ?int $estimated_arrival;

    public function getCreation(): int
    {
        return $this->creation;
    }

    public function getAcceptance(): ?int
    {
        return $this->acceptance;
    }

    public function getArrival(): ?int
    {
        return $this->arrival;
    }

    public function getEstimatedArrival(): ?int
    {
        return $this->estimated_arrival;
    }
}
