<?php
/**
 * Description of BaseGlovoRequest.php
 * @copyright Copyright (c) DOTSPLATFORM, LLC
 * @author    Yehor Herasymchuk <yehor@dotsplatform.com>
 */

namespace Dots\Uklon\Client\Requests;

use Saloon\Contracts\Body\HasBody;
use Saloon\Enums\Method;
use Saloon\Traits\Body\HasJsonBody;

abstract class PostUklonRequest extends BaseUklonRequest implements HasBody
{
    use HasJsonBody;

    protected Method $method = Method::POST;
}
