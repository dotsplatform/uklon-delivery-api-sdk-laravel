<?php
/**
 * Description of Address.php
 * @copyright Copyright (c) DOTSPLATFORM, LLC
 * @author    Yehor Herasymchuk <yehor@dotsplatform.com>
 */

namespace Dots\Uklon\Client\Resources;

use Dots\Data\DTO;

class AppraisedDetails extends DTO
{
    protected float $cost;

    public function getCost(): float
    {
        return $this->cost;
    }
}
