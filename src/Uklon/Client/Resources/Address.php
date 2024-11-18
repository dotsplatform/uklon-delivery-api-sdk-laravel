<?php
/**
 * Description of Address.php
 * @copyright Copyright (c) DOTSPLATFORM, LLC
 * @author    Yehor Herasymchuk <yehor@dotsplatform.com>
 */

namespace Dots\Uklon\Client\Resources;

use Dots\Data\DTO;

class Address extends DTO
{
    protected string $rawAddress;

    protected string $cityName;

    protected ?string $country;

    protected ?string $postalCode;

    protected ?string $details;

    protected ?string $streetName;

    protected ?string $streetNumber;

    protected ?Coordinates $coordinates;

    public function getRawAddress(): string
    {
        return $this->rawAddress;
    }

    public function getCityName(): string
    {
        return $this->cityName;
    }

    public function getCountry(): ?string
    {
        return $this->country;
    }

    public function getPostalCode(): ?string
    {
        return $this->postalCode;
    }

    public function getDetails(): ?string
    {
        return $this->details;
    }

    public function getStreetName(): ?string
    {
        return $this->streetName;
    }

    public function getStreetNumber(): ?string
    {
        return $this->streetNumber;
    }

    public function getCoordinates(): ?Coordinates
    {
        return $this->coordinates;
    }
}
