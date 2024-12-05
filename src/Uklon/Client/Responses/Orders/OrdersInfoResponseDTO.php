<?php
/**
 * Description of OrdersInfoResponseDTO.php
 * @copyright Copyright (c) DOTSPLATFORM, LLC
 * @author    Bogdan Mamontov <bohdan.mamontov@dotsplatform.com>
 */

namespace Dots\Uklon\Client\Responses\Orders;

use Dots\Uklon\Client\Resources\Order\OrdersList;
use Dots\Uklon\Client\Responses\UklonResponseDTO;

class OrdersInfoResponseDTO extends UklonResponseDTO
{
    protected OrdersList $items;

    protected ?string $next_cursor;

    public static function fromArray(array $data): static
    {
        if (isset($data['items'])) {
            $data['items'] = OrdersList::fromArray($data['items']);
        }

        return parent::fromArray($data);
    }

    public function getItems(): OrdersList
    {
        return $this->items;
    }

    public function getNextCursor(): ?string
    {
        return $this->next_cursor;
    }
}
