<?php
/**
 * Description of Address.php
 * @copyright Copyright (c) DOTSPLATFORM, LLC
 * @author    Bogdan Mamontov <bohdan.mamontov@dotsplatform.com>
 */

namespace Dots\Uklon\Client\Resources\Order;

use Dots\Data\DTO;

class Cancellation extends DTO
{
    protected ?string $reason;

    public function getReason(): ?string
    {
        return $this->reason;
    }
}
