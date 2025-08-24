<?php

declare(strict_types=1);

namespace Dataleon\Companies\CompanyRegistration\Member;

use Dataleon\Core\Concerns\SdkEnum;
use Dataleon\Core\Conversion\Contracts\ConverterSource;

/**
 * Member type (person or company).
 */
final class Type implements ConverterSource
{
    use SdkEnum;

    public const PERSON = 'person';

    public const COMPANY = 'company';
}
