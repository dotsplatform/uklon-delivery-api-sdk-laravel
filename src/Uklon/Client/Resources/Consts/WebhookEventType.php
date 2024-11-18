<?php
/**
 * Description of WebhookEventType.php
 * @copyright Copyright (c) DOTSPLATFORM, LLC
 * @author    Yehor Herasymchuk <yehor@dotsplatform.com>
 */

namespace Dots\Uklon\Client\Resources\Consts;

enum WebhookEventType: string
{
    case STATUS_UPDATE = 'STATUS_UPDATE';
    case POSITION_UPDATE = 'POSITION_UPDATE';
}
