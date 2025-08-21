<?php

declare(strict_types=1);

namespace Dataleon\Individuals\IndividualCreateParams\Person;

use Dataleon\Core\Concerns\SdkEnum;
use Dataleon\Core\Conversion\Contracts\ConverterSource;

/**
 * Gender of the individual (M for male, F for female).
 *
 * @phpstan-type gender_alias = Gender::*
 */
final class Gender implements ConverterSource
{
    use SdkEnum;

    public const M = 'M';

    public const F = 'F';
}
