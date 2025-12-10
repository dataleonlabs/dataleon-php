<?php

declare(strict_types=1);

namespace Dataleon\Companies\CompanyRegistration;

use Dataleon\Core\Attributes\Optional;
use Dataleon\Core\Concerns\SdkModel;
use Dataleon\Core\Contracts\BaseModel;

/**
 * Represents a generic property key-value pair with a specified type.
 *
 * @phpstan-type PropertyShape = array{
 *   name?: string|null, type?: string|null, value?: string|null
 * }
 */
final class Property implements BaseModel
{
    /** @use SdkModel<PropertyShape> */
    use SdkModel;

    /**
     * Name/key of the property.
     */
    #[Optional]
    public ?string $name;

    /**
     * Data type of the property value.
     */
    #[Optional]
    public ?string $type;

    /**
     * Value associated with the property name.
     */
    #[Optional]
    public ?string $value;

    public function __construct()
    {
        $this->initialize();
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
        $self = new self;

        null !== $name && $self['name'] = $name;
        null !== $type && $self['type'] = $type;
        null !== $value && $self['value'] = $value;

        return $self;
    }

    /**
     * Name/key of the property.
     */
    public function withName(string $name): self
    {
        $self = clone $this;
        $self['name'] = $name;

        return $self;
    }

    /**
     * Data type of the property value.
     */
    public function withType(string $type): self
    {
        $self = clone $this;
        $self['type'] = $type;

        return $self;
    }

    /**
     * Value associated with the property name.
     */
    public function withValue(string $value): self
    {
        $self = clone $this;
        $self['value'] = $value;

        return $self;
    }
}
