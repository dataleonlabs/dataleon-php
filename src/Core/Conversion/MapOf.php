<?php

declare(strict_types=1);

namespace Dataleon\Core\Conversion;

use Dataleon\Core\Conversion\Concerns\ArrayOf;
use Dataleon\Core\Conversion\Contracts\Converter;

/**
 * @internal
 */
final class MapOf implements Converter
{
    use ArrayOf;
}
