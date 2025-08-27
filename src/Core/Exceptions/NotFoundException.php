<?php

namespace Dataleon\Core\Exceptions;

class NotFoundException extends APIStatusException
{
    /** @var string */
    protected const DESC = 'Dataleon Not Found Exception';
}
