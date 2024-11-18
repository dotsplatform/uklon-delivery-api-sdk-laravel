<?php
/**
 * Description of ValidationResult.php
 * @copyright Copyright (c) DOTSPLATFORM, LLC
 * @author    Yehor Herasymchuk <yehor@dotsplatform.com>
 */

namespace Dots\Uklon\Client\Resources\Consts;

enum ValidationResult: string
{
    case EXECUTABLE = 'EXECUTABLE';
    case ERROR_PICKUP_TIME = 'ERROR_PICKUP_TIME';
    case OUT_OF_WORKING_HOURS = 'OUT_OF_WORKING_HOURS';
    case OUT_OF_WORKING_AREA_PICKUP_ADDRESS = 'OUT_OF_WORKING_AREA_PICKUP_ADDRESS';
    case OUT_OF_WORKING_AREA_DELIVERY_ADDRESS = 'OUT_OF_WORKING_AREA_DELIVERY_ADDRESS';
    case ADDRESSES_NOT_IN_SAME_CITY_CODE = 'ADDRESSES_NOT_IN_SAME_CITY_CODE';

    public function isExecutable(): bool
    {
        return $this === self::EXECUTABLE;
    }
}
