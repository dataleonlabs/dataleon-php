<?php

namespace Dataleon\Core\Exceptions;

class RateLimitException extends APIStatusException
{
    /** @var string */
    protected const DESC = 'Dataleon Rate Limit Exception';
}
