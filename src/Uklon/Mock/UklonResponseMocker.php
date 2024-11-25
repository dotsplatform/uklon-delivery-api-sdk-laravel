<?php
/**
 * Description of UklonResponseMocker.php
 * @copyright Copyright (c) DOTSPLATFORM, LLC
 * @author    Bogdan Mamontov <bohdan.mamontov@dotsplatform.com>
 */

namespace Dots\Uklon\Mock;

use Dots\Uklon\Client\Requests\AuthenticateRequest;
use Dots\Uklon\Client\Requests\Orders\CancelOrderRequest;
use Dots\Uklon\Client\Requests\Orders\CreateOrderRequest;
use Dots\Uklon\Client\Requests\Orders\GetOrderRequest;
use Dots\Uklon\Mock\Data\UklonOAuthResponseGenerator;
use Dots\Uklon\Mock\Data\OrderInfoSuccessResponseGenerator;
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
