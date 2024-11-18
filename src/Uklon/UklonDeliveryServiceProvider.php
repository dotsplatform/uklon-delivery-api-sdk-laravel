<?php
/**
 * Description of UklonLaasServiceProvider.php
 * @copyright Copyright (c) DOTSPLATFORM, LLC
 * @author    Yehor Herasymchuk <yehor@dotsplatform.com>
 */

namespace Dots\Uklon;

use Dots\Uklon\Client\DTO\UklonAuthDTO;
use Dots\Uklon\Client\UklonConnector;
use Dots\Uklon\Commands\OrderCancelUklonCommand;
use Dots\Uklon\Commands\OrderCourierContactUklonCommand;
use Dots\Uklon\Commands\OrderCourierPositionUklonCommand;
use Dots\Uklon\Commands\OrderCreateUklonCommand;
use Dots\Uklon\Commands\OrderInfoUklonCommand;
use Dots\Uklon\Commands\OrderSimulateFailDeliveryUklonCommand;
use Dots\Uklon\Commands\OrderSimulateSuccessfulDeliveryUklonCommand;
use Dots\Uklon\Commands\OrderValidateUklonCommand;
use Dots\Uklon\Commands\WebhooksDeleteUklonCommand;
use Dots\Uklon\Commands\WebhooksListUklonCommand;
use Dots\Uklon\Commands\WebhooksRegisterUklonCommand;
use Dots\Uklon\Commands\WebhooksSimulateUklonCommand;
use Illuminate\Support\ServiceProvider;

class UklonDeliveryServiceProvider extends ServiceProvider
{
    public function boot(): void
    {
        $this->publishes([
            __DIR__.'/../../config/uklon.php' => config_path('uklon.php'),
        ]);
        if ($this->app->runningInConsole()) {
            $this->registerArtisanCommands();
        }

        $this->app->bind(UklonConnector::class, function () {
            return new UklonConnector(
                UklonAuthDTO::fromArray([
                    'clientId' => config('uklon.auth.clientId'),
                    'clientSecret' => config('uklon.auth.clientSecret'),
                ]),
            );
        });
    }

    public function register(): void
    {
        $this->mergeConfigFrom(
            __DIR__.'/../../config/uklon.php',
            'uklon',
        );
    }

    protected function registerArtisanCommands(): void
    {
        $this->commands([
            OrderCancelUklonCommand::class,
            OrderCourierContactUklonCommand::class,
            OrderCourierPositionUklonCommand::class,
            OrderCreateUklonCommand::class,
            OrderInfoUklonCommand::class,
            OrderSimulateSuccessfulDeliveryUklonCommand::class,
            OrderSimulateFailDeliveryUklonCommand::class,
            OrderValidateUklonCommand::class,
            WebhooksDeleteUklonCommand::class,
            WebhooksListUklonCommand::class,
            WebhooksRegisterUklonCommand::class,
            WebhooksSimulateUklonCommand::class,
        ]);
    }
}
