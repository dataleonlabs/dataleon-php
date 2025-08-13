<?php

declare(strict_types=1);

namespace Dataleon\Companies\CompanyRegistration\Member;

use Dataleon\Core\Concerns\Enum;
use Dataleon\Core\Conversion\Contracts\ConverterSource;

/**
 * Member type (person or company).
 *
 * @phpstan-type type_alias = Type::*
 */
final class Type implements ConverterSource
{
    use Enum;

    public const PERSON = 'person';

    public const COMPANY = 'company';
}
