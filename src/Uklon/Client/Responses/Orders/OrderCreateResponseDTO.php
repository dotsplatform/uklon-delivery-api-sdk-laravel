<?php
/**
 * Description of OrderResponse.php
 * @copyright Copyright (c) DOTSPLATFORM, LLC
 * @author    Bogdan Mamontov <bohdan.mamontov@dotsplatform.com>
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

class OrderCreateResponseDTO extends UklonResponseDTO
{
    protected string $id;

    public function getId(): string
    {
        return $this->id;
    }
}
