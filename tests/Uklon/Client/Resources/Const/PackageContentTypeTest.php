<?php
/**
 * Description of PackageContentTypeTest.php
 * @copyright Copyright (c) DOTSPLATFORM, LLC
 * @author    Yehor Herasymchuk <yehor@dotsplatform.com>
 */

namespace Tests\Uklon\Client\Resources\Const;

use Dots\Uklon\Client\Resources\Consts\PackageContentType;
use Tests\TestCase;

class PackageContentTypeTest extends TestCase
{
    public function testPackageContentTypeValues(): void
    {
        $this->assertEquals('FOOD', PackageContentType::FOOD->value);
        $this->assertEquals('GENERIC_PARCEL', PackageContentType::GENERIC_PARCEL->value);
    }
}
