<?php
/**
 * Description of CreateOrderDTOTest.php
 * @copyright Copyright (c) DOTSPLATFORM, LLC
 * @author    Bogdan Mamontov <bohdan.mamontov@dotsplatform.com>
 */

namespace Tests\Uklon\Client\Requests\Fares\DTO;

use Dots\Uklon\Client\Requests\Fares\DTO\CreateFareDTO;
use Tests\TestCase;

class CreateFareDTOTest extends TestCase
{
    public function testCreateExpectsOk(): void
    {
        $data = $this->generateData();
        $dto = CreateFareDTO::fromArray($data);
        $this->assertEquals($data, $dto->toArray());
    }

    private function generateData(array $data = []): array
    {
        return array_merge([
            'city' => 1,
            'pickup_point' => [
                'latitude' => 51.5044742,
                'longitude' => 31.2894746,
                'address' => 'Some address',
            ],
            'dropoff_points' => [
                [
                    'latitude' => 51.4920781,
                    'longitude' => 31.1732924,
                    'address' => 'Some address 2',
                ],
            ],
            'products' => [
                'car' => [
                    'door' => false,
                    'confirmation_code' => false,
                    'surprise' => false,
                    'buyout' => false,
                    'age_verification' => false,
                    'deferred' => null,
                    'postpayment' => null,
                ],
                'courier' => null,
            ],
            'conditions' => null,
            'strategy_id' => null,
        ], $data);
    }
}
