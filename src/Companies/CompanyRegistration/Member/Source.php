<?php

declare(strict_types=1);

namespace Dataleon\Companies\CompanyRegistration\Member;

/**
 * Source of the data (e.g., government, user, company).
 */
enum Source: string
{
    case GOUVE = 'gouve';

    case USER = 'user';

    case COMPANY = 'company';
}
