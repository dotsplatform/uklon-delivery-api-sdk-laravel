<?php
/**
 * Description of OrderResponse.php
 * @copyright Copyright (c) DOTSPLATFORM, LLC
 * @author    Yehor Herasymchuk <yehor@dotsplatform.com>
 */

namespace Dots\Uklon\Client\Resources\Fares\Estimations;

use Dots\Data\DTO;
use Dots\Uklon\Client\Resources\Address;
use Dots\Uklon\Client\Resources\Contact;
use Dots\Uklon\Client\Resources\EstimatedTimeOfArrival;
use Dots\Uklon\Client\Resources\Order\OrderPrice;
use Dots\Uklon\Client\Resources\Order\OrderStatus;
use Dots\Uklon\Client\Resources\Order\PackageDetails;
use Dots\Uklon\Client\Resources\Order\PickupDetails;
use Dots\Uklon\Client\Resources\Order\StateChangeHistoryList;

class EstimatedRoute extends DTO
{
    protected Distance $distance;

    protected string $overview_polyline;

    protected int $drive_time_seconds;

    public static function fromArray(array $data): static
    {
        $data['distance'] = Distance::fromArray($data['distance']);

        return parent::fromArray($data);
    }

    public function getDistance(): Distance
    {
        return $this->distance;
    }

    public function getOverviewPolyline(): string
    {
        return $this->overview_polyline;
    }

    public function getDriveTimeSeconds(): int
    {
        return $this->drive_time_seconds;
    }
}
