<?php

declare(strict_types=1);

namespace Dataleon\Individuals\Documents\GenericDocument;

use Dataleon\Core\Attributes\Optional;
use Dataleon\Core\Concerns\SdkModel;
use Dataleon\Core\Contracts\BaseModel;

/**
 * @phpstan-type TableShape = array{operation?: list<mixed>|null}
 */
final class Table implements BaseModel
{
    /** @use SdkModel<TableShape> */
    use SdkModel;

    /**
     * List of operations or actions associated with the table.
     *
     * @var list<mixed>|null $operation
     */
    #[Optional(list: 'mixed')]
    public ?array $operation;

    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     *
     * @param list<mixed> $operation
     */
    public static function with(?array $operation = null): self
    {
        $self = new self;

        null !== $operation && $self['operation'] = $operation;

        return $self;
    }

    /**
     * List of operations or actions associated with the table.
     *
     * @param list<mixed> $operation
     */
    public function withOperation(array $operation): self
    {
        $self = clone $this;
        $self['operation'] = $operation;

        return $self;
    }
}
