<?php
/**
 * Description of GlovoConnector.php
 * @copyright Copyright (c) DOTSPLATFORM, LLC
 * @author    Yehor Herasymchuk <yehor@dotsplatform.com>
 */

namespace Dots\Uklon\Client;

use Dots\Uklon\Client\DTO\UklonAuthDTO;
use Dots\Uklon\Client\Exceptions\UklonException;
use Dots\Uklon\Client\Requests\AuthenticateRequest;
use Dots\Uklon\Client\Requests\Fares\CreateFareRequest;
use Dots\Uklon\Client\Requests\Fares\DTO\CreateFareDTO;
use Dots\Uklon\Client\Requests\Orders\CancelOrderRequest;
use Dots\Uklon\Client\Requests\Orders\CreateOrderRequest;
use Dots\Uklon\Client\Requests\Orders\DTO\CreateOrderDTO;
use Dots\Uklon\Client\Requests\Orders\GetOrderCourierContactRequest;
use Dots\Uklon\Client\Requests\Orders\GetOrderCourierPositionRequest;
use Dots\Uklon\Client\Requests\Orders\GetOrderRequest;
use Dots\Uklon\Client\Requests\Orders\Simulate\SimulateFailedDeliveryRequest;
use Dots\Uklon\Client\Requests\Orders\Simulate\SimulateSuccessfulDeliveryRequest;
use Dots\Uklon\Client\Requests\Webhooks\DeleteWebhookRequest;
use Dots\Uklon\Client\Requests\Webhooks\DTO\RegisterWebhookDTO;
use Dots\Uklon\Client\Requests\Webhooks\GetWebhooksListRequest;
use Dots\Uklon\Client\Requests\Webhooks\RegisterWebhookRequest;
use Dots\Uklon\Client\Requests\Webhooks\Simulate\SimulateWebhookRequest;
use Dots\Uklon\Client\Responses\ErrorResponseDTO;
use Dots\Uklon\Client\Responses\Orders\OrderCourierContactResponseDTO;
use Dots\Uklon\Client\Responses\Orders\OrderCourierPositionResponseDTO;
use Dots\Uklon\Client\Responses\Orders\OrderResponseDTO;
use Dots\Uklon\Client\Responses\UklonOAuthResponse;
use Dots\Uklon\Client\Responses\Webhooks\WebhookResponseDTO;
use Dots\Uklon\Client\Responses\Webhooks\WebhooksListResponseDTO;
use RuntimeException;
use Saloon\Http\Connector;
use Saloon\Http\Response;
use Saloon\Traits\Plugins\AlwaysThrowOnErrors;
use Throwable;

class UklonConnector extends Connector
{
    use AlwaysThrowOnErrors;

    private const string BASE_PROD_URL = 'https://deliverygateway.uklon.com.ua';

    private const string BASE_STAGE_URL = 'https://deliverygateway.staging.uklon.com.ua';

    public function __construct(
        private readonly UklonAuthDTO $authDto,
        private readonly bool $stageEnv = true,
    ) {
    }

    protected function defaultHeaders(): array
    {
        return [
            'Content-Type' => 'application/json',
            'Accept' => 'application/json',
        ];
    }

    /**
     * @throws UklonException
     */
    public function createFare(CreateFareDTO $dto): OrderResponseDTO
    {
        $this->authenticateRequests();

        return $this->send(new CreateFareRequest($dto, $this->stageEnv))->dto();
    }

    /**
     * @throws UklonException
     */
    public function createOrder(CreateOrderDTO $dto): OrderResponseDTO
    {
        $this->authenticateRequests();

        return $this->send(new CreateOrderRequest($dto, $this->stageEnv))->dto();
    }

    /**
     * @throws UklonException
     */
    public function getOrder(string $trackingNumber): OrderResponseDTO
    {
        $this->authenticateRequests();

        return $this->send(new GetOrderRequest($trackingNumber))->dto();
    }

    /**
     * @throws UklonException
     */
    public function getOrderCourierContact(string $trackingNumber): OrderCourierContactResponseDTO
    {
        $this->authenticateRequests();

        return $this->send(new GetOrderCourierContactRequest($trackingNumber))->dto();
    }

    public function getOrderCourierPosition(string $trackingNumber): OrderCourierPositionResponseDTO
    {
        $this->authenticateRequests();

        return $this->send(new GetOrderCourierPositionRequest($trackingNumber))->dto();
    }

    /**
     * @throws UklonException
     */
    public function cancelOrder(string $trackingNumber): void
    {
        $this->authenticateRequests();
        $this->send(new CancelOrderRequest($trackingNumber));
    }

    /**
     * @throws UklonException
     */
    public function simulateSuccessfulDelivery(string $trackingNumber): void
    {
        $this->assertIsStagingEnv();
        $this->authenticateRequests();
        $this->send(new SimulateSuccessfulDeliveryRequest($trackingNumber));
    }

    /**
     * @throws UklonException
     */
    public function simulateFailedDelivery(string $trackingNumber): void
    {
        $this->assertIsStagingEnv();
        $this->authenticateRequests();
        $this->send(new SimulateFailedDeliveryRequest($trackingNumber));
    }

    /**
     * @throws UklonException
     */
    public function getWebhooks(): WebhooksListResponseDTO
    {
        $this->authenticateRequests();

        return $this->send(new GetWebhooksListRequest())->dto();
    }

    /**
     * @throws UklonException
     */
    public function registerWebhook(RegisterWebhookDTO $dto): WebhookResponseDTO
    {
        $this->authenticateRequests();

        return $this->send(new RegisterWebhookRequest($dto))->dto();
    }

    /**
     * @throws UklonException
     */
    public function deleteWebhook(int $webhookId): void
    {
        $this->authenticateRequests();
        $this->send(new DeleteWebhookRequest($webhookId))->dto();
    }

    /**
     * @throws UklonException
     */
    public function simulateWebhook(int $webhookId): void
    {
        $this->assertIsStagingEnv();
        $this->authenticateRequests();
        $this->send(new SimulateWebhookRequest($webhookId))->dto();
    }

    private function authenticateRequests(): void
    {
        $oauth = $this->getAccessToken();
        $this->withTokenAuth($oauth->getAccessToken());
    }

    /**
     * @throws UklonException
     */
    public function getAccessToken(): UklonOAuthResponse
    {
        return $this->send(new AuthenticateRequest(
            $this->authDto,
        ))->dto();
    }

    public function resolveBaseUrl(): string
    {
        if ($this->stageEnv) {
            return self::BASE_STAGE_URL;
        }

        return self::BASE_PROD_URL;
    }

    public function getRequestException(Response $response, ?Throwable $senderException): ?Throwable
    {
        $errorResponse = ErrorResponseDTO::fromResponse($response);

        return new UklonException($errorResponse);
    }

    private function assertIsStagingEnv(): void
    {
        if (! $this->isStageEnv()) {
            throw new RuntimeException('This method is only available in staging environment');
        }
    }

    public function isStageEnv(): bool
    {
        return $this->stageEnv;
    }

    public function getAuthDTO(): UklonAuthDTO
    {
        return $this->authDto;
    }
}
