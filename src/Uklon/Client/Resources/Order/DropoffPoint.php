<?php
/**
 * Description of PointDTO.php
 * @copyright Copyright (c) DOTSPLATFORM, LLC
 * @author    Bogdan Mamontov <bohdan.mamontov@dotsplatform.com>
 */

namespace Dots\Uklon\Client\Resources\Order;

use Dots\Data\DTO;
use Dots\Uklon\Client\Resources\Consts\DropoffStatus;

class DropoffPoint extends DTO
{
    protected float $latitude;

    protected float $longitude;

    protected ?string $address;

    protected DropoffStatus $status;

    protected int $id;

    public function isSameAddress(string $address): bool
    {
        if ($this->address === null) {
            return false;
        }

        return $this->address === $address;
    }

    public function getLatitude(): float
    {
        return $this->latitude;
    }

    public function getLongitude(): float
    {
        return $this->longitude;
    }

    public function getAddress(): ?string
    {
        return $this->address;
    }

    public function getStatus(): DropoffStatus
    {
        return $this->status;
    }

    public function getId(): int
    {
        return $this->id;
    }
}