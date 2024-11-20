<?php
/**
 * Description of OrderResponse.php
 * @copyright Copyright (c) DOTSPLATFORM, LLC
 * @author    Yehor Herasymchuk <yehor@dotsplatform.com>
 */

namespace Dots\Uklon\Client\Resources\Fares\Estimations;

use Dots\Data\DTO;

class EstimationError extends DTO
{
    protected string $sub_code;

    public function getSubCode(): string
    {
        return $this->sub_code;
    }
}
