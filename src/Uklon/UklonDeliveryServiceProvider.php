<?php
/**
 * Description of UklonLaasServiceProvider.php
 * @copyright Copyright (c) DOTSPLATFORM, LLC
 * @author    Yehor Herasymchuk <yehor@dotsplatform.com>
 */

namespace Dots\Uklon;

use Dots\Uklon\Client\DTO\UklonAuthDTO;
use Dots\Uklon\Client\UklonConnector;
use Dots\Uklon\Commands\FareCreateUklonCommand;
use Dots\Uklon\Commands\GetCitiesUklonCommand;
use Dots\Uklon\Commands\OrderCancelUklonCommand;
use Dots\Uklon\Commands\OrderCourierPositionUklonCommand;
use Dots\Uklon\Commands\OrderCreateUklonCommand;
use Dots\Uklon\Commands\OrderInfoUklonCommand;
use Dots\Uklon\Commands\WebhookDeleteForDriverUklonCommand;
use Dots\Uklon\Commands\WebhookDeleteForOrderUklonCommand;
use Dots\Uklon\Commands\WebhooksCreateForDriverUklonCommand;
use Dots\Uklon\Commands\WebhooksCreateForOrderUklonCommand;
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
                    'appUid' => config('uklon.auth.appUid'),
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
            FareCreateUklonCommand::class,
            OrderCancelUklonCommand::class,
            GetCitiesUklonCommand::class,
            OrderCourierPositionUklonCommand::class,
            OrderCreateUklonCommand::class,
            OrderInfoUklonCommand::class,
            WebhookDeleteForOrderUklonCommand::class,
            WebhookDeleteForDriverUklonCommand::class,
            WebhooksCreateForOrderUklonCommand::class,
            WebhooksCreateForDriverUklonCommand::class,
        ]);
    }
}
