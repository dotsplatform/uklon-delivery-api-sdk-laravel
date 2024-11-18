<?php
/**
 * Description of GlovoAuthDTOTest.php
 * @copyright Copyright (c) DOTSPLATFORM, LLC
 * @author    Yehor Herasymchuk <yehor@dotsplatform.com>
 */

namespace Tests\Uklon\Client\DTO;

use Dots\Uklon\Client\DTO\UklonAuthDTO;
use Tests\TestCase;

class UklonAuthDTOTest extends TestCase
{
    /**
     * @dataProvider provideUklonAuthDTOData
     */
    public function testMakeGlovoAuthDTO(string $clientId, string $clientSecret): void
    {
        $glovoAuthDTO = UklonAuthDTO::make($clientId, $clientSecret);

        $this->assertEquals($clientId, $glovoAuthDTO->getClientId());
        $this->assertEquals($clientSecret, $glovoAuthDTO->getClientSecret());
    }

    /**
     * @dataProvider provideUklonAuthDTOData
     */
    public function testFromArrayGlovoAuthDTO(string $clientId, string $clientSecret): void
    {
        $glovoAuthDTO = UklonAuthDTO::fromArray([
            'clientId' => $clientId,
            'clientSecret' => $clientSecret,
        ]);

        $this->assertEquals($clientId, $glovoAuthDTO->getClientId());
        $this->assertEquals($clientSecret, $glovoAuthDTO->getClientSecret());
    }

    /**
     * @dataProvider provideUklonAuthDTOData
     */
    public function testFromArrayToArrayGlovoAuthDTO(string $clientId, string $clientSecret): void
    {
        $dto = UklonAuthDTO::fromArray([
            'clientId' => $clientId,
            'clientSecret' => $clientSecret,
        ]);
        $glovoAuthDTO = UklonAuthDTO::fromArray($dto->toArray());

        $this->assertEquals($clientId, $glovoAuthDTO->getClientId());
        $this->assertEquals($clientSecret, $glovoAuthDTO->getClientSecret());
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
