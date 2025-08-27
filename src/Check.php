<?php

declare(strict_types=1);

namespace Dataleon;

use Dataleon\Core\Attributes\Api;
use Dataleon\Core\Concerns\SdkModel;
use Dataleon\Core\Contracts\BaseModel;

/**
 * Represents a verification check result.
 *
 * @phpstan-type check_alias = array{
 *   masked?: bool|null,
 *   message?: string|null,
 *   name?: string|null,
 *   validate?: bool|null,
 *   weight?: int|null,
 * }
 */
final class Check implements BaseModel
{
    /** @use SdkModel<check_alias> */
    use SdkModel;

    /**
     * Indicates whether the result or data is masked/hidden.
     */
    #[Api(optional: true)]
    public ?bool $masked;

    /**
     * Additional message or explanation about the check result.
     */
    #[Api(optional: true)]
    public ?string $message;

    /**
     * Name or type of the check performed.
     */
    #[Api(optional: true)]
    public ?string $name;

    /**
     * Result of the check, true if passed.
     */
    #[Api(optional: true)]
    public ?bool $validate;

    /**
     * Importance or weight of the check, often used in scoring.
     */
    #[Api(optional: true)]
    public ?int $weight;

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
        ?bool $masked = null,
        ?string $message = null,
        ?string $name = null,
        ?bool $validate = null,
        ?int $weight = null,
    ): self {
        $obj = new self;

        null !== $masked && $obj->masked = $masked;
        null !== $message && $obj->message = $message;
        null !== $name && $obj->name = $name;
        null !== $validate && $obj->validate = $validate;
        null !== $weight && $obj->weight = $weight;

        return $obj;
    }

    /**
     * Indicates whether the result or data is masked/hidden.
     */
    public function withMasked(bool $masked): self
    {
        $obj = clone $this;
        $obj->masked = $masked;

        return $obj;
    }

    /**
     * Additional message or explanation about the check result.
     */
    public function withMessage(string $message): self
    {
        $obj = clone $this;
        $obj->message = $message;

        return $obj;
    }

    /**
     * Name or type of the check performed.
     */
    public function withName(string $name): self
    {
        $obj = clone $this;
        $obj->name = $name;

        return $obj;
    }

    /**
     * Result of the check, true if passed.
     */
    public function withValidate(bool $validate): self
    {
        $obj = clone $this;
        $obj->validate = $validate;

        return $obj;
    }

    /**
     * Importance or weight of the check, often used in scoring.
     */
    public function withWeight(int $weight): self
    {
        $obj = clone $this;
        $obj->weight = $weight;

        return $obj;
    }
}
