<?php

declare(strict_types=1);

namespace Dataleon\Models\Individual;

use Dataleon\Core\Attributes\Api;
use Dataleon\Core\Concerns\Model;
use Dataleon\Core\Contracts\BaseModel;

/**
 * Represents a generic property key-value pair with a specified type.
 *
 * @phpstan-type property_alias = array{
 *   name?: string, type?: string, value?: string
 * }
 */
final class Property implements BaseModel
{
    use Model;

    /**
     * Name/key of the property.
     */
    #[Api(optional: true)]
    public ?string $name;

    /**
     * Data type of the property value.
     */
    #[Api(optional: true)]
    public ?string $type;

    /**
     * Value associated with the property name.
     */
    #[Api(optional: true)]
    public ?string $value;

    public function __construct()
    {
        self::introspect();
        $this->unsetOptionalProperties();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     */
    public static function new(
        ?string $name = null,
        ?string $type = null,
        ?string $value = null
    ): self {
        $obj = new self;

        null !== $name && $obj->name = $name;
        null !== $type && $obj->type = $type;
        null !== $value && $obj->value = $value;

        return $obj;
    }

    /**
     * Name/key of the property.
     */
    public function setName(string $name): self
    {
        $this->name = $name;

        return $this;
    }

    /**
     * Data type of the property value.
     */
    public function setType(string $type): self
    {
        $this->type = $type;

        return $this;
    }

    /**
     * Value associated with the property name.
     */
    public function setValue(string $value): self
    {
        $this->value = $value;

        return $this;
    }
}
