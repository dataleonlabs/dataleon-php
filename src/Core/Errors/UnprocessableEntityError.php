<?php

namespace Dataleon\Core\Errors;

class UnprocessableEntityError extends APIStatusError
{
    /** @var string */
    protected const DESC = 'Dataleon Unprocessable Entity Error';
}
