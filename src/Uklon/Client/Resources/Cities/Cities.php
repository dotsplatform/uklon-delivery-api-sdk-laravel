<?php
/**
 * Description of WebhookDTO.php
 * @copyright Copyright (c) DOTSPLATFORM, LLC
 * @author    Bogdan Mamontov <bohdan.mamontov@dotsplatform.com>
 */

namespace Dots\Uklon\Client\Resources\Cities;

use Illuminate\Support\Collection;

class Cities extends Collection
{
    public static function fromArray(array $data): static
    {
        return new static(array_map(
            fn(array $item) => CityDTO::fromArray($item),
            $data,
        ));
    }
}
