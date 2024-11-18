<?php
/**
 * Description of Status.php
 * @copyright Copyright (c) DOTSPLATFORM, LLC
 * @author    Yehor Herasymchuk <yehor@dotsplatform.com>
 */

namespace Dots\Uklon\Client\Resources\Order;

use Dots\Data\DTO;
use Dots\Uklon\Client\Resources\Consts\OrderStatusState;
use Dots\Uklon\Client\Resources\UklonDateTime;

class OrderStatus extends DTO
{
    protected UklonDateTime $createdAt;

    protected UklonDateTime $lastUpdateAt;

    // Parcel state delivery time
    // e.g. 2019-08-24
    protected ?string $deliveryAt;

    protected OrderStatusState $state;

    protected StateChangeHistoryList $stateChangeHistory;

    public static function fromArray(array $data): static
    {
        $data['createdAt'] = UklonDateTime::fromString($data['createdAt']);
        $data['lastUpdateAt'] = UklonDateTime::fromString($data['lastUpdateAt']);
        $data['stateChangeHistory'] = StateChangeHistoryList::fromArray($data['stateChangeHistory'] ?? []);

        return parent::fromArray($data);
    }

    public function toArray(): array
    {
        $data = parent::toArray();
        $data['createdAt'] = $this->createdAt->__toString();
        $data['lastUpdateAt'] = $this->lastUpdateAt->__toString();
        $data['state'] = $this->state->value;

        return $data;
    }

    public function isCourierAssignedStatus(): bool
    {
        return $this->state->isCourierAssigned();
    }

    public function getCreatedAt(): UklonDateTime
    {
        return $this->createdAt;
    }

    public function getLastUpdateAt(): UklonDateTime
    {
        return $this->lastUpdateAt;
    }

    public function getDeliveryAt(): ?string
    {
        return $this->deliveryAt;
    }

    public function getState(): OrderStatusState
    {
        return $this->state;
    }

    public function getStateChangeHistory(): StateChangeHistoryList
    {
        return $this->stateChangeHistory;
    }
}
