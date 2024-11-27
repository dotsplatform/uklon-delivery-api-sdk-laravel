<?php
/**
 * Description of CreateOrderSucccessResponse.php
 * @copyright Copyright (c) DOTSPLATFORM, LLC
 * @author    Bogdan Mamontov <bohdan.mamontov@dotsplatform.com>
 */

namespace Dots\Uklon\Mock\Data;

use Dots\Uklon\Client\Resources\Distance;
use Dots\Uklon\Client\Resources\Fares\Estimations\EstimatedCost;
use Dots\Uklon\Client\Resources\Fares\Estimations\EstimatedProduct;
use Dots\Uklon\Client\Resources\Fares\Estimations\EstimatedProducts;
use Dots\Uklon\Client\Resources\Fares\Estimations\EstimatedRoute;
use Dots\Uklon\Client\Resources\Fares\Estimations\ProductEstimation;

class FareSuccessResponseGenerator
{
    public static function generate(array $data = []): array
    {
        return array_merge([
            'id' => '01936d6b-2526-72e4-9b57-654f6545c818',
            'currency' => 'UAH',
            'estimated_products' => EstimatedProducts::fromArray([
                'car' => EstimatedProduct::fromArray([
                    'estimation' => ProductEstimation::fromArray([
                        'cost' => EstimatedCost::fromArray([
                            'minimum' => 120,
                            'recommended' => 120,
                            'maximum' => 400,
                            'surge_multiplier' => 1,
                            'main_route' => 120,
                        ])->toArray(),
                        'route' => EstimatedRoute::fromArray([
                            'distance' => Distance::fromArray([
                                'cityMeters' => 3000,
                                'suburbanMeters' => 1000,
                            ])->toArray(),
                            'overview_polyline' => 'eojyHoe~}DbAtH\dC`AbHPnAXrBNjAJn@Ht@N`AD`@DPZMx@_@v@]tAq@rAq@f@WJINIH`@Jf@L~@f@hDHl@VvBD\Jp@h@xD`@rCh@|D@DLbAFVJTJTJTJNLLHHVVj@`@bEbD~ArAHHB@GBIRkBdEi@rAGLM^o@jCKf@]jBg@`D]xBQfAKf@Oj@Sj@KXQZQ\kBxCKRSZAJ@^@nFAh@?d@?XAXA`@E~@KtAObCQdCOrBOlC@v@Dp@Fp@Hh@Lh@Nh@Tf@L\P`@Ld@Jf@Fl@NbAHh@Df@Fl@Hh@Px@n@fDF\v@xD\|Aj@lCb@tB^lBhAtF^fBDVJj@VlADVBpA?|@DtB@jADrA?tAAhAMfBCVWhEK~A]nEUtCEj@AFAFS`CAVANALKlAMpBAXC`@UbDATCTe@fHQzBGnAGfAGdA?DE|AC|@?Ne@fOAVKjDOhDI`CUjFW`FIhAMvBaAxOCZKjBE^Ch@AZ@XD^Lf@|BvHXdATdAr@~Df@dELl@Fj@?^@JCl@IdAk@pGIt@SvAGn@If@CPC^C^A`@Ab@?d@@b@Df@Fl@H`@FTFXJXL\PXVV~AxAvAxALJb@\dAt@dEdDTNZLRD^@P?pD]ZGZMp@[XSd@g@p@m@VUXOPIRGVGRAH?ZB\Hh@LvA~@p@`@ZZDTFd@Ab@An@s@lNOvCIbBY~FE~@E\c@~Fe@rFCh@WtCKfAM|Ac@~Cs@bFI`@aA`GSpAOz@I^Mt@_@hBWz@Wp@c@nBoAzEk@xBi@pBsAhFwArF_@rAuBjIcAxDWhACJuAvGI^_AvEYvA]`B]hAEPSx@Qx@GZKn@SbAIf@RI`Co@ZIfD_AbDu@`Ds@tKkBdEs@',
                            'drive_time_seconds' => 600,
                        ])->toArray(),
                    ])->toArray(),
                ])->toArray(),
            ])->toArray(),
            'expires_at' => time() + 600,
        ], $data);
    }
}
