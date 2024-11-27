<?php
/**
 * Description of CreateOrderDTO.php
 * @copyright Copyright (c) DOTSPLATFORM, LLC
 * @author    Bogdan Mamontov <bohdan.mamontov@dotsplatform.com>
 */

namespace Dots\Uklon\Client\Requests\Orders\DTO;

use Dots\Data\DTO;
use Dots\Uklon\Client\Resources\Person;
use Dots\Uklon\Client\Resources\PlaceReceivers;

class CreateOrderDTO extends DTO
{
    protected string $fare_id;

    protected ?string $product;

    protected Person $sender;

    protected PlaceReceivers $receivers;

    protected ?string $comment;

    protected ?float $agreed_cost;

    public static function fromArray(array $data): static
    {
        if (isset($data['receivers'])) {
            $data['receivers'] = PlaceReceivers::fromArray($data['receivers']);
        }

        return parent::fromArray($data);
    }

    public function getFareId(): string
    {
        return $this->fare_id;
    }

    public function getProduct(): ?string
    {
        return $this->product;
    }

    public function getSender(): Person
    {
        return $this->sender;
    }

    public function getReceivers(): PlaceReceivers
    {
        return $this->receivers;
    }

    public function getComment(): ?string
    {
        return $this->comment;
    }

    public function getAgreedCost(): ?float
    {
        return $this->agreed_cost;
    }
}
