<?php

namespace Dataleon\Core\Exceptions;

class PermissionDeniedException extends APIStatusException
{
    /** @var string */
    protected const DESC = 'Dataleon Permission Denied Exception';
}
