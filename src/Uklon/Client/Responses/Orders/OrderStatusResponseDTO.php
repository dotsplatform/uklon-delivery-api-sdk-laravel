<?php
/**
 * Description of OrderStatus.php
 * @copyright Copyright (c) DOTSPLATFORM, LLC
 * @author    Yehor Herasymchuk <yehor@dotsplatform.com>
 */

namespace Dots\Uklon\Client\Responses\Orders;

use Dots\Data\DTO;
use Dots\Uklon\Client\Resources\Consts\OrderStatusState;
use Dots\Uklon\Client\Resources\UklonDateTime;

class OrderStatusResponseDTO extends DTO
{
    protected OrderStatusState $state;

    protected UklonDateTime $updateTime;

    public static function fromArray(array $data): static
    {
        $data['state'] = OrderStatusState::from($data['state']);
        $data['updateTime'] = UklonDateTime::fromString($data['updateTime']);

        return parent::fromArray($data);
    }

    public function toArray(): array
    {
        $data = parent::toArray();
        $data['state'] = $this->state->value;
        $data['updateTime'] = $this->updateTime->__toString();

        return $data;
    }

    public function getState(): OrderStatusState
    {
        return $this->state;
    }

    public function getUpdateTime(): UklonDateTime
    {
        return $this->updateTime;
    }
}
