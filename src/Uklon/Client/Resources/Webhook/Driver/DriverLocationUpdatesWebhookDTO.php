<?php
/**
 * Description of WebhookDTO.php
 * @copyright Copyright (c) DOTSPLATFORM, LLC
 * @author    Bogdan Mamontov <bohdan.mamontov@dotsplatform.com>
 */

namespace Dots\Uklon\Client\Resources\Webhook\Driver;

use Dots\Data\DTO;

class DriverLocationUpdatesWebhookDTO extends DTO
{
    protected Location $location;

    protected OrderContext $order_context;

    protected string $event_id;

    protected int $occurred_at;

    public function getLocation(): Location
    {
        return $this->location;
    }

    public function getOrderContext(): OrderContext
    {
        return $this->order_context;
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
