<?php
/**
 * Description of OrderResponse.php
 * @copyright Copyright (c) DOTSPLATFORM, LLC
 * @author    Bogdan Mamontov <bohdan.mamontov@dotsplatform.com>
 */

namespace Dots\Uklon\Client\Responses\Cities;

use Dots\Uklon\Client\Resources\Cities\Cities;
use Dots\Uklon\Client\Responses\UklonResponseDTO;

class CitiesResponseDTO extends UklonResponseDTO
{
    protected Cities $cities;

    public static function fromArray(array $data): static
    {
        $data['cities'] = Cities::fromArray($data['cities']);

        return parent::fromArray($data);
    }

    public function getCities(): Cities
    {
        return $this->cities;
    }
}
