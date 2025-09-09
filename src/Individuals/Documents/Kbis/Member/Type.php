<?php

declare(strict_types=1);

namespace Dataleon\Individuals\Documents\Kbis\Member;

/**
 * Type of entity (company or person).
 */
enum Type: string
{
    case COMPANY = 'company';

    case PERSON = 'person';
}
