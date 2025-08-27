<?php

namespace Dataleon\Core\Exceptions;

class InternalServerException extends APIStatusException
{
    /** @var string */
    protected const DESC = 'Dataleon Internal Server Exception';
}
