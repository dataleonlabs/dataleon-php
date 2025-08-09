<?php

declare(strict_types=1);

namespace Dataleon\Models\CompanyListParams;

use Dataleon\Core\Concerns\Enum;
use Dataleon\Core\Conversion\Contracts\ConverterSource;

/**
 * Filter by company state (must be one of the allowed values).
 *
 * @phpstan-type state_alias = State::*
 */
final class State implements ConverterSource
{
    use Enum;

    public const VOID = 'VOID';

    public const WAITING = 'WAITING';

    public const STARTED = 'STARTED';

    public const RUNNING = 'RUNNING';

    public const PROCESSED = 'PROCESSED';

    public const FAILED = 'FAILED';

    public const ABORTED = 'ABORTED';

    public const EXPIRED = 'EXPIRED';

    public const DELETED = 'DELETED';
}
