<?php

declare(strict_types=1);

namespace Dataleon\Companies\CompanyRegistration\Member;

use Dataleon\Core\Concerns\SdkEnum;
use Dataleon\Core\Conversion\Contracts\ConverterSource;

/**
 * Source of the data (e.g., government, user, company).
 */
final class Source implements ConverterSource
{
    use SdkEnum;

    public const GOUVE = 'gouve';

    public const USER = 'user';

    public const COMPANY = 'company';
}
