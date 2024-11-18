<?php
/**
 * Description of PriceTest.php
 * @copyright Copyright (c) DOTSPLATFORM, LLC
 * @author    Yehor Herasymchuk <yehor@dotsplatform.com>
 */

namespace Tests\Uklon\Client\Resources;

use Dots\Uklon\Client\Resources\Price;
use InvalidArgumentException;
use Tests\TestCase;

class PriceTest extends TestCase
{
    /**
     * @dataProvider getProvideValidPriceTestData
     */
    public function testPriceCreation(string $currencyCode, float $value): void
    {
        $price = Price::fromArray(['currencyCode' => $currencyCode, 'value' => $value]);

        $this->assertEquals($currencyCode, $price->getCurrencyCode());
        $this->assertEquals($value, $price->getValue());
    }

    /**
     * @dataProvider getProvideValidPriceTestData
     */
    public function testPriceFromArrayToArray(string $currencyCode, float $value): void
    {
        $dto = Price::fromArray(['currencyCode' => $currencyCode, 'value' => $value]);
        $price = Price::fromArray($dto->toArray());

        $this->assertEquals($currencyCode, $price->getCurrencyCode());
        $this->assertEquals($value, $price->getValue());
    }

    /**
     * @dataProvider getProvideInvalidPriceTestData
     */
    public function testInvalidPriceCreation(array $data, string $expectedExceptionMessage): void
    {
        $this->expectException(InvalidArgumentException::class);
        $this->expectExceptionMessage($expectedExceptionMessage);

        Price::fromArray($data);
    }

    public static function getProvideValidPriceTestData(): array
    {
        return [
            'valid price' => ['USD', 10.0],
            'zero value' => ['EUR', 0.0],
        ];
    }

    public static function getProvideInvalidPriceTestData(): array
    {
        return [
            'empty currency code' => [['currencyCode' => '', 'value' => 10.0], 'Price currency is required'],
            'missing value' => [['currencyCode' => 'USD'], 'Price value is required'],
            'negative value' => [['currencyCode' => 'USD', 'value' => -5.0], 'Price should be greater or equal than 0'],
        ];
    }
}
