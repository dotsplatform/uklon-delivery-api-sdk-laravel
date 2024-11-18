<?php
/**
 * Description of StateChangeHistory.php
 * @copyright Copyright (c) DOTSPLATFORM, LLC
 * @author    Yehor Herasymchuk <yehor@dotsplatform.com>
 */

namespace Dots\Uklon\Client\Resources\Order;

use Dots\Data\DTO;
use Dots\Uklon\Client\Resources\Consts\OrderStatusState;
use Dots\Uklon\Client\Resources\UklonDateTime;

class StateChangeHistory extends DTO
{
    protected UklonDateTime $date;

    protected ?string $reason;

    protected OrderStatusState $value;

    public static function fromArray(array $data): static
    {
        $data['date'] = UklonDateTime::fromString($data['date']);
        $data['value'] = OrderStatusState::from($data['value']);

        return parent::fromArray($data);
    }

    public function getDate(): UklonDateTime
    {
        return $this->date;
    }

    public function getReason(): ?string
    {
        return $this->reason;
    }

    public function getValue(): OrderStatusState
    {
        return $this->value;
    }
}
