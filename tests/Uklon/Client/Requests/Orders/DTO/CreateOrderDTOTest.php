<?php
/**
 * Description of CreateOrderDTOTest.php
 * @copyright Copyright (c) DOTSPLATFORM, LLC
 * @author    Bogdan Mamontov <bohdan.mamontov@dotsplatform.com>
 */

namespace Tests\Uklon\Client\Requests\Orders\DTO;

use Dots\Uklon\Client\Requests\Orders\DTO\CreateOrderDTO;
use Dots\Uklon\Client\Resources\Consts\Product;
use Dots\Uklon\Client\Resources\PlaceReceivers;
use Illuminate\Support\Str;
use Tests\TestCase;

class CreateOrderDTOTest extends TestCase
{
    public function testCreateExpectsOk(): void
    {
        $data = $this->generateData();
        $dto = CreateOrderDTO::fromArray($data);
        $this->assertEquals($data, $dto->toArray());
    }

    private function generateData(array $data = []): array
    {
        return array_merge([
            'fare_id' => Str::uuid7()->toString(),
            'product' => Product::CAR->value,
            'sender' => [
                'name' => 'Yehor',
                'phone' => '+380631837252',
                'door' => null,
            ],
            'receivers' => PlaceReceivers::fromArray([
                [
                    'name' => 'Viktor',
                    'phone' => '+380631839999',
                ],
            ])->toArray(),
            'comment' => null,
            'agreed_cost' => null,
        ], $data);
    }
}
