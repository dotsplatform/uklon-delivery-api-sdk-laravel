<?php
/**
 * Description of WebhookOrder.php
 * @copyright Copyright (c) DOTSPLATFORM, LLC
 * @author    Bogdan Mamontov <bohdan.mamontov@dotsplatform.com>
 */

namespace Dots\Uklon\Client\Resources\Webhook\Driver;

use Dots\Data\DTO;

class OrderContext extends DTO
{
    protected string $id;

    protected array $external_tracking_numbers;

    public function getId(): string
    {
        return $this->id;
    }

    public function getExternalTrackingNumbers(): array
    {
        return $this->external_tracking_numbers;
    }
}