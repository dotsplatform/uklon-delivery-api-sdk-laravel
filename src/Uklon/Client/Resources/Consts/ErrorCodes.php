<?php
/**
 * Description of ErrorCodes.php
 * @copyright Copyright (c) DOTSPLATFORM, LLC
 * @author    Bogdan Mamontov <bohdan.mamontov@dotsplatform.com>
 */

namespace Dots\Uklon\Client\Resources\Consts;

enum ErrorCodes: string
{
    // This city is currently blocked due to the high amount of ongoing orders. Please re-try after 5 minutes
    case CITY_IS_BLOCKED = 'CITY_IS_BLOCKED';
    // The service in this city is currently closed. In order to confirm the city working hours please use the 'Working Areas' endpoint.
    case CITY_IS_CLOSED = 'CITY_IS_CLOSED';
    // Pickup address: Carrer de Pallars, 194, 08005 and Delivery address: Carrer de Pallars, 190, 08005 are in different working areas.
    case DIFFERENT_WORKING_AREAS = 'DIFFERENT_WORKING_AREAS';
    // Unable to validate Delivery address: ABC 123, XYZ
    case INVALID_DELIVERY_ADDRESS = 'INVALID_DELIVERY_ADDRESS';
    // Delivery Address Rambla de Ribatallada, 8, 08172 is outside working areas
    case INVALID_DELIVERY_ADDRESS_OUTSIDE_WORKING_AREAS = 'INVALID_DELIVERY_ADDRESS_OUTSIDE_WORKING_AREAS';
    // Unable to validate Delivery address: Carrer de Example, 1940, 08005
    case INVALID_DELIVERY_ADDRESS_UNABLE_TO_GEOCODE = 'INVALID_DELIVERY_ADDRESS_UNABLE_TO_GEOCODE';
    // Unable to validate Pickup address: ABC 123, XYZ
    case INVALID_PICKUP_ADDRESS = 'INVALID_PICKUP_ADDRESS';

    case OUT_OF_WORKING_AREA_DELIVERY_ADDRESS = 'OUT_OF_WORKING_AREA_DELIVERY_ADDRESS';
    case UNAUTHORIZED = 'UNAUTHORIZED';
    case NOT_FOUND = 'NOT_FOUND';
    case UNPROCESSABLE_ENTITY = '422 UNPROCESSABLE_ENTITY';
    case BAD_REQUEST = '400 BAD_REQUEST';
    case CONFLICT = 'CONFLICT';
    case OTHER = 'OTHER';

    public static function fromResponse(string $value): self
    {
        $code = self::tryFrom($value);

        return $code ?? self::OTHER;
    }
}
