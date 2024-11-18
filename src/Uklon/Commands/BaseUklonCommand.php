<?php
/**
 * Description of BaseGlovoCommand.php
 * @copyright Copyright (c) DOTSPLATFORM, LLC
 * @author    Yehor Herasymchuk <yehor@dotsplatform.com>
 */

namespace Dots\Uklon\Commands;

use Dots\Uklon\Client\DTO\UklonAuthDTO;
use Dots\Uklon\Client\UklonConnector;
use Illuminate\Console\Command;
use InvalidArgumentException;

abstract class BaseUklonCommand extends Command
{
    protected function getUklonConnector(): UklonConnector
    {
        return app(UklonConnector::class);
    }

    protected function assertIntValue(mixed $value): int
    {
        if (! is_numeric($value)) {
            throw new InvalidArgumentException('Value must be integer');
        }

        return (int) $value;
    }

    protected function assertStringValue(mixed $value): string
    {
        if (! is_string($value)) {
            throw new InvalidArgumentException('Value must be integer');
        }

        return $value;
    }
}
