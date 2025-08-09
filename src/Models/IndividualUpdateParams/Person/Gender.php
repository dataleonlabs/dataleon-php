<?php

declare(strict_types=1);

namespace Dataleon\Models\IndividualUpdateParams\Person;

use Dataleon\Core\Concerns\Enum;
use Dataleon\Core\Conversion\Contracts\ConverterSource;

/**
 * Gender of the individual (M for male, F for female).
 *
 * @phpstan-type gender_alias = Gender::*
 */
final class Gender implements ConverterSource
{
    use Enum;

    public const M = 'M';

    public const F = 'F';
}
