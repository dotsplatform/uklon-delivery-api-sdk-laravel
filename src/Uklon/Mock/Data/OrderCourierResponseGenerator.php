<?php
/**
 * Description of OrderCourierResponseGenerator.php
 * @copyright Copyright (c) DOTSPLATFORM, LLC
 * @author    Oleksandr Polosmak <o.polosmak@dotsplatform.com>
 */

namespace Dots\Uklon\Mock\Data;

class OrderCourierResponseGenerator
{
    public static function generate(): array
    {
        return [
            'courierName' => 'John Doe',
            'courierPhone' => '+34666666666',
        ];
    }
}
