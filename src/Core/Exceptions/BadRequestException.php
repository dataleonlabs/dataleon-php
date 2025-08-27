<?php

namespace Dataleon\Core\Exceptions;

class BadRequestException extends APIStatusException
{
    /** @var string */
    protected const DESC = 'Dataleon Bad Request Exception';
}
