<?php

declare(strict_types=1);

namespace Dataleon\Companies\CompanyRegistration\AmlSuspicion;

use Dataleon\Core\Concerns\SdkEnum;
use Dataleon\Core\Conversion\Contracts\ConverterSource;

/**
 * Watchlist category associated with the suspicion. Possible values include Watchlist types like "PEP", "Sanctions", "RiskyEntity", or "Crime".
 *
 * @phpstan-type type_alias = Type::*
 */
final class Type implements ConverterSource
{
    use SdkEnum;

    public const WATCHLIST = 'Watchlist';

    public const PEP = 'PEP';

    public const SANCTIONS = 'Sanctions';

    public const RISKY_ENTITY = 'RiskyEntity';

    public const CRIME = 'Crime';
}
