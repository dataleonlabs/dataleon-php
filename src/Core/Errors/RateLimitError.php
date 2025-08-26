<?php

namespace Dataleon\Core\Errors;

class RateLimitError extends APIStatusError
{
    /** @var string */
    protected const DESC = 'Dataleon Rate Limit Error';
}
