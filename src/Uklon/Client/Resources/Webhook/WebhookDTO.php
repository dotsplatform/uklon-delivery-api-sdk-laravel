<?php
/**
 * Description of WebhookDTO.php
 * @copyright Copyright (c) DOTSPLATFORM, LLC
 * @author    Yehor Herasymchuk <yehor@dotsplatform.com>
 */

namespace Dots\Uklon\Client\Resources\Webhook;

use Dots\Data\DTO;

class WebhookDTO extends DTO
{
    protected int $webhookId;

    protected string $callbackUrl;

    protected ?RetryConfig $retryConfig;

    public static function fromArray(array $data): static
    {
        $data['retryConfig'] = isset($data['retryConfig']) ? RetryConfig::fromArray($data['retryConfig']) : null;

        return parent::fromArray($data);
    }

    public function getWebhookId(): int
    {
        return $this->webhookId;
    }

    public function getCallbackUrl(): string
    {
        return $this->callbackUrl;
    }

    public function getRetryConfig(): ?RetryConfig
    {
        return $this->retryConfig;
    }
}
