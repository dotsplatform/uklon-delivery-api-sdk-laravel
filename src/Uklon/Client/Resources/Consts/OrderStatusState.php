<?php
/**
 * Description of OrderStatusState.php
 * @copyright Copyright (c) DOTSPLATFORM, LLC
 * @author    Bogdan Mamontov <bohdan.mamontov@dotsplatform.com>
 */

namespace Dots\Uklon\Client\Resources\Consts;

enum OrderStatusState: string
{
    case PLACED = 'placed';
    case WAITING_FOR_PRECESSING = 'waiting_for_processing';
    case PROCESSING = 'processing';
    case ACCEPTED = 'accepted';
    case ARRIVED = 'arrived';
    case RUNNING = 'running';
    case RETURNING = 'returning';
    case COMPLETED = 'completed';
    case SUSPENDED = 'suspended';
    case CANCELED = 'canceled';

    public function isCourierAssigned(): bool
    {
        return in_array($this, [
            self::ACCEPTED,
            self::ARRIVED,
            self::RUNNING,
            self::RETURNING,
            self::COMPLETED,
        ], true);
    }

    public function isCanceledStatus(): bool
    {
        return in_array($this, [
            self::COMPLETED,
            self::SUSPENDED,
            self::CANCELED,
        ], true);
    }
}
