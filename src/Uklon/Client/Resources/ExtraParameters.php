<?php
/**
 * Description of Address.php
 * @copyright Copyright (c) DOTSPLATFORM, LLC
 * @author    Bogdan Mamontov <bohdan.mamontov@dotsplatform.com>
 */

namespace Dots\Uklon\Client\Resources;

use Dots\Data\DTO;

class ExtraParameters extends DTO
{
    protected ?string $comment;

    protected ?string $external_tracking_number;

    public function getComment(): ?string
    {
        return $this->comment;
    }

    public function getExternalTrackingNumber(): ?string
    {
        return $this->external_tracking_number;
    }
}
