<?php

namespace Dataleon\Core\Exceptions;

class AuthenticationException extends APIStatusException
{
    /** @var string */
    protected const DESC = 'Dataleon Authentication Exception';
}
