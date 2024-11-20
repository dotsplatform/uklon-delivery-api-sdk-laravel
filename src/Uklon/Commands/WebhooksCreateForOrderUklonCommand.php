<?php
/**
 * Description of WebhooksListGlovoCommand.php
 * @copyright Copyright (c) DOTSPLATFORM, LLC
 * @author    Yehor Herasymchuk <yehor@dotsplatform.com>
 */

namespace Dots\Uklon\Commands;

use Dots\Uklon\Client\Requests\Webhooks\DTO\CreateWebhookDTO;
use Saloon\Exceptions\SaloonException;

class WebhooksCreateForOrderUklonCommand extends BaseUklonCommand
{
    public $signature = 'uklon:webhooks:create:order';

    public function handle(): void
    {
        $connector = $this->getUklonConnector();
        try {
            $connector->createWebhookForDriver($this->getRegisterWebhookDTO());
        } catch (SaloonException $e) {
            $this->error($e->getMessage());
        }
    }

    private function getRegisterWebhookDTO(): CreateWebhookDTO
    {
        return CreateWebhookDTO::fromArray([
            'url' => 'https://api-release.dotsdev.live/api/v1/integrations/glovo/webhooks',
            'key' => 'secret',
        ]);
    }
}
