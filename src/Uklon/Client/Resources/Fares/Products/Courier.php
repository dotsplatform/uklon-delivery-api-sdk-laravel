<?php
/**
 * Description of PointDTO.php
 * @copyright Copyright (c) DOTSPLATFORM, LLC
 * @author    Bogdan Mamontov <bohdan.mamontov@dotsplatform.com>
 */

namespace Dots\Uklon\Client\Resources\Fares\Products;

use Dots\Data\DTO;
use Dots\Uklon\Client\Resources\Fares\Deferred;
use Dots\Uklon\Client\Resources\Fares\Postpayment;

class Courier extends DTO
{
    protected ?bool $door;

    protected bool $confirmation_code;

    protected bool $buyout;

    protected bool $age_verification;

    protected ?Deferred $deferred;

    protected ?Postpayment $postpayment;

    public function getDoor(): ?bool
    {
        return $this->door;
    }

    public function isConfirmationCode(): bool
    {
        return $this->confirmation_code;
    }

    public function isBuyout(): bool
    {
        return $this->buyout;
    }

    public function isAgeVerification(): bool
    {
        return $this->age_verification;
    }

    public function getDeferred(): ?Deferred
    {
        return $this->deferred;
    }

    public function getPostpayment(): ?Postpayment
    {
        return $this->postpayment;
    }
}