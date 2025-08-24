<?php

declare(strict_types=1);

namespace Dataleon\Individuals\Documents\GenericDocument;

use Dataleon\Core\Attributes\Api;
use Dataleon\Core\Concerns\SdkModel;
use Dataleon\Core\Contracts\BaseModel;

final class Value implements BaseModel
{
    use SdkModel;

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
     * @var list<int>|null $value
     */
    #[Api(list: 'int', optional: true)]
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
     * @param list<int> $value
     */
    public static function with(
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
    public function withConfidence(float $confidence): self
    {
        $obj = clone $this;
        $obj->confidence = $confidence;

        return $obj;
    }

    /**
     * Name or label of the extracted field.
     */
    public function withName(string $name): self
    {
        $obj = clone $this;
        $obj->name = $name;

        return $obj;
    }

    /**
     * List of integer values related to the field (e.g., bounding box coordinates).
     *
     * @param list<int> $value
     */
    public function withValue(array $value): self
    {
        $obj = clone $this;
        $obj->value = $value;

        return $obj;
    }
}
