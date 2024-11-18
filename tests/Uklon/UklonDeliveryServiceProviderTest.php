<?php
/**
 * Description of GlovoLaasServiceProviderTest.php
 * @copyright Copyright (c) DOTSPLATFORM, LLC
 * @author    Yehor Herasymchuk <yehor@dotsplatform.com>
 */

namespace Tests\Uklon;

use Dots\Uklon\Client\UklonConnector;
use Tests\TestCase;

class UklonDeliveryServiceProviderTest extends TestCase
{
    protected function defineEnvironment($app): void
    {
        $app['config']->set('uklon.auth.clientId', 'SOME_CLIENT_ID');
        $app['config']->set('uklon.auth.clientSecret', 'SOME_CLIENT_SECRET');
    }

    public function testBooted(): void
    {
        $connector = app(UklonConnector::class);
        $this->assertTrue($connector->isStageEnv());
        $this->assertEquals('SOME_CLIENT_ID', $connector->getAuthDTO()->getClientId());
        $this->assertEquals('SOME_CLIENT_SECRET', $connector->getAuthDTO()->getClientSecret());
    }
}
