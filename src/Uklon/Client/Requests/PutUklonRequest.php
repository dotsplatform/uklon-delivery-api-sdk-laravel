<?php
/**
 * Description of PutUklonRequest.php
 * @copyright Copyright (c) DOTSPLATFORM, LLC
 * @author    Bogdan Mamontov <bohdan.mamontov@dotsplatform.com>
 */

namespace Dots\Uklon\Client\Requests;

use Saloon\Contracts\Body\HasBody;
use Saloon\Enums\Method;
use Saloon\Traits\Body\HasJsonBody;

abstract class PutUklonRequest extends BaseUklonRequest implements HasBody
{
    use HasJsonBody;

    protected Method $method = Method::PUT;
}
