<?php
/**
 * Description of EstimatedTimeOfArrivalType.php
 * @copyright Copyright (c) DOTSPLATFORM, LLC
 * @author    Yehor Herasymchuk <yehor@dotsplatform.com>
 */

namespace Dots\Uklon\Client\Resources\Consts;

enum EstimatedTimeOfArrivalType: string
{
    case PICKUP = 'PICKUP';
    case DELIVERY = 'DELIVERY';
}
