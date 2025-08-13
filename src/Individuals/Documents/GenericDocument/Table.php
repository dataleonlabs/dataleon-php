<?php

declare(strict_types=1);

namespace Dataleon\Individuals\Documents\GenericDocument;

use Dataleon\Core\Attributes\Api;
use Dataleon\Core\Concerns\Model;
use Dataleon\Core\Contracts\BaseModel;
use Dataleon\Core\Conversion\ListOf;

/**
 * @phpstan-type table_alias = array{operation?: list<mixed>}
 */
final class Table implements BaseModel
{
    use Model;

    /**
     * List of operations or actions associated with the table.
     *
     * @var null|list<mixed> $operation
     */
    #[Api(type: new ListOf('mixed'), optional: true)]
    public ?array $operation;

    public function __construct()
    {
        self::introspect();
        $this->unsetOptionalProperties();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     *
     * @param null|list<mixed> $operation
     */
    public static function from(?array $operation = null): self
    {
        $obj = new self;

        null !== $operation && $obj->operation = $operation;

        return $obj;
    }

    /**
     * List of operations or actions associated with the table.
     *
     * @param list<mixed> $operation
     */
    public function setOperation(array $operation): self
    {
        $this->operation = $operation;

        return $this;
    }
}
