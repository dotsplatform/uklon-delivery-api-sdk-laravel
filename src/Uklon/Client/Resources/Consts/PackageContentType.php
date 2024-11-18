<?php
/**
 * Description of PackageContentType.php
 * @copyright Copyright (c) DOTSPLATFORM, LLC
 * @author    Yehor Herasymchuk <yehor@dotsplatform.com>
 */

namespace Dots\Uklon\Client\Resources\Consts;

enum PackageContentType: string
{
    case FOOD = 'FOOD';
    case GENERIC_PARCEL = 'GENERIC_PARCEL';
}
