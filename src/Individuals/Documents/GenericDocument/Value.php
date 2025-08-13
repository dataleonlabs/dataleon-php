<?php

declare(strict_types=1);

namespace Dataleon\Individuals\Documents\GenericDocument;

use Dataleon\Core\Attributes\Api;
use Dataleon\Core\Concerns\Model;
use Dataleon\Core\Contracts\BaseModel;
use Dataleon\Core\Conversion\ListOf;

/**
 * @phpstan-type value_alias = array{
 *   confidence?: float, name?: string, value?: list<int>
 * }
 */
final class Value implements BaseModel
{
    use Model;

    /**
     * Confidence score (between 0 and 1) for the extracted value.
     */
    #[Api(optional: true)]
    public ?float $confidence;

    /**
     * Name or label of the extracted field.
     */
    #[Api(optional: true)]
    public ?string $name;

    /**
     * List of integer values related to the field (e.g., bounding box coordinates).
     *
     * @var null|list<int> $value
     */
    #[Api(type: new ListOf('int'), optional: true)]
    public ?array $value;

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
     * @param null|list<int> $value
     */
    public static function from(
        ?float $confidence = null,
        ?string $name = null,
        ?array $value = null
    ): self {
        $obj = new self;

        null !== $confidence && $obj->confidence = $confidence;
        null !== $name && $obj->name = $name;
        null !== $value && $obj->value = $value;

        return $obj;
    }

    /**
     * Confidence score (between 0 and 1) for the extracted value.
     */
    public function setConfidence(float $confidence): self
    {
        $this->confidence = $confidence;

        return $this;
    }

    /**
     * Name or label of the extracted field.
     */
    public function setName(string $name): self
    {
        $this->name = $name;

        return $this;
    }

    /**
     * List of integer values related to the field (e.g., bounding box coordinates).
     *
     * @param list<int> $value
     */
    public function setValue(array $value): self
    {
        $this->value = $value;

        return $this;
    }
}
