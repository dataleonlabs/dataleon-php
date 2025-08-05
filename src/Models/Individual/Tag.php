<?php

declare(strict_types=1);

namespace Dataleon\Models\Individual;

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
    public static function new(
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
    public function setKey(string $key): self
    {
        $this->key = $key;

        return $this;
    }

    /**
     * Indicates whether the tag is private (not visible to external users).
     */
    public function setPrivate(bool $private): self
    {
        $this->private = $private;

        return $this;
    }

    /**
     * Data type of the tag value (e.g., "string", "number", "boolean").
     */
    public function setType(string $type): self
    {
        $this->type = $type;

        return $this;
    }

    /**
     * Value assigned to the tag.
     */
    public function setValue(string $value): self
    {
        $this->value = $value;

        return $this;
    }
}
