<?php

namespace Dataleon\Errors;

class BadRequestError extends APIStatusError
{
    /** @var string */
    protected const DESC = 'Dataleon Bad Request Error';
}
