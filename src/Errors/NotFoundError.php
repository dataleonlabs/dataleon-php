<?php

namespace Dataleon\Errors;

class NotFoundError extends APIStatusError
{
    /** @var string */
    protected const DESC = 'Dataleon Not Found Error';
}
