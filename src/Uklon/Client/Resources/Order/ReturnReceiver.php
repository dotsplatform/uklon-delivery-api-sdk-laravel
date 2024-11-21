<?php
/**
 * Description of Address.php
 * @copyright Copyright (c) DOTSPLATFORM, LLC
 * @author    Yehor Herasymchuk <yehor@dotsplatform.com>
 */

namespace Dots\Uklon\Client\Resources\Order;

use Dots\Data\DTO;
use Dots\Uklon\Client\Resources\Buyout;
use Dots\Uklon\Client\Resources\Door;

class ReturnReceiver extends DTO
{
    protected string $name;

    protected string $phone;

    protected ?Door $door;

    protected ?Buyout $buyout;

    protected ?string $comment;

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

    public function getBuyout(): ?Buyout
    {
        return $this->buyout;
    }

    public function getComment(): ?string
    {
        return $this->comment;
    }
}
