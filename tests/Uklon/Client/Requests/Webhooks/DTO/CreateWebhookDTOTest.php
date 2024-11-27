<?php
/**
 * Description of CreateWebhookDTOTest.php
 * @copyright Copyright (c) DOTSPLATFORM, LLC
 * @author    Bogdan Mamontov <bohdan.mamontov@dotsplatform.com>
 */

namespace Tests\Uklon\Client\Requests\Webhooks\DTO;

use Dots\Uklon\Client\Requests\Webhooks\DTO\CreateWebhookDTO;
use Illuminate\Support\Str;
use Tests\TestCase;

class CreateWebhookDTOTest extends TestCase
{
    public function testCancelExpectsOk(): void
    {
        $data = $this->generateData();
        $dto = CreateWebhookDTO::fromArray($data);
        $this->assertEquals($data, $dto->toArray());
    }

    private function generateData(array $data = []): array
    {
        return array_merge([
            'url' => 'https://example.com',
            'key' => Str::uuid7()->toString(),
        ], $data);
    }
}