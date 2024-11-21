<?php
/**
 * Description of Free.php
 * @copyright Copyright (c) DOTSPLATFORM, LLC
 * @author    Bogdan Mamontov <bohdan.mamontov@dotsplatform.com>
 */

namespace Dots\Uklon\Client\Resources\Order\Idle;

use Dots\Data\DTO;

class Free extends DTO
{
    protected ?int $ends_at;

    protected int $completed_seconds;

    public function getEndsAt(): ?int
    {
        return $this->ends_at;
    }

    public function getCompletedSeconds(): int
    {
        return $this->completed_seconds;
    }
}