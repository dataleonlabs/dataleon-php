<?php

namespace Dataleon\Errors;

class ConflictError extends APIStatusError
{
    /** @var string */
    protected const DESC = 'Dataleon Conflict Error';
}
