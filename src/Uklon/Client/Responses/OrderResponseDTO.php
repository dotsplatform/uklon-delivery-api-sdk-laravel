<?php
/**
 * Description of OrderResponse.php
 * @copyright Copyright (c) DOTSPLATFORM, LLC
 * @author    Yehor Herasymchuk <yehor@dotsplatform.com>
 */

namespace Dots\Uklon\Client\Responses;

use Dots\Uklon\Client\Resources\Address;
use Dots\Uklon\Client\Resources\Contact;
use Dots\Uklon\Client\Resources\EstimatedTimeOfArrival;
use Dots\Uklon\Client\Resources\Order\OrderPrice;
use Dots\Uklon\Client\Resources\Order\OrderStatus;
use Dots\Uklon\Client\Resources\Order\PackageDetails;
use Dots\Uklon\Client\Resources\Order\PickupDetails;
use Dots\Uklon\Client\Resources\Order\StateChangeHistoryList;

class OrderResponseDTO extends UklonResponseDTO
{
    protected string $trackingNumber;

    protected ?string $orderCode;

    protected bool $cancellable = true;

    protected ?EstimatedTimeOfArrival $estimatedTimeOfArrival;

    protected OrderStatus $status;

    protected StateChangeHistoryList $stateChangeHistory;

    protected Address $address;

    protected Contact $contact;

    protected ?PackageDetails $packageDetails;

    protected ?string $packageId;

    protected string $partnerId;

    protected PickupDetails $pickupDetails;

    protected ?OrderPrice $price;

    public static function fromArray(array $data): static
    {
        $data['estimatedTimeOfArrival'] = ! empty($data['estimatedTimeOfArrival']) ?
                EstimatedTimeOfArrival::fromArray($data['estimatedTimeOfArrival']) :
                null;
        $data['status'] = OrderStatus::fromArray($data['status']);
        $data['stateChangeHistory'] = StateChangeHistoryList::fromArray($data['stateChangeHistory'] ?? []);
        $data['address'] = Address::fromArray($data['address']);
        $data['contact'] = Contact::fromArray($data['contact']);
        $data['packageDetails'] = PackageDetails::fromArray($data['packageDetails']);
        $data['pickupDetails'] = PickupDetails::fromArray($data['pickupDetails']);
        $data['price'] = ! empty($data['price']) ? OrderPrice::fromArray($data['price']) : null;

        return parent::fromArray($data);
    }

    public function canHaveCourierDetails(): bool
    {
        return $this->getStatus()->isCourierAssignedStatus();
    }

    public function getTrackingNumber(): string
    {
        return $this->trackingNumber;
    }

    public function getOrderCode(): ?string
    {
        return $this->orderCode;
    }

    public function isCancellable(): bool
    {
        return $this->cancellable;
    }

    public function getEstimatedTimeOfArrival(): ?EstimatedTimeOfArrival
    {
        return $this->estimatedTimeOfArrival;
    }

    public function getStatus(): OrderStatus
    {
        return $this->status;
    }

    public function getStateChangeHistory(): StateChangeHistoryList
    {
        return $this->stateChangeHistory;
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

    public function getPartnerId(): string
    {
        return $this->partnerId;
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
