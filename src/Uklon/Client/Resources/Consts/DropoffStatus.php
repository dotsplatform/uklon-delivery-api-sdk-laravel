<?php
/**
 * Description of ErrorCodes.php
 * @copyright Copyright (c) DOTSPLATFORM, LLC
 * @author    Bogdan Mamontov <bohdan.mamontov@dotsplatform.com>
 */

namespace Dots\Uklon\Client\Resources\Consts;

enum DropoffStatus: string
{
    case DELIVERING = 'delivering';
    case ARRIVED = 'arrived';
    case DELIVERED = 'delivered';
    case NOT_DELIVERED = 'not_delivered';
    case RETURN_REQUESTED = 'return_requested';
    case RETURNING = 'returning';
    case RETURNED = 'returned';
}
