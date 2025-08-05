<?php

declare(strict_types=1);

namespace Dataleon\Resources\Individuals;

use Dataleon\Client;
use Dataleon\Contracts\Individuals\DocumentsContract;

final class Documents implements DocumentsContract
{
  @phpstan-ignore-next-line
  /** @param Client $client */
  function __construct(protected Client $client){}
}