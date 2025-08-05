<?php

declare(strict_types=1);

namespace Dataleon\Core\Conversion\Contracts;

use Dataleon\Core\Conversion\CoerceState;
use Dataleon\Core\Conversion\DumpState;

/**
 * @internal
 */
interface Converter
{
    /**
     * @internal
     */
    public function coerce(mixed $value, CoerceState $state): mixed;

    /**
     * @internal
     */
    public function dump(mixed $value, DumpState $state): mixed;
}
