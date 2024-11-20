<?php
/**
 * Description of OrderResponse.php
 * @copyright Copyright (c) DOTSPLATFORM, LLC
 * @author    Yehor Herasymchuk <yehor@dotsplatform.com>
 */

namespace Dots\Uklon\Client\Resources\Fares\Estimations;

use Dots\Data\DTO;

class EstimatedProduct extends DTO
{
    protected ProductEstimation $estimation;

    protected EstimationError $error;

    public static function fromArray(array $data): static
    {
        $data['estimation'] = ProductEstimation::fromArray($data['estimation'] ?? []);
        $data['error'] = EstimationError::fromArray($data['error'] ?? []);

        return parent::fromArray($data);
    }

    public function getEstimation(): ProductEstimation
    {
        return $this->estimation;
    }

    public function getError(): ?EstimationError
    {
        return $this->error;
    }
}
