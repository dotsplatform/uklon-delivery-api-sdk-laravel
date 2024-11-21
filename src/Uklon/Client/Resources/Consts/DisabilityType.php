<?php
/**
 * Description of EstimatedTimeOfArrivalType.php
 * @copyright Copyright (c) DOTSPLATFORM, LLC
 * @author    Yehor Herasymchuk <yehor@dotsplatform.com>
 */

namespace Dots\Uklon\Client\Resources\Consts;

enum DisabilityType: string
{
    case NONE = 'none';
    case DEAF = 'deaf';
    case HARD_HEARING = 'hard_hearing';
}
