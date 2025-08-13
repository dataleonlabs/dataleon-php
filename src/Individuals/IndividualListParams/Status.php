<?php

declare(strict_types=1);

namespace Dataleon\Individuals\IndividualListParams;

use Dataleon\Core\Concerns\Enum;
use Dataleon\Core\Conversion\Contracts\ConverterSource;

/**
 * Filter by individual status (must be one of the allowed values).
 *
 * @phpstan-type status_alias = Status::*
 */
final class Status implements ConverterSource
{
    use Enum;

    public const REJECTED = 'rejected';

    public const NEED_REVIEW = 'need_review';

    public const APPROVED = 'approved';
}
