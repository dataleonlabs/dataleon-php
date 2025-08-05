<?php

declare(strict_types=1);

namespace Dataleon\Models\CompanyRegistration;

use Dataleon\Core\Attributes\Api;
use Dataleon\Core\Concerns\Model;
use Dataleon\Core\Contracts\BaseModel;

/**
 * Risk assessment associated with the company, including a risk code, reason, and confidence score.
 *
 * @phpstan-type risk_alias = array{code?: string, reason?: string, score?: float}
 */
final class Risk implements BaseModel
{
    use Model;

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
    public static function new(
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
    public function setCode(string $code): self
    {
        $this->code = $code;

        return $this;
    }

    /**
     * Explanation or justification for the assigned risk.
     */
    public function setReason(string $reason): self
    {
        $this->reason = $reason;

        return $this;
    }

    /**
     * Numeric risk score between 0.0 and 1.0 indicating severity or confidence.
     */
    public function setScore(float $score): self
    {
        $this->score = $score;

        return $this;
    }
}
