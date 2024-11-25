<?php
/**
 * Description of ErrorCodes.php
 * @copyright Copyright (c) DOTSPLATFORM, LLC
 * @author    Bogdan Mamontov <bohdan.mamontov@dotsplatform.com>
 */

namespace Dots\Uklon\Client\Resources\Consts;

enum CancelReason: string
{
    case PACKAGE_NOT_FIT = 'package_not_fit';
    case TRUNK_OCCUPIED = 'trunk_occupied';
    case PLANS_CHANGED = 'plans_changed';
    case DRIVER_REFUSED_PACKAGE = 'driver_refused_package';
    case DRIVER_LOW_RATING = 'driver_low_rating';
    case DRIVER_BEHAVIOR = 'driver_behavior';
    case DRIVER_WAS_LATE = 'driver_was_late';
    case DRIVER_NOT_ARRIVED = 'driver_not_arrived';
    case DRIVER_CONFUSED_ADDRESS = 'driver_confused_address';
    case DRIVER_IGNORE = 'driver_ignore';
    case DRIVER_TOO_FAR = 'driver_too_far';
    case DRIVER_ASKED = 'driver_asked';
    case ANOTHER_VEHICLE = 'another_vehicle';
}
