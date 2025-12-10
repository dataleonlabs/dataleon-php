<?php

declare(strict_types=1);

namespace Dataleon\Companies\CompanyRegistration;

use Dataleon\Core\Attributes\Optional;
use Dataleon\Core\Concerns\SdkModel;
use Dataleon\Core\Contracts\BaseModel;

/**
 * Risk assessment associated with the company, including a risk code, reason, and confidence score.
 *
 * @phpstan-type RiskShape = array{
 *   code?: string|null, reason?: string|null, score?: float|null
 * }
 */
final class Risk implements BaseModel
{
    /** @use SdkModel<RiskShape> */
    use SdkModel;

    /**
     * Risk category or code identifier.
     */
    #[Optional]
    public ?string $code;

    /**
     * Explanation or justification for the assigned risk.
     */
    #[Optional]
    public ?string $reason;

    /**
     * Numeric risk score between 0.0 and 1.0 indicating severity or confidence.
     */
    #[Optional]
    public ?float $score;

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
        ?string $code = null,
        ?string $reason = null,
        ?float $score = null
    ): self {
        $self = new self;

        null !== $code && $self['code'] = $code;
        null !== $reason && $self['reason'] = $reason;
        null !== $score && $self['score'] = $score;

        return $self;
    }

    /**
     * Risk category or code identifier.
     */
    public function withCode(string $code): self
    {
        $self = clone $this;
        $self['code'] = $code;

        return $self;
    }

    /**
     * Explanation or justification for the assigned risk.
     */
    public function withReason(string $reason): self
    {
        $self = clone $this;
        $self['reason'] = $reason;

        return $self;
    }

    /**
     * Numeric risk score between 0.0 and 1.0 indicating severity or confidence.
     */
    public function withScore(float $score): self
    {
        $self = clone $this;
        $self['score'] = $score;

        return $self;
    }
}
