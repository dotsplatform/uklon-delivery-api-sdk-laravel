<?php
/**
 * Description of OrderResponse.php
 * @copyright Copyright (c) DOTSPLATFORM, LLC
 * @author    Bogdan Mamontov <bohdan.mamontov@dotsplatform.com>
 */

namespace Dots\Uklon\Client\Resources\Order;

use Dots\Uklon\Client\Responses\Orders\OrderInfoResponseDTO;
use Illuminate\Support\Collection;

class OrdersList extends Collection
{
    public static function fromArray(array $data): static
    {
        return new static(array_map(
            fn(array $item) => OrderInfoResponseDTO::fromArray($item),
            $data,
        ));
    }
}
