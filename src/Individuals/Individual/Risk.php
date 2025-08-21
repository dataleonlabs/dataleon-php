<?php

declare(strict_types=1);

namespace Dataleon\Individuals\Individual;

use Dataleon\Core\Attributes\Api;
use Dataleon\Core\Concerns\SdkModel;
use Dataleon\Core\Contracts\BaseModel;

/**
 * Risk assessment associated with the individual.
 *
 * @phpstan-type risk_alias = array{code?: string, reason?: string, score?: float}
 */
final class Risk implements BaseModel
{
    use SdkModel;

    /**
     * Risk category or code identifier.
     */
    #[Api(optional: true)]
    public ?string $code;

    /**
     * Explanation or justification for the assigned risk.
     */
    #[Api(optional: true)]
    public ?string $reason;

    /**
     * Numeric risk score between 0.0 and 1.0 indicating severity or confidence.
     */
    #[Api(optional: true)]
    public ?float $score;

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
        ?string $code = null,
        ?string $reason = null,
        ?float $score = null
    ): self {
        $obj = new self;

        null !== $code && $obj->code = $code;
        null !== $reason && $obj->reason = $reason;
        null !== $score && $obj->score = $score;

        return $obj;
    }

    /**
     * Risk category or code identifier.
     */
    public function withCode(string $code): self
    {
        $obj = clone $this;
        $obj->code = $code;

        return $obj;
    }

    /**
     * Explanation or justification for the assigned risk.
     */
    public function withReason(string $reason): self
    {
        $obj = clone $this;
        $obj->reason = $reason;

        return $obj;
    }

    /**
     * Numeric risk score between 0.0 and 1.0 indicating severity or confidence.
     */
    public function withScore(float $score): self
    {
        $obj = clone $this;
        $obj->score = $score;

        return $obj;
    }
}
