<?php
/**
 * Description of WebhookDTO.php
 * @copyright Copyright (c) DOTSPLATFORM, LLC
 * @author    Yehor Herasymchuk <yehor@dotsplatform.com>
 */

namespace Dots\Uklon\Client\Resources\Webhook;

use Illuminate\Support\Collection;

class WebhooksList extends Collection
{
    public static function fromArray(array $data): self
    {
        $data = array_map(fn (array $item) => WebhookDTO::fromArray($item), $data);

        return new self($data);
    }
}
