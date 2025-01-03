<?php
/**
 * Description of PointsDetails.php
 * @copyright Copyright (c) DOTSPLATFORM, LLC
 * @author    Bogdan Mamontov <bohdan.mamontov@dotsplatform.com>
 */

namespace Dots\Uklon\Client\Resources\Fares;

use Dots\Uklon\Client\Resources\Point;
use Illuminate\Support\Collection;

class PointsDetails extends Collection
{
    public static function fromArray(array $data): static
    {
        return new static(array_map(
            fn(array $item) => Point::fromArray($item),
            $data,
        ));
    }
}