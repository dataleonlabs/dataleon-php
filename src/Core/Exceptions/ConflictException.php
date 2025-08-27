<?php

namespace Dataleon\Core\Exceptions;

class ConflictException extends APIStatusException
{
    /** @var string */
    protected const DESC = 'Dataleon Conflict Exception';
}
