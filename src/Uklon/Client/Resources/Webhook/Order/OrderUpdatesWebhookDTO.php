<?php
/**
 * Description of WebhookDTO.php
 * @copyright Copyright (c) DOTSPLATFORM, LLC
 * @author    Bogdan Mamontov <bohdan.mamontov@dotsplatform.com>
 */

namespace Dots\Uklon\Client\Resources\Webhook\Order;

use Dots\Data\DTO;

class OrderUpdatesWebhookDTO extends DTO
{
    protected WebhookOrders $items;

    public static function fromArray(array $data): static
    {
        $data['items'] = WebhookOrders::fromArray($data['items']);

        return parent::fromArray($data);
    }

    public function getItems(): WebhookOrders
    {
        return $this->items;
    }
}
