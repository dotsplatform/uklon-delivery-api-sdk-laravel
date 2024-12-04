<?php
/**
 * Description of OrderResponse.php
 * @copyright Copyright (c) DOTSPLATFORM, LLC
 * @author    Bogdan Mamontov <bohdan.mamontov@dotsplatform.com>
 */

namespace Dots\Uklon\Client\Responses\Orders;

use Illuminate\Support\Collection;
use Saloon\Http\Response;

class OrdersInfoResponse extends Collection
{
    public static function fromArray(array $data): static
    {
        return new static(array_map(
            fn(array $item) => OrderInfoResponseDTO::fromArray($item),
            $data,
        ));
    }

    public static function fromResponse(Response $response): static
    {
        $items = $response->json()['items'] ?? [];

        return new static(array_map(
            fn(array $item) => OrderInfoResponseDTO::fromArray($item),
            $items,
        ));
    }
}
