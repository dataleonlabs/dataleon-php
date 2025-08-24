<?php

declare(strict_types=1);

namespace Dataleon\Companies\CompanyRegistration\AmlSuspicion;

use Dataleon\Core\Concerns\SdkEnum;
use Dataleon\Core\Conversion\Contracts\ConverterSource;

/**
 * Status of the suspicion review process. Possible values: "true_positive", "false_positive", "pending".
 */
final class Status implements ConverterSource
{
    use SdkEnum;

    public const TRUE_POSITIVE = 'true_positive';

    public const FALSE_POSITIVE = 'false_positive';

    public const PENDING = 'pending';
}
