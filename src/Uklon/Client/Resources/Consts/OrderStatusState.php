<?php
/**
 * Description of OrderStatusState.php
 * @copyright Copyright (c) DOTSPLATFORM, LLC
 * @author    Yehor Herasymchuk <yehor@dotsplatform.com>
 */

namespace Dots\Uklon\Client\Resources\Consts;

enum OrderStatusState: string
{
    case CREATED = 'CREATED';
    case REJECTED = 'REJECTED';
    case SCHEDULED = 'SCHEDULED';
    case ACTIVATED = 'ACTIVATED';
    case ACCEPTED = 'ACCEPTED';
    case WAITING_FOR_PICKUP = 'WAITING_FOR_PICKUP';
    case PICKED = 'PICKED';
    case WAITING_FOR_DELIVERY = 'WAITING_FOR_DELIVERY';
    case DELIVERED = 'DELIVERED';
    case CANCELLED = 'CANCELLED';
    case NOT_DELIVERED_NOT_RETURNED = 'NOT_DELIVERED_NOT_RETURNED';
    case RETURNED = 'RETURNED';

    public function isCourierAssigned(): bool
    {
        return in_array($this, [
            self::ACCEPTED,
            self::WAITING_FOR_PICKUP,
            self::PICKED,
            self::WAITING_FOR_DELIVERY,
            self::DELIVERED,
        ], true);
    }
}
