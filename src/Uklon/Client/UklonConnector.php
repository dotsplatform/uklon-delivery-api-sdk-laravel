<?php
/**
 * Description of UklonConnector.php
 * @copyright Copyright (c) DOTSPLATFORM, LLC
 * @author    Bogdan Mamontov <bohdan.mamontov@dotsplatform.com>
 */

namespace Dots\Uklon\Client;

use Dots\Uklon\Client\DTO\UklonAuthDTO;
use Dots\Uklon\Client\Exceptions\UklonException;
use Dots\Uklon\Client\Requests\AuthenticateRequest;
use Dots\Uklon\Client\Requests\Cities\GetCitiesRequest;
use Dots\Uklon\Client\Requests\Fares\CreateFareRequest;
use Dots\Uklon\Client\Requests\Fares\DTO\CreateFareDTO;
use Dots\Uklon\Client\Requests\Orders\CancelOrderRequest;
use Dots\Uklon\Client\Requests\Orders\CreateOrderRequest;
use Dots\Uklon\Client\Requests\Orders\DTO\CreateOrderDTO;
use Dots\Uklon\Client\Requests\Orders\GetOrderCourierPositionRequest;
use Dots\Uklon\Client\Requests\Orders\GetOrderRequest;
use Dots\Uklon\Client\Requests\Webhooks\CreateWebhookForDriverRequest;
use Dots\Uklon\Client\Requests\Webhooks\DeleteWebhookForDriverRequest;
use Dots\Uklon\Client\Requests\Webhooks\DeleteWebhookForOrderRequest;
use Dots\Uklon\Client\Requests\Webhooks\DTO\CreateWebhookDTO;
use Dots\Uklon\Client\Requests\Webhooks\CreateWebhookForOrderRequest;
use Dots\Uklon\Client\Responses\Cities\CitiesResponseDTO;
use Dots\Uklon\Client\Responses\ErrorResponseDTO;
use Dots\Uklon\Client\Responses\Fares\FareResponseDTO;
use Dots\Uklon\Client\Responses\Orders\OrderCourierPositionResponseDTO;
use Dots\Uklon\Client\Responses\Orders\OrderResponseDTO;
use Dots\Uklon\Client\Responses\UklonOAuthResponse;
use Dots\Uklon\Client\Responses\Webhooks\WebhookResponseDTO;
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
    public function createFare(CreateFareDTO $dto): FareResponseDTO
    {
        $this->authenticateRequests();

        return $this->send(new CreateFareRequest($dto))->dto();
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
    public function getOrder(string $orderId): OrderResponseDTO
    {
        $this->authenticateRequests();

        return $this->send(new GetOrderRequest($orderId))->dto();
    }

    public function getOrderCourierPosition(string $orderId): OrderCourierPositionResponseDTO
    {
        $this->authenticateRequests();

        return $this->send(new GetOrderCourierPositionRequest($orderId))->dto();
    }

    /**
     * @throws UklonException
     */
    public function cancelOrder(string $orderId): void
    {
        $this->authenticateRequests();
        $this->send(new CancelOrderRequest($orderId));
    }

    /**
     * @throws UklonException
     */
    public function createWebhookForOrder(CreateWebhookDTO $dto): void
    {
        $this->authenticateRequests();

        $this->send(new CreateWebhookForOrderRequest($dto));
    }

    /**
     * @throws UklonException
     */
    public function createWebhookForDriver(CreateWebhookDTO $dto): void
    {
        $this->authenticateRequests();

        $this->send(new CreateWebhookForDriverRequest($dto));
    }

    /**
     * @throws UklonException
     */
    public function deleteWebhookForOrder(): void
    {
        $this->authenticateRequests();
        $this->send(new DeleteWebhookForOrderRequest());
    }

    /**
     * @throws UklonException
     */
    public function deleteWebhookForDriver(): void
    {
        $this->authenticateRequests();
        $this->send(new DeleteWebhookForDriverRequest());
    }

    /**
     * @throws UklonException
     */
    public function getCities(): CitiesResponseDTO
    {
        $this->authenticateRequests();

        return $this->send(new GetCitiesRequest())->dto();
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
