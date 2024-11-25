<?php
/**
 * Description of RegisterWebhookDTO.php
 * @copyright Copyright (c) DOTSPLATFORM, LLC
 * @author    Bogdan Mamontov <bohdan.mamontov@dotsplatform.com>
 */

namespace Dots\Uklon\Client\Requests\Webhooks\DTO;

use Dots\Uklon\Client\Responses\UklonResponseDTO;

class WebhookResponseDTO extends UklonResponseDTO
{
    protected string $url;

    protected string $key;

    public function getUrl(): string
    {
        return $this->url;
    }

    public function getKey(): string
    {
        return $this->key;
    }
}
