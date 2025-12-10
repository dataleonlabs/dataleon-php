<?php

declare(strict_types=1);

namespace Dataleon;

use Dataleon\Core\Attributes\Optional;
use Dataleon\Core\Concerns\SdkModel;
use Dataleon\Core\Contracts\BaseModel;

/**
 * Represents a verification check result.
 *
 * @phpstan-type CheckShape = array{
 *   masked?: bool|null,
 *   message?: string|null,
 *   name?: string|null,
 *   validate?: bool|null,
 *   weight?: int|null,
 * }
 */
final class Check implements BaseModel
{
    /** @use SdkModel<CheckShape> */
    use SdkModel;

    /**
     * Indicates whether the result or data is masked/hidden.
     */
    #[Optional]
    public ?bool $masked;

    /**
     * Additional message or explanation about the check result.
     */
    #[Optional]
    public ?string $message;

    /**
     * Name or type of the check performed.
     */
    #[Optional]
    public ?string $name;

    /**
     * Result of the check, true if passed.
     */
    #[Optional]
    public ?bool $validate;

    /**
     * Importance or weight of the check, often used in scoring.
     */
    #[Optional]
    public ?int $weight;

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
        ?bool $masked = null,
        ?string $message = null,
        ?string $name = null,
        ?bool $validate = null,
        ?int $weight = null,
    ): self {
        $self = new self;

        null !== $masked && $self['masked'] = $masked;
        null !== $message && $self['message'] = $message;
        null !== $name && $self['name'] = $name;
        null !== $validate && $self['validate'] = $validate;
        null !== $weight && $self['weight'] = $weight;

        return $self;
    }

    /**
     * Indicates whether the result or data is masked/hidden.
     */
    public function withMasked(bool $masked): self
    {
        $self = clone $this;
        $self['masked'] = $masked;

        return $self;
    }

    /**
     * Additional message or explanation about the check result.
     */
    public function withMessage(string $message): self
    {
        $self = clone $this;
        $self['message'] = $message;

        return $self;
    }

    /**
     * Name or type of the check performed.
     */
    public function withName(string $name): self
    {
        $self = clone $this;
        $self['name'] = $name;

        return $self;
    }

    /**
     * Result of the check, true if passed.
     */
    public function withValidate(bool $validate): self
    {
        $self = clone $this;
        $self['validate'] = $validate;

        return $self;
    }

    /**
     * Importance or weight of the check, often used in scoring.
     */
    public function withWeight(int $weight): self
    {
        $self = clone $this;
        $self['weight'] = $weight;

        return $self;
    }
}
