<?php
/**
 * Description of RegisterWebhookDTO.php
 * @copyright Copyright (c) DOTSPLATFORM, LLC
 * @author    Bogdan Mamontov <bohdan.mamontov@dotsplatform.com>
 */

namespace Dots\Uklon\Client\Resources\Webhook\DTO;

use Illuminate\Support\Collection;

class WebhooksList extends Collection
{
    public static function fromArray(array $data): static
    {
        return new static(array_map(
            fn(array $item) => WebhookDTO::fromArray($item),
            $data,
        ));
    }
}
