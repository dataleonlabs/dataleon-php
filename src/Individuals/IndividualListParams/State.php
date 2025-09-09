<?php

declare(strict_types=1);

namespace Dataleon\Individuals\IndividualListParams;

/**
 * Filter by individual status (must be one of the allowed values).
 */
enum State: string
{
    case VOID = 'VOID';

    case WAITING = 'WAITING';

    case STARTED = 'STARTED';

    case RUNNING = 'RUNNING';

    case PROCESSED = 'PROCESSED';

    case FAILED = 'FAILED';

    case ABORTED = 'ABORTED';

    case EXPIRED = 'EXPIRED';

    case DELETED = 'DELETED';
}
