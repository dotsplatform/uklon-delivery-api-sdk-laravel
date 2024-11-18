<?php
/**
 * Description of CreateOrderDTO.php
 * @copyright Copyright (c) DOTSPLATFORM, LLC
 * @author    Yehor Herasymchuk <yehor@dotsplatform.com>
 */

namespace Dots\Uklon\Client\Requests\Orders\DTO;

use Dots\Data\DTO;
use Dots\Uklon\Client\Resources\Address;
use Dots\Uklon\Client\Resources\Contact;
use Dots\Uklon\Client\Resources\Order\OrderPrice;
use Dots\Uklon\Client\Resources\Order\PackageDetails;
use Dots\Uklon\Client\Resources\Order\PickupDetails;

class CreateOrderDTO extends DTO
{
    // Order delivery address
    protected Address $address;

    // Contact of the recipient
    protected Contact $contact;

    protected ?PackageDetails $packageDetails;

    protected ?string $packageId;

    protected PickupDetails $pickupDetails;

    protected ?OrderPrice $price;

    public function toRequestData(bool $stageEnv): array
    {
        $data = $this->toArray();
        if ($stageEnv) {
            $data['price'] = null;
        }

        return $data;
    }

    public function getAddress(): Address
    {
        return $this->address;
    }

    public function getContact(): Contact
    {
        return $this->contact;
    }

    public function getPackageDetails(): ?PackageDetails
    {
        return $this->packageDetails;
    }

    public function getPackageId(): ?string
    {
        return $this->packageId;
    }

    public function getPickupDetails(): PickupDetails
    {
        return $this->pickupDetails;
    }

    public function getPrice(): ?OrderPrice
    {
        return $this->price;
    }
}
