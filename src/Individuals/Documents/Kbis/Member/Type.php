<?php

declare(strict_types=1);

namespace Dataleon\Individuals\Documents\Kbis\Member;

use Dataleon\Core\Concerns\Enum;
use Dataleon\Core\Conversion\Contracts\ConverterSource;

/**
 * Type of entity (company or person).
 *
 * @phpstan-type type_alias = Type::*
 */
final class Type implements ConverterSource
{
    use Enum;

    public const COMPANY = 'company';

    public const PERSON = 'person';
}
