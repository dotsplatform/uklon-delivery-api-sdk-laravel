<?php
/**
 * Description of WebhookOrder.php
 * @copyright Copyright (c) DOTSPLATFORM, LLC
 * @author    Bogdan Mamontov <bohdan.mamontov@dotsplatform.com>
 */

namespace Dots\Uklon\Client\Resources\Webhook\Order;

use Illuminate\Support\Collection;

class WebhookOrders extends Collection
{
    public static function fromArray(array $data): static
    {
        return new static(array_map(
            fn(array $item) => WebhookOrder::fromArray($item),
            $data,
        ));
    }
}