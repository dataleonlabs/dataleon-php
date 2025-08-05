<?php

namespace Dataleon\Errors;

class UnprocessableEntityError extends APIStatusError
{
    /** @var string */
    protected const DESC = 'Dataleon Unprocessable Entity Error';
}
