<?php

declare(strict_types=1);

namespace Dataleon\Individuals\Documents\GenericDocument;

use Dataleon\Core\Attributes\Api;
use Dataleon\Core\Concerns\SdkModel;
use Dataleon\Core\Contracts\BaseModel;

final class Table implements BaseModel
{
    use SdkModel;

    /**
     * List of operations or actions associated with the table.
     *
     * @var list<mixed>|null $operation
     */
    #[Api(list: 'mixed', optional: true)]
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
     * @param list<mixed> $operation
     */
    public static function with(?array $operation = null): self
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
    public function withOperation(array $operation): self
    {
        $obj = clone $this;
        $obj->operation = $operation;

        return $obj;
    }
}
