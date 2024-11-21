<?php
/**
 * Description of UklonAuthDTOTest.php
 * @copyright Copyright (c) DOTSPLATFORM, LLC
 * @author    Bogdan Mamontov <bohdan.mamontov@dotsplatform.com>
 */

namespace Tests\Uklon\Client\DTO;

use Dots\Uklon\Client\DTO\UklonAuthDTO;
use Tests\TestCase;

class UklonAuthDTOTest extends TestCase
{
    /**
     * @dataProvider provideUklonAuthDTOData
     */
    public function testMakeUklonAuthDTO(string $clientId, string $clientSecret): void
    {
        $uklonAuthDTO = UklonAuthDTO::make($clientId, $clientSecret);

        $this->assertEquals($clientId, $uklonAuthDTO->getClientId());
        $this->assertEquals($clientSecret, $uklonAuthDTO->getClientSecret());
    }

    /**
     * @dataProvider provideUklonAuthDTOData
     */
    public function testFromArrayUklonAuthDTO(string $clientId, string $clientSecret): void
    {
        $uklonAuthDTO = UklonAuthDTO::fromArray([
            'clientId' => $clientId,
            'clientSecret' => $clientSecret,
        ]);

        $this->assertEquals($clientId, $uklonAuthDTO->getClientId());
        $this->assertEquals($clientSecret, $uklonAuthDTO->getClientSecret());
    }

    /**
     * @dataProvider provideUklonAuthDTOData
     */
    public function testFromArrayToArrayUklonAuthDTO(string $clientId, string $clientSecret): void
    {
        $dto = UklonAuthDTO::fromArray([
            'clientId' => $clientId,
            'clientSecret' => $clientSecret,
        ]);
        $uklonAuthDTO = UklonAuthDTO::fromArray($dto->toArray());

        $this->assertEquals($clientId, $uklonAuthDTO->getClientId());
        $this->assertEquals($clientSecret, $uklonAuthDTO->getClientSecret());
    }

    public static function provideUklonAuthDTOData(): array
    {
        return [
            'valid data' => [
                'clientId' => 'testClientId',
                'clientSecret' => 'testClientSecret',
            ],
        ];
    }
}
