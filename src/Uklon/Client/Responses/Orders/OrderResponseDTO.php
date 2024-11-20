<?php
/**
 * Description of OrderResponse.php
 * @copyright Copyright (c) DOTSPLATFORM, LLC
 * @author    Yehor Herasymchuk <yehor@dotsplatform.com>
 */

namespace Dots\Uklon\Client\Responses\Orders;

use Dots\Uklon\Client\Resources\Address;
use Dots\Uklon\Client\Resources\Consts\OrderStatusState;
use Dots\Uklon\Client\Resources\Contact;
use Dots\Uklon\Client\Resources\EstimatedTimeOfArrival;
use Dots\Uklon\Client\Resources\Order\OrderPrice;
use Dots\Uklon\Client\Resources\Order\PackageDetails;
use Dots\Uklon\Client\Resources\Order\PickupDetails;
use Dots\Uklon\Client\Resources\Order\StateChangeHistoryList;
use Dots\Uklon\Client\Responses\UklonResponseDTO;

class OrderResponseDTO extends UklonResponseDTO
{
    protected string $id;

    protected OrderStatusState $status;

    protected string $product;

    public static function fromArray(array $data): static
    {
        $data['estimatedTimeOfArrival'] = ! empty($data['estimatedTimeOfArrival']) ?
                EstimatedTimeOfArrival::fromArray($data['estimatedTimeOfArrival']) :
                null;
        $data['stateChangeHistory'] = StateChangeHistoryList::fromArray($data['stateChangeHistory'] ?? []);
        $data['address'] = Address::fromArray($data['address']);
        $data['contact'] = Contact::fromArray($data['contact']);
        $data['packageDetails'] = PackageDetails::fromArray($data['packageDetails']);
        $data['pickupDetails'] = PickupDetails::fromArray($data['pickupDetails']);
        $data['price'] = ! empty($data['price']) ? OrderPrice::fromArray($data['price']) : null;

        return parent::fromArray($data);
    }
}
