<?php

declare(strict_types=1);

namespace Dataleon\Individuals\IndividualUpdateParams\Person;

/**
 * Gender of the individual (M for male, F for female).
 */
enum Gender: string
{
    case M = 'M';

    case F = 'F';
}
