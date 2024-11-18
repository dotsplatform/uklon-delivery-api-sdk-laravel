<?php
/**
 * Description of PackageDetails.php
 * @copyright Copyright (c) DOTSPLATFORM, LLC
 * @author    Yehor Herasymchuk <yehor@dotsplatform.com>
 */

namespace Dots\Uklon\Client\Resources\Order;

use Dots\Data\DTO;
use Dots\Uklon\Client\Resources\Consts\PackageContentType;

class PackageDetails extends DTO
{
    protected PackageContentType $contentType;

    protected ?string $description;

    protected ?float $parcelValue;

    protected ?float $weight;

    public function getContentType(): PackageContentType
    {
        return $this->contentType;
    }

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
