<?php

namespace Dataleon\Core\Errors;

class PermissionDeniedError extends APIStatusError
{
    /** @var string */
    protected const DESC = 'Dataleon Permission Denied Error';
}
