<?php
/**
 * Description of Address.php
 * @copyright Copyright (c) DOTSPLATFORM, LLC
 * @author    Bogdan Mamontov <bohdan.mamontov@dotsplatform.com>
 */

namespace Dots\Uklon\Client\Resources\Order;

use Dots\Data\DTO;
use Dots\Uklon\Client\Resources\Consts\DisabilityType;
use Dots\Uklon\Client\Resources\Point;

class Points extends DTO
{
    protected Point $pickup;

    protected DropoffPoints $dropoffs;

    protected ?Point $return;

    public static function fromArray(array $data): static
    {
        if (isset($data['dropoffs'])) {
            $data['dropoffs'] = DropoffPoints::fromArray($data['dropoffs']);
        }

        return parent::fromArray($data);
    }

    public function getPickup(): Point
    {
        return $this->pickup;
    }

    public function getDropoffs(): DropoffPoints
    {
        return $this->dropoffs;
    }

    public function getReturn(): Point
    {
        return $this->return;
    }
}
