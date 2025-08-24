<?php

declare(strict_types=1);

namespace Dataleon\Individuals\IndividualListParams;

use Dataleon\Core\Concerns\SdkEnum;
use Dataleon\Core\Conversion\Contracts\ConverterSource;

/**
 * Filter by individual status (must be one of the allowed values).
 */
final class State implements ConverterSource
{
    use SdkEnum;

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
