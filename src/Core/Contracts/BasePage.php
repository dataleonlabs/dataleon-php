<?php

declare(strict_types=1);

namespace Dataleon\Core\Contracts;

use Dataleon\Core\BaseClient;
use Dataleon\Core\Pagination\PageRequestOptions;
use Psr\Http\Message\ResponseInterface;

/**
 * @internal
 */
interface BasePage
{
    public function __construct(
        BaseClient $client,
        PageRequestOptions $options,
        ResponseInterface $response,
        mixed $body,
    );
}
