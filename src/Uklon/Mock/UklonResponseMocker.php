<?php
/**
 * Description of UklonResponseMocker.php
 * @copyright Copyright (c) DOTSPLATFORM, LLC
 * @author    Oleksandr Polosmak <o.polosmak@dotsplatform.com>
 */

namespace Dots\Uklon\Mock;

use Dots\Uklon\Client\Requests\AuthenticateRequest;
use Dots\Uklon\Client\Requests\Orders\CancelOrderRequest;
use Dots\Uklon\Client\Requests\Orders\CreateOrderRequest;
use Dots\Uklon\Client\Requests\Orders\GetOrderCourierContactRequest;
use Dots\Uklon\Client\Requests\Orders\GetOrderRequest;
use Dots\Uklon\Mock\Data\UklonOAuthResponseGenerator;
use Dots\Uklon\Mock\Data\OrderCourierResponseGenerator;
use Dots\Uklon\Mock\Data\OrderInfoSuccessResponseGenerator;
use Dots\Uklon\Mock\Data\ValidateOrderResponseGenerator;
use Saloon\Http\Faking\MockClient;
use Saloon\Http\Faking\MockResponse;

class UklonResponseMocker
{
    public static function mockSuccessCreateOrder(array $data = []): array
    {
        $orderData = OrderInfoSuccessResponseGenerator::generate($data);
        $authData = UklonOAuthResponseGenerator::generate();
        MockClient::global([
            AuthenticateRequest::class => MockResponse::make($authData),
            CreateOrderRequest::class => MockResponse::make($orderData),
        ]);

        return $orderData;
    }

    public static function mockSuccessValidateOrder(?ValidationResult $result = null): array
    {
        $data = ValidateOrderResponseGenerator::generateSuccess($result);
        $authData = UklonOAuthResponseGenerator::generate();
        MockClient::global([
            AuthenticateRequest::class => MockResponse::make($authData),
            ValidateOrderRequest::class => MockResponse::make($data),
        ]);

        return $data;
    }

    public static function mockSuccessGetOrder(array $data = []): array
    {
        $orderData = OrderInfoSuccessResponseGenerator::generate($data);
        $authData = UklonOAuthResponseGenerator::generate();
        MockClient::global([
            AuthenticateRequest::class => MockResponse::make($authData),
            GetOrderRequest::class => MockResponse::make($orderData),
        ]);

        return $orderData;
    }

    public static function mockSuccessGetOrderCourierContact(): array
    {
        $courierData = OrderCourierResponseGenerator::generate();
        $authData = UklonOAuthResponseGenerator::generate();
        MockClient::global([
            AuthenticateRequest::class => MockResponse::make($authData),
            GetOrderCourierContactRequest::class => MockResponse::make($courierData),
        ]);

        return $courierData;
    }

    public static function mockSuccessCancelOrder(): void
    {
        $authData = UklonOAuthResponseGenerator::generate();
        MockClient::global([
            AuthenticateRequest::class => MockResponse::make($authData),
            CancelOrderRequest::class => MockResponse::make(),
        ]);
    }

    public static function mockGeAccessToken(array $data = []): array
    {
        $responseData = UklonOAuthResponseGenerator::generate($data);
        MockClient::global([
            AuthenticateRequest::class => MockResponse::make($responseData),
        ]);

        return $responseData;
    }
}
