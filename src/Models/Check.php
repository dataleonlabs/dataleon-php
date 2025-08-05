<?php

declare(strict_types=1);

namespace Dataleon\Models;

use Dataleon\Core\Attributes\Api;
use Dataleon\Core\Concerns\Model;
use Dataleon\Core\Contracts\BaseModel;

/**
 * Represents a verification check result.
 *
 * @phpstan-type check_alias = array{
 *   masked?: bool, message?: string, name?: string, validate?: bool, weight?: int
 * }
 */
final class Check implements BaseModel
{
    use Model;

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
    public static function new(
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
    public function setMasked(bool $masked): self
    {
        $this->masked = $masked;

        return $this;
    }

    /**
     * Additional message or explanation about the check result.
     */
    public function setMessage(string $message): self
    {
        $this->message = $message;

        return $this;
    }

    /**
     * Name or type of the check performed.
     */
    public function setName(string $name): self
    {
        $this->name = $name;

        return $this;
    }

    /**
     * Result of the check, true if passed.
     */
    public function setValidate(bool $validate): self
    {
        $this->validate = $validate;

        return $this;
    }

    /**
     * Importance or weight of the check, often used in scoring.
     */
    public function setWeight(int $weight): self
    {
        $this->weight = $weight;

        return $this;
    }
}
