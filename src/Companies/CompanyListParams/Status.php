<?php

declare(strict_types=1);

namespace Dataleon\Companies\CompanyListParams;

/**
 * Filter by individual status (must be one of the allowed values).
 */
enum Status: string
{
    case REJECTED = 'rejected';

    case NEED_REVIEW = 'need_review';

    case APPROVED = 'approved';
}
