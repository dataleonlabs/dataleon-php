<?php

namespace Dataleon\Core\Exceptions;

class UnprocessableEntityException extends APIStatusException
{
    /** @var string */
    protected const DESC = 'Dataleon Unprocessable Entity Exception';
}
