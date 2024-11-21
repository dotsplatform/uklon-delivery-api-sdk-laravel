<?php
/**
 * Description of Address.php
 * @copyright Copyright (c) DOTSPLATFORM, LLC
 * @author    Bogdan Mamontov <bohdan.mamontov@dotsplatform.com>
 */

namespace Dots\Uklon\Client\Resources;

use Dots\Data\DTO;

class PlaceReceiver extends DTO
{
    protected string $name;

    protected string $phone;

    protected ?Door $door;

    protected ?bool $age_verification;

    protected ?Buyout $buyout;

    protected ?ExtraParameters $extra_parameters;

    protected ?AppraisedDetails $appraised_details;

    protected ?Postpayment $postpayment;

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

    public function getAgeVerification(): ?bool
    {
        return $this->age_verification;
    }

    public function getBuyout(): ?Buyout
    {
        return $this->buyout;
    }

    public function getExtraParameters(): ?ExtraParameters
    {
        return $this->extra_parameters;
    }

    public function getAppraisedDetails(): ?AppraisedDetails
    {
        return $this->appraised_details;
    }

    public function getPostpayment(): ?Postpayment
    {
        return $this->postpayment;
    }
}
