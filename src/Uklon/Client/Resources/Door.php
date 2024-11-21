<?php
/**
 * Description of Address.php
 * @copyright Copyright (c) DOTSPLATFORM, LLC
 * @author    Bogdan Mamontov <bohdan.mamontov@dotsplatform.com>
 */

namespace Dots\Uklon\Client\Resources;

use Dots\Data\DTO;

class Door extends DTO
{
    protected ?string $entrance;

    protected ?string $floor;

    protected ?string $apartment;

    public function getEntrance(): ?string
    {
        return $this->entrance;
    }

    public function getFloor(): ?string
    {
        return $this->floor;
    }

    public function getApartment(): ?string
    {
        return $this->apartment;
    }
}
