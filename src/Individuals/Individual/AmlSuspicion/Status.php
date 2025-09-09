<?php

declare(strict_types=1);

namespace Dataleon\Individuals\Individual\AmlSuspicion;

/**
 * Status of the suspicion review process. Possible values: "true_positive", "false_positive", "pending".
 */
enum Status: string
{
    case TRUE_POSITIVE = 'true_positive';

    case FALSE_POSITIVE = 'false_positive';

    case PENDING = 'pending';
}
