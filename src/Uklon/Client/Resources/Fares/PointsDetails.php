<?php
/**
 * Description of PointsDetails.php
 * @copyright Copyright (c) DOTSPLATFORM, LLC
 * @author    Bogdan Mamontov <bohdan.mamontov@dotsplatform.com>
 */

namespace Dots\Uklon\Client\Resources\Fares;

use Illuminate\Support\Collection;

class PointsDetails extends Collection
{
    public static function fromArray(array $data): static
    {
        return new static(array_map(
            fn(array $item) => PointDetails::fromArray($item),
            $data,
        ));
    }
}