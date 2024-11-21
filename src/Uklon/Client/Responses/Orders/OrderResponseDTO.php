<?php
/**
 * Description of OrderResponse.php
 * @copyright Copyright (c) DOTSPLATFORM, LLC
 * @author    Yehor Herasymchuk <yehor@dotsplatform.com>
 */

namespace Dots\Uklon\Client\Responses\Orders;

use Dots\Uklon\Client\Resources\Consts\OrderStatusState;
use Dots\Uklon\Client\Resources\Order\Cancellation;
use Dots\Uklon\Client\Resources\Order\Cost\Cost;
use Dots\Uklon\Client\Resources\Order\Creator;
use Dots\Uklon\Client\Resources\Order\Driver;
use Dots\Uklon\Client\Resources\Order\Idle\Idle;
use Dots\Uklon\Client\Resources\Order\ReturnReceiver;
use Dots\Uklon\Client\Resources\Order\Route;
use Dots\Uklon\Client\Resources\Order\Times;
use Dots\Uklon\Client\Resources\Person;
use Dots\Uklon\Client\Resources\PlaceReceivers;
use Dots\Uklon\Client\Responses\UklonResponseDTO;

class OrderResponseDTO extends UklonResponseDTO
{
    protected string $id;

    protected OrderStatusState $status;

    protected string $product;

    protected Times $times;

    protected Person $sender;

    protected PlaceReceivers $receivers;

    protected ReturnReceiver $return_receiver;

    protected Creator $creator;

    protected Driver $driver;

    protected Route $route;

    protected Cost $cost;

    protected ?Cancellation $cancellation;

    protected ?string $comment;

    protected bool $suspended;

    protected bool $deferred;

    protected array $extra_services = [];

    protected Idle $idle;

    public function getId(): string
    {
        return $this->id;
    }

    public function getStatus(): OrderStatusState
    {
        return $this->status;
    }

    public function getProduct(): string
    {
        return $this->product;
    }

    public function getTimes(): Times
    {
        return $this->times;
    }

    public function getSender(): Person
    {
        return $this->sender;
    }

    public function getReceivers(): PlaceReceivers
    {
        return $this->receivers;
    }

    public function getReturnReceiver(): ReturnReceiver
    {
        return $this->return_receiver;
    }

    public function getCreator(): Creator
    {
        return $this->creator;
    }

    public function getDriver(): Driver
    {
        return $this->driver;
    }

    public function getRoute(): Route
    {
        return $this->route;
    }

    public function getCost(): Cost
    {
        return $this->cost;
    }

    public function getCancellation(): ?Cancellation
    {
        return $this->cancellation;
    }

    public function getComment(): ?string
    {
        return $this->comment;
    }

    public function isSuspended(): bool
    {
        return $this->suspended;
    }

    public function isDeferred(): bool
    {
        return $this->deferred;
    }

    public function getExtraServices(): array
    {
        return $this->extra_services;
    }

    public function getIdle(): Idle
    {
        return $this->idle;
    }
}
