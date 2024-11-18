<?php
/**
 * Description of PriceAmount.php
 * @copyright Copyright (c) DOTSPLATFORM, LLC
 * @author    Yehor Herasymchuk <yehor@dotsplatform.com>
 */

namespace Dots\Uklon\Client\Resources;

use Dots\Data\DTO;
use InvalidArgumentException;

class Price extends DTO
{
    // The currency codes follow the ISO 4217 format. e.g. EUR, USD, GBP, UAH, etc.
    protected string $currencyCode;

    protected float $value;

    protected function assertConstructDataIsValid(array $data): void
    {
        if (empty($data['currencyCode'])) {
            throw new InvalidArgumentException('Price currency is required');
        }
        if (! isset($data['value'])) {
            throw new InvalidArgumentException('Price value is required');
        }
        if ($data['value'] < 0) {
            throw new InvalidArgumentException('Price should be greater or equal than 0');
        }
    }

    public function getCurrencyCode(): string
    {
        return $this->currencyCode;
    }

    public function getValue(): float
    {
        return $this->value;
    }
}
