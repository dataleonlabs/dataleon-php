<?php

declare(strict_types=1);

namespace Dataleon\Individuals\Documents\GenericDocument;

use Dataleon\Core\Attributes\Optional;
use Dataleon\Core\Concerns\SdkModel;
use Dataleon\Core\Contracts\BaseModel;

/**
 * @phpstan-type ValueShape = array{
 *   confidence?: float|null, name?: string|null, value?: list<int>|null
 * }
 */
final class Value implements BaseModel
{
    /** @use SdkModel<ValueShape> */
    use SdkModel;

    /**
     * Confidence score (between 0 and 1) for the extracted value.
     */
    #[Optional]
    public ?float $confidence;

    /**
     * Name or label of the extracted field.
     */
    #[Optional]
    public ?string $name;

    /**
     * List of integer values related to the field (e.g., bounding box coordinates).
     *
     * @var list<int>|null $value
     */
    #[Optional(list: 'int')]
    public ?array $value;

    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     *
     * @param list<int>|null $value
     */
    public static function with(
        ?float $confidence = null,
        ?string $name = null,
        ?array $value = null
    ): self {
        $self = new self;

        null !== $confidence && $self['confidence'] = $confidence;
        null !== $name && $self['name'] = $name;
        null !== $value && $self['value'] = $value;

        return $self;
    }

    /**
     * Confidence score (between 0 and 1) for the extracted value.
     */
    public function withConfidence(float $confidence): self
    {
        $self = clone $this;
        $self['confidence'] = $confidence;

        return $self;
    }

    /**
     * Name or label of the extracted field.
     */
    public function withName(string $name): self
    {
        $self = clone $this;
        $self['name'] = $name;

        return $self;
    }

    /**
     * List of integer values related to the field (e.g., bounding box coordinates).
     *
     * @param list<int> $value
     */
    public function withValue(array $value): self
    {
        $self = clone $this;
        $self['value'] = $value;

        return $self;
    }
}
