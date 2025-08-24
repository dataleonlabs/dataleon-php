<?php

declare(strict_types=1);

namespace Dataleon\Individuals\Individual;

use Dataleon\Core\Attributes\Api;
use Dataleon\Core\Concerns\SdkModel;
use Dataleon\Core\Contracts\BaseModel;

/**
 * Represents a generic property key-value pair with a specified type.
 */
final class Property implements BaseModel
{
    use SdkModel;

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
    public static function with(
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
    public function withName(string $name): self
    {
        $obj = clone $this;
        $obj->name = $name;

        return $obj;
    }

    /**
     * Data type of the property value.
     */
    public function withType(string $type): self
    {
        $obj = clone $this;
        $obj->type = $type;

        return $obj;
    }

    /**
     * Value associated with the property name.
     */
    public function withValue(string $value): self
    {
        $obj = clone $this;
        $obj->value = $value;

        return $obj;
    }
}
