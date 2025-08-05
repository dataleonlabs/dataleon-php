<?php

namespace Dataleon\Errors;

class InternalServerError extends APIStatusError
{
    /** @var string */
    protected const DESC = 'Dataleon Internal Server Error';
}
