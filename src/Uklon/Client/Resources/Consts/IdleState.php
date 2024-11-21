<?php
/**
 * Description of EstimatedTimeOfArrivalType.php
 * @copyright Copyright (c) DOTSPLATFORM, LLC
 * @author    Bogdan Mamontov <bohdan.mamontov@dotsplatform.com>
 */

namespace Dots\Uklon\Client\Resources\Consts;

enum IdleState: string
{
    case NONE = 'none';
    case FREE = 'free';
    case PAID = 'paid';
}
