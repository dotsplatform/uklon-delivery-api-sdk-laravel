<?php
/**
 * Description of UklonOAuthResponseGenerator.php
 * @copyright Copyright (c) DOTSPLATFORM, LLC
 * @author    Bogdan Mamontov <bohdan.mamontov@dotsplatform.com>
 */

namespace Dots\Uklon\Mock\Data;

class UklonOAuthResponseGenerator
{
    public static function generate(array $data = []): array
    {
        return array_merge([
            'accessToken' => '4e9a260e-98aa-404a-bb7a-5fb7ca30d98b',
            'tokenType' => 'bearer',
            'expiresIn' => 1199,
            'refreshToken' => '4e9a260e-98aa-404a-bb7a-5fb7ca30d98b',
            'twoFactorToken' => null,
            'scope' => null,
        ], $data);
    }
}
