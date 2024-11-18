<?php
/**
 * Description of PickupDetails.php
 * @copyright Copyright (c) DOTSPLATFORM, LLC
 * @author    Yehor Herasymchuk <yehor@dotsplatform.com>
 */

namespace Dots\Uklon\Client\Resources\Order;

use Dots\Data\DTO;
use Dots\Uklon\Client\Resources\Address;
use Dots\Uklon\Client\Resources\UklonDateTime;

class PickupDetails extends DTO
{
    protected Address $address;

    protected ?string $pickupOrderCode;

    protected ?UklonDateTime $pickupTime;

    protected ?string $pickupPhone;

    public static function fromArray(array $data): static
    {
        $data['pickupTime'] = isset($data['pickupTime']) ? UklonDateTime::fromString($data['pickupTime']) : null;

        return parent::fromArray($data);
    }

    public function toArray(): array
    {
        $data = parent::toArray();
        $data['pickupTime'] = $this->getPickupTime()?->__toString();

        return $data;
    }

    public function getAddress(): Address
    {
        return $this->address;
    }

    public function getPickupOrderCode(): ?string
    {
        return $this->pickupOrderCode;
    }

    public function getPickupTime(): ?UklonDateTime
    {
        return $this->pickupTime;
    }

    public function getPickupPhone(): ?string
    {
        return $this->pickupPhone;
    }
}
