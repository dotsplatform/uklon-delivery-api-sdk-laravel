<?php
/**
 * Description of WebhooksListGlovoCommand.php
 * @copyright Copyright (c) DOTSPLATFORM, LLC
 * @author    Yehor Herasymchuk <yehor@dotsplatform.com>
 */

namespace Dots\Uklon\Commands;

class WebhooksListUklonCommand extends BaseUklonCommand
{
    public $signature = 'uklon:webhooks:list';

    public function handle(): void
    {
        $connector = $this->getUklonConnector();
        $dto = $connector->getWebhooks();
        dd($dto);
    }
}
