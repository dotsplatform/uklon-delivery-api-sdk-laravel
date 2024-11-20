<?php
/**
 * Description of PackageDetails.php
 * @copyright Copyright (c) DOTSPLATFORM, LLC
 * @author    Yehor Herasymchuk <yehor@dotsplatform.com>
 */

namespace Dots\Uklon\Client\Resources\Order;

use Dots\Data\DTO;

class PackageDetails extends DTO
{
    protected ?string $description;

    protected ?float $parcelValue;

    protected ?float $weight;

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function getParcelValue(): ?float
    {
        return $this->parcelValue;
    }

    public function getWeight(): ?float
    {
        return $this->weight;
    }
}
