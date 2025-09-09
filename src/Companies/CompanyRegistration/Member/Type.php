<?php

declare(strict_types=1);

namespace Dataleon\Companies\CompanyRegistration\Member;

/**
 * Member type (person or company).
 */
enum Type: string
{
    case PERSON = 'person';

    case COMPANY = 'company';
}
