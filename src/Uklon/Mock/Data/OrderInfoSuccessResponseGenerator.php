<?php
/**
 * Description of CreateOrderSucccessResponse.php
 * @copyright Copyright (c) DOTSPLATFORM, LLC
 * @author    Oleksandr Polosmak <o.polosmak@dotsplatform.com>
 */

namespace Dots\Uklon\Mock\Data;

class OrderInfoSuccessResponseGenerator
{
    public static function generate(array $data = []): array
    {
        return array_merge([
            'address' => [
                'cityName' => 'Barcelona',
                'country' => 'Spain',
                'details' => 'Additional information',
                'postalCode' => 30123,
                'rawAddress' => 'Calle Oporto 2, 30123, Barcelona, Spain',
                'formattedAddress' => 'Calle Oporto 2, 30123, Barcelona, Spain',
                'streetName' => 'Calle Oporto',
                'streetNumber' => 2,
                'coordinates' => [
                    'latitude' => 41.47155,
                    'longitude' => 2.011038,
                ],
            ],
            'cityCode' => 'BCN',
            'contact' => [
                'email' => 'recipient@email.com',
                'name' => 'Recipient',
                'phone' => '+346666666666',
            ],
            'packageDetails' => [
                'contentType' => 'FOOD',
                'description' => 'A RAM expansion',
                'parcelValue' => 50,
                'weight' => 1,
            ],
            'packageId' => 1213122,
            'partnerId' => 14576873,
            'pickupDetails' => [
                'address' => [
                    'cityName' => 'Barcelona',
                    'country' => 'Spain',
                    'details' => 'Additional information',
                    'postalCode' => 30123,
                    'rawAddress' => 'Calle Oporto 2, 30123, Barcelona, Spain',
                    'formattedAddress' => 'Calle Oporto 2, 30123, Barcelona, Spain',
                    'streetName' => 'Calle Oporto',
                    'streetNumber' => 2,
                    'coordinates' => [
                        'latitude' => 41.47155,
                        'longitude' => 2.011038,
                    ],
                ],
                'pickupOrderCode' => 'PickupOrderCode123',
                'pickupTime' => '2019-08-24T14:15:22Z',
                'pickupPhone' => '+34666666666',
            ],
            'price' => [
                'delivery' => [
                    'currencyCode' => 'EUR',
                    'value' => 5.5,
                ],
                'parcel' => [
                    'currencyCode' => 'EUR',
                    'value' => 5.5,
                ],
            ],
            'status' => [
                'createdAt' => '2019-08-24T14:15:22Z',
                'deliveryAt' => '2019-08-24',
                'lastUpdateAt' => '2019-08-24T14:15:22Z',
                'state' => 'CREATED',
                'stateChangeHistory' => [
                    [
                        'date' => '2019-08-24T14:15:22Z',
                        'reason' => 'Reason',
                        'value' => 'PICKED',
                    ],
                ],
            ],
            'trackingNumber' => 'GVALEBCN000088821238',
            'orderCode' => 'WKGQJPF3',
            'cancellable' => true,
            'estimatedTimeOfArrival' => [
                'type' => 'PICKUP',
                'eta' => '2023-05-13T13:21:22Z',
            ],
        ], $data);
    }
}
