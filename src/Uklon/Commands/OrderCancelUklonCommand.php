<?php
/**
 * Description of OrderCreate.php
 * @copyright Copyright (c) DOTSPLATFORM, LLC
 * @author    Bogdan Mamontov <bohdan.mamontov@dotsplatform.com>
 */

namespace Dots\Uklon\Commands;

use Dots\Uklon\Client\Exceptions\UklonException;
use Dots\Uklon\Client\Requests\Orders\DTO\CancelOrderDTO;
use Dots\Uklon\Client\Resources\Consts\CancelReason;

class OrderCancelUklonCommand extends BaseUklonCommand
{
    public $signature = 'uklon:orders:cancel {orderId}';

    public function handle(): void
    {
        $connector = $this->getUklonConnector();
        $orderId = $this->assertStringValue($this->argument('orderId'));
        try {
            $connector->cancelOrder($orderId, $this->getCancelOrderDTO());
        } catch (UklonException $e) {
            $this->error($e->getMessage());
        }
    }

    private function getCancelOrderDTO(): CancelOrderDTO
    {
        $data = [
            'reason' => CancelReason::DRIVER_LOW_RATING,
        ];

        return CancelOrderDTO::fromArray($data);
    }
}
