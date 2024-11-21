<?php
/**
 * Description of Address.php
 * @copyright Copyright (c) DOTSPLATFORM, LLC
 * @author    Bogdan Mamontov <bohdan.mamontov@dotsplatform.com>
 */

namespace Dots\Uklon\Client\Resources;

use Dots\Data\DTO;

class Person extends DTO
{
    protected string $name;

    protected string $phone;

    protected ?Door $door;

    public static function fromArray(array $data): static
    {
        if (isset($data['door'])) {
            $data['door'] = Door::fromArray($data['door']);
        }

        return parent::fromArray($data);
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function getPhone(): string
    {
        return $this->phone;
    }

    public function getDoor(): ?Door
    {
        return $this->door;
    }
}
