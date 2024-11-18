<?php
/**
 * Description of OrderPriceTest.php
 * @copyright Copyright (c) DOTSPLATFORM, LLC
 * @author    Yehor Herasymchuk <yehor@dotsplatform.com>
 */

namespace Tests\Uklon\Client\Resources\Order;

use Dots\Uklon\Client\Resources\Order\OrderPrice;
use Tests\TestCase;

class OrderPriceTest extends TestCase
{
    /**
     * @dataProvider getProvideOrderPriceData
     */
    public function testOrderPrice(array $deliveryData, array $parcelData): void
    {
        $orderPrice = OrderPrice::fromArray([
            'delivery' => $deliveryData,
            'parcel' => $parcelData,
        ]);

        $deliveryPrice = $orderPrice->getDelivery();
        $parcelPrice = $orderPrice->getParcel();

        $this->assertEquals($deliveryData['currencyCode'], $deliveryPrice->getCurrencyCode());
        $this->assertEquals($deliveryData['value'], $deliveryPrice->getValue());

        $this->assertEquals($parcelData['currencyCode'], $parcelPrice->getCurrencyCode());
        $this->assertEquals($parcelData['value'], $parcelPrice->getValue());
    }

    public static function getProvideOrderPriceData(): array
    {
        return [
            'USD' => [
                ['currencyCode' => 'USD', 'value' => 15.00],
                ['currencyCode' => 'USD', 'value' => 5.00],
            ],
            'UAH' => [
                ['currencyCode' => 'UAH', 'value' => 15.00],
                ['currencyCode' => 'UAH', 'value' => 5.00],
            ],
            'Zero UAH' => [
                ['currencyCode' => 'UAH', 'value' => 0],
                ['currencyCode' => 'UAH', 'value' => 0],
            ],
            'Eur' => [
                ['currencyCode' => 'EUR', 'value' => 20.00],
                ['currencyCode' => 'EUR', 'value' => 7.50],
            ],
        ];
    }
}
