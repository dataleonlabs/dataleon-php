<?php

namespace Dataleon\Core\Errors;

class NotFoundError extends APIStatusError
{
    /** @var string */
    protected const DESC = 'Dataleon Not Found Error';
}
