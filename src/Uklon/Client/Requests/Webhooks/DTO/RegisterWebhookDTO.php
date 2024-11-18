<?php
/**
 * Description of RegisterWebhookDTO.php
 * @copyright Copyright (c) DOTSPLATFORM, LLC
 * @author    Yehor Herasymchuk <yehor@dotsplatform.com>
 */

namespace Dots\Uklon\Client\Requests\Webhooks\DTO;

use Dots\Data\DTO;
use Dots\Uklon\Client\Resources\Consts\WebhookEventType;
use Dots\Uklon\Client\Resources\Webhook\RetryConfig;

class RegisterWebhookDTO extends DTO
{
    protected string $callbackUrl;

    protected WebhookEventType $eventType;

    /**
     * Secret shared by the partner to be sent as authorization header on the callback URL.
     * If not provided, no authorization header will be sent.
     */
    protected ?string $partnerSecret;

    protected ?RetryConfig $retryConfig;

    public static function fromArray(array $data): static
    {
        $data['retryConfig'] = isset($data['retryConfig']) ? RetryConfig::fromArray($data['retryConfig']) : null;
        $data['eventType'] = $data['eventType'] ?? WebhookEventType::STATUS_UPDATE;
        if (is_string($data['eventType'])) {
            $data['eventType'] = WebhookEventType::from($data['eventType']);
        }

        return parent::fromArray($data);
    }

    public function getCallbackUrl(): string
    {
        return $this->callbackUrl;
    }

    public function getEventType(): WebhookEventType
    {
        return $this->eventType;
    }

    public function getPartnerSecret(): ?string
    {
        return $this->partnerSecret;
    }

    public function getRetryConfig(): ?RetryConfig
    {
        return $this->retryConfig;
    }
}
