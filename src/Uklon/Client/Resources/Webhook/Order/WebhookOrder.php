<?php
/**
 * Description of WebhookOrder.php
 * @copyright Copyright (c) DOTSPLATFORM, LLC
 * @author    Bogdan Mamontov <bohdan.mamontov@dotsplatform.com>
 */

namespace Dots\Uklon\Client\Resources\Webhook\Order;

use Dots\Data\DTO;
use Dots\Uklon\Client\Responses\Orders\OrderInfoResponseDTO;

class WebhookOrder extends DTO
{
    protected OrderInfoResponseDTO $order;

    protected string $event_id;

    protected int $occurred_at;

    public function getOrder(): OrderInfoResponseDTO
    {
        return $this->order;
    }

    public function getEventId(): string
    {
        return $this->event_id;
    }

    public function getOccurredAt(): int
    {
        return $this->occurred_at;
    }
}