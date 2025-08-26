<?php

namespace Dataleon\Core\Errors;

class DataleonError extends \Exception
{
    /** @var string */
    protected const DESC = 'Dataleon Error';

    public function __construct(string $message, int $code = 0, ?\Throwable $previous = null)
    {
        parent::__construct($this::DESC.PHP_EOL.$message, $code, $previous);
    }
}
