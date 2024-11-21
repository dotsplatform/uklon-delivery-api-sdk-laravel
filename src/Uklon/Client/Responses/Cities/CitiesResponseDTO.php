<?php
/**
 * Description of OrderResponse.php
 * @copyright Copyright (c) DOTSPLATFORM, LLC
 * @author    Yehor Herasymchuk <yehor@dotsplatform.com>
 */

namespace Dots\Uklon\Client\Responses\Cities;

use Dots\Uklon\Client\Resources\Cities\Cities;
use Dots\Uklon\Client\Responses\UklonResponseDTO;

class CitiesResponseDTO extends UklonResponseDTO
{
    protected Cities $cities;

    public function getCities(): Cities
    {
        return $this->cities;
    }
}
