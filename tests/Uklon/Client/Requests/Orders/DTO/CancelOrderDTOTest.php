<?php
/**
 * Description of CreateOrderDTOTest.php
 * @copyright Copyright (c) DOTSPLATFORM, LLC
 * @author    Bogdan Mamontov <bohdan.mamontov@dotsplatform.com>
 */

namespace Tests\Uklon\Client\Requests\Orders\DTO;

use Dots\Uklon\Client\Requests\Orders\DTO\CancelOrderDTO;
use Dots\Uklon\Client\Resources\Consts\CancelReason;
use Tests\TestCase;

class CancelOrderDTOTest extends TestCase
{
    public function testCancelExpectsOk(): void
    {
        $data = $this->generateData();
        $dto = CancelOrderDTO::fromArray($data);
        $this->assertEquals($data, $dto->toArray());
    }

    private function generateData(array $data = []): array
    {
        return array_merge([
            'reason' => CancelReason::DRIVER_WAS_LATE->value,
        ], $data);
    }
}
