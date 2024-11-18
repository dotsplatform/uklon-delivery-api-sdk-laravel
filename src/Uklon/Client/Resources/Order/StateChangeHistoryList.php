<?php
/**
 * Description of StateChangeHistoryList.php
 * @copyright Copyright (c) DOTSPLATFORM, LLC
 * @author    Yehor Herasymchuk <yehor@dotsplatform.com>
 */

namespace Dots\Uklon\Client\Resources\Order;

use Illuminate\Support\Collection;

/**
 * @method StateChangeHistory[] all()
 * @method StateChangeHistory|null first()
 */
class StateChangeHistoryList extends Collection
{
    public static function fromArray(array $data): self
    {
        return new self(
            array_map(
                fn (array $item) => StateChangeHistory::fromArray($item),
                $data
            )
        );
    }
}
