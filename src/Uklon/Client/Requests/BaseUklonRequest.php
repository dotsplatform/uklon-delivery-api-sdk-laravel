<?php
/**
 * Description of BaseUklonRequest.php
 * @copyright Copyright (c) DOTSPLATFORM, LLC
 * @author    Yehor Herasymchuk <yehor@dotsplatform.com>
 */

namespace Dots\Uklon\Client\Requests;

use Saloon\Enums\Method;
use Saloon\Http\Request;

abstract class BaseUklonRequest extends Request
{
    protected Method $method = Method::GET;
}
