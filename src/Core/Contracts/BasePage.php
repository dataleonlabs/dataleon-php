<?php

declare(strict_types=1);

namespace Dataleon\Core\Contracts;

use Dataleon\Client;
use Dataleon\Core\Conversion\Contracts\Converter;
use Dataleon\Core\Conversion\Contracts\ConverterSource;
use Dataleon\RequestOptions;

/**
 * @template Item
 *
 * @extends \IteratorAggregate<int, static>
 */
interface BasePage extends \IteratorAggregate
{
    /**
     * @internal
     *
     * @param array<string, mixed> $request
     */
    public function __construct(
        Converter|ConverterSource|string $convert,
        Client $client,
        array $request,
        RequestOptions $options,
        mixed $data,
    );

    public function hasNextPage(): bool;

    /**
     * @return list<Item>
     */
    public function getPaginatedItems(): array;

    /**
     * @return static<Item>
     */
    public function getNextPage(): static;
}
