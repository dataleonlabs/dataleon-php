<?php

declare(strict_types=1);

namespace Dataleon\Individuals\Individual;

use Dataleon\Core\Attributes\Api;
use Dataleon\Core\Concerns\Model;
use Dataleon\Core\Contracts\BaseModel;

/**
 * Represents a key-value metadata tag that can be associated with entities such as individuals or companies.
 *
 * @phpstan-type tag_alias = array{
 *   key?: string, private?: bool, type?: string, value?: string
 * }
 */
final class Tag implements BaseModel
{
    use Model;

    /**
     * Name of the tag used to identify the metadata field.
     */
    #[Api(optional: true)]
    public ?string $key;

    /**
     * Indicates whether the tag is private (not visible to external users).
     */
    #[Api(optional: true)]
    public ?bool $private;

    /**
     * Data type of the tag value (e.g., "string", "number", "boolean").
     */
    #[Api(optional: true)]
    public ?string $type;

    /**
     * Value assigned to the tag.
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
        ?string $key = null,
        ?bool $private = null,
        ?string $type = null,
        ?string $value = null,
    ): self {
        $obj = new self;

        null !== $key && $obj->key = $key;
        null !== $private && $obj->private = $private;
        null !== $type && $obj->type = $type;
        null !== $value && $obj->value = $value;

        return $obj;
    }

    /**
     * Name of the tag used to identify the metadata field.
     */
    public function withKey(string $key): self
    {
        $obj = clone $this;
        $obj->key = $key;

        return $obj;
    }

    /**
     * Indicates whether the tag is private (not visible to external users).
     */
    public function withPrivate(bool $private): self
    {
        $obj = clone $this;
        $obj->private = $private;

        return $obj;
    }

    /**
     * Data type of the tag value (e.g., "string", "number", "boolean").
     */
    public function withType(string $type): self
    {
        $obj = clone $this;
        $obj->type = $type;

        return $obj;
    }

    /**
     * Value assigned to the tag.
     */
    public function withValue(string $value): self
    {
        $obj = clone $this;
        $obj->value = $value;

        return $obj;
    }
}
