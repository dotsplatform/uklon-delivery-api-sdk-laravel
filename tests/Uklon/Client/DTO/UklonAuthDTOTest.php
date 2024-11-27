<?php
/**
 * Description of UklonAuthDTOTest.php
 * @copyright Copyright (c) DOTSPLATFORM, LLC
 * @author    Bogdan Mamontov <bohdan.mamontov@dotsplatform.com>
 */

namespace Tests\Uklon\Client\DTO;

use Dots\Uklon\Client\DTO\UklonAuthDTO;
use PHPUnit\Framework\Attributes\DataProvider;
use Tests\TestCase;

class UklonAuthDTOTest extends TestCase
{
    #[DataProvider('provideUklonAuthDTOData')]
    public function testMakeUklonAuthDTO(
        string $appUid,
        string $clientId,
        string $clientSecret,
    ): void {
        $uklonAuthDTO = UklonAuthDTO::make($appUid, $clientId, $clientSecret);

        $this->assertEquals($clientId, $uklonAuthDTO->getClientId());
        $this->assertEquals($clientSecret, $uklonAuthDTO->getClientSecret());
    }

    #[DataProvider('provideUklonAuthDTOData')]
    public function testFromArrayUklonAuthDTO(
        string $appUid,
        string $clientId,
        string $clientSecret,
    ): void {
        $uklonAuthDTO = UklonAuthDTO::fromArray([
            'appUid' => $appUid,
            'clientId' => $clientId,
            'clientSecret' => $clientSecret,
        ]);

        $this->assertEquals($clientId, $uklonAuthDTO->getClientId());
        $this->assertEquals($clientSecret, $uklonAuthDTO->getClientSecret());
    }

    #[DataProvider('provideUklonAuthDTOData')]
    public function testFromArrayToArrayUklonAuthDTO(
        string $appUid,
        string $clientId,
        string $clientSecret,
    ): void {
        $dto = UklonAuthDTO::fromArray([
            'appUid' => $appUid,
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
                'appUid' => 'testAppUid',
                'clientId' => 'testClientId',
                'clientSecret' => 'testClientSecret',
            ],
        ];
    }
}
