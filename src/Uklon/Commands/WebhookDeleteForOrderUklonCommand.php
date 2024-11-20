<?php
/**
 * Description of WebhooksListGlovoCommand.php
 * @copyright Copyright (c) DOTSPLATFORM, LLC
 * @author    Yehor Herasymchuk <yehor@dotsplatform.com>
 */

namespace Dots\Uklon\Commands;

use Dots\Uklon\Client\Responses\ErrorResponseDTO;
use Saloon\Exceptions\SaloonException;

class WebhookDeleteForOrderUklonCommand extends BaseUklonCommand
{
    public $signature = 'uklon:webhooks:delete:order';

    public function handle(): void
    {
        $connector = $this->getUklonConnector();
        try {
            $connector->deleteWebhookForOrder();
        } catch (SaloonException $e) {
            $this->error($e->getMessage());
        }
    }
}
