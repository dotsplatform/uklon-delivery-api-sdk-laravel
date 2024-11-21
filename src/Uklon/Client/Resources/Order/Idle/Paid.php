<?php
/**
 * Description of Free.php
 * @copyright Copyright (c) DOTSPLATFORM, LLC
 * @author    Bogdan Mamontov <bohdan.mamontov@dotsplatform.com>
 */

namespace Dots\Uklon\Client\Resources\Order\Idle;

use Dots\Data\DTO;

class Paid extends DTO
{
    protected ?int $started_at;

    protected int $completed_seconds;

    public function getStartedAt(): ?int
    {
        return $this->started_at;
    }

    public function getCompletedSeconds(): int
    {
        return $this->completed_seconds;
    }
}