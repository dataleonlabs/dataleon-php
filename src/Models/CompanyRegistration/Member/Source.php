<?php

declare(strict_types=1);

namespace Dataleon\Models\CompanyRegistration\Member;

use Dataleon\Core\Concerns\Enum;
use Dataleon\Core\Conversion\Contracts\ConverterSource;

/**
 * Source of the data (e.g., government, user, company).
 *
 * @phpstan-type source_alias = Source::*
 */
final class Source implements ConverterSource
{
    use Enum;

    public const GOUVE = 'gouve';

    public const USER = 'user';

    public const COMPANY = 'company';
}
