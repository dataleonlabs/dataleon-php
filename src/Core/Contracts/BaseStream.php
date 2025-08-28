<?php

declare(strict_types=1);

namespace Dataleon\Core\Contracts;

use Dataleon\Core\Conversion\Contracts\Converter;
use Dataleon\Core\Conversion\Contracts\ConverterSource;
use Psr\Http\Message\RequestInterface;
use Psr\Http\Message\ResponseInterface;

/**
 * @internal
 *
 * @template TInner
 *
 * @extends \IteratorAggregate<int, TInner>
 */
interface BaseStream extends \IteratorAggregate
{
    /**
     * @param \Generator<TInner> $stream
     */
    public function __construct(
        Converter|ConverterSource|string $convert,
        RequestInterface $request,
        ResponseInterface $response,
        \Generator $stream,
    );

    /**
     * Manually force the stream to close early.
     * Iterating through will automatically close as well.
     */
    public function close(): void;
}
