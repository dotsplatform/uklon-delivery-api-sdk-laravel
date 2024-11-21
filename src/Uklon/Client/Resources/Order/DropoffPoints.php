<?php
/**
 * Description of PointDTO.php
 * @copyright Copyright (c) DOTSPLATFORM, LLC
 * @author    Bogdan Mamontov <bohdan.mamontov@dotsplatform.com>
 */

namespace Dots\Uklon\Client\Resources\Order;

use Illuminate\Support\Collection;

class DropoffPoints extends Collection
{
    public static function fromArray(array $data): static
    {
        return new static(array_map(
            fn(array $item) => DropoffPoint::fromArray($item),
            $data,
        ));
    }
}