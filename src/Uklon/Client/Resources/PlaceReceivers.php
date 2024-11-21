<?php
/**
 * Description of Address.php
 * @copyright Copyright (c) DOTSPLATFORM, LLC
 * @author    Bogdan Mamontov <bohdan.mamontov@dotsplatform.com>
 */

namespace Dots\Uklon\Client\Resources;

use Illuminate\Support\Collection;

class PlaceReceivers extends Collection
{
    public static function fromArray(array $data): static
    {
        return new static(array_map(
            fn(array $item) => PlaceReceiver::fromArray($item),
            $data,
        ));
    }
}
