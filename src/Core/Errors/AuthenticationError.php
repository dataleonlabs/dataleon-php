<?php

namespace Dataleon\Core\Errors;

class AuthenticationError extends APIStatusError
{
    /** @var string */
    protected const DESC = 'Dataleon Authentication Error';
}
