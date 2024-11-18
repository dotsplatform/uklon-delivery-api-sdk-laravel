<?php
/**
 * Description of RetryConfig.php
 * @copyright Copyright (c) DOTSPLATFORM, LLC
 * @author    Yehor Herasymchuk <yehor@dotsplatform.com>
 */

namespace Dots\Uklon\Client\Resources\Webhook;

use Dots\Data\DTO;
use InvalidArgumentException;

class RetryConfig extends DTO
{
    protected int $maxRetryCount = 3;

    protected function assertConstructDataIsValid(array $data): void
    {
        if (empty($data['maxRetryCount'])) {
            throw new InvalidArgumentException('maxRetryCount is required');
        }
        if ($data['maxRetryCount'] < 1 || $data['maxRetryCount'] > 5) {
            throw new InvalidArgumentException('maxRetryCount must be between 1 and 5');
        }
    }
}
