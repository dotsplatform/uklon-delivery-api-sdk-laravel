<?php
/**
 * Description of OrderResponse.php
 * @copyright Copyright (c) DOTSPLATFORM, LLC
 * @author    Yehor Herasymchuk <yehor@dotsplatform.com>
 */

namespace Dots\Uklon\Client\Responses\Fares;

use Dots\Uklon\Client\Resources\Fares\Estimations\EstimatedProducts;
use Dots\Uklon\Client\Responses\UklonResponseDTO;

class FareResponseDTO extends UklonResponseDTO
{
    protected string $uuid;

    protected string $currency;

    protected EstimatedProducts $estimated_products;

    protected int $expires_at;

    public static function fromArray(array $data): static
    {
        $data['estimated_products'] = EstimatedProducts::fromArray($data['estimated_products']);

        return parent::fromArray($data);
    }

    public function getUuid(): string
    {
        return $this->uuid;
    }

    public function getCurrency(): string
    {
        return $this->currency;
    }

    public function getEstimatedProducts(): EstimatedProducts
    {
        return $this->estimated_products;
    }

    public function getExpiresAt(): int
    {
        return $this->expires_at;
    }
}
