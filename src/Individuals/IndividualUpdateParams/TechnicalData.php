<?php

declare(strict_types=1);

namespace Dataleon\Individuals\IndividualUpdateParams;

use Dataleon\Core\Attributes\Optional;
use Dataleon\Core\Concerns\SdkModel;
use Dataleon\Core\Contracts\BaseModel;
use Dataleon\Individuals\IndividualUpdateParams\TechnicalData\PortalStep;

/**
 * Technical metadata related to the request or processing.
 *
 * @phpstan-type TechnicalDataShape = array{
 *   activeAmlSuspicions?: bool|null,
 *   callbackURL?: string|null,
 *   callbackURLNotification?: string|null,
 *   filteringScoreAmlSuspicions?: float|null,
 *   language?: string|null,
 *   portalSteps?: list<value-of<PortalStep>>|null,
 *   rawData?: bool|null,
 * }
 */
final class TechnicalData implements BaseModel
{
    /** @use SdkModel<TechnicalDataShape> */
    use SdkModel;

    /**
     * Flag indicating whether there are active research AML (Anti-Money Laundering) suspicions for the individual when you apply for a new entry or get an existing one.
     */
    #[Optional('active_aml_suspicions')]
    public ?bool $activeAmlSuspicions;

    /**
     * URL to call back upon completion of processing.
     */
    #[Optional('callback_url')]
    public ?string $callbackURL;

    /**
     * URL for receive notifications about the processing state or status.
     */
    #[Optional('callback_url_notification')]
    public ?string $callbackURLNotification;

    /**
     * Minimum filtering score (between 0 and 1) for AML suspicions to be considered.
     */
    #[Optional('filtering_score_aml_suspicions')]
    public ?float $filteringScoreAmlSuspicions;

    /**
     * Preferred language for communication (e.g., "eng", "fra").
     */
    #[Optional]
    public ?string $language;

    /**
     * List of steps to include in the portal workflow.
     *
     * @var list<value-of<PortalStep>>|null $portalSteps
     */
    #[Optional('portal_steps', list: PortalStep::class)]
    public ?array $portalSteps;

    /**
     * Flag indicating whether to include raw data in the response.
     */
    #[Optional('raw_data')]
    public ?bool $rawData;

    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     *
     * @param list<PortalStep|value-of<PortalStep>> $portalSteps
     */
    public static function with(
        ?bool $activeAmlSuspicions = null,
        ?string $callbackURL = null,
        ?string $callbackURLNotification = null,
        ?float $filteringScoreAmlSuspicions = null,
        ?string $language = null,
        ?array $portalSteps = null,
        ?bool $rawData = null,
    ): self {
        $self = new self;

        null !== $activeAmlSuspicions && $self['activeAmlSuspicions'] = $activeAmlSuspicions;
        null !== $callbackURL && $self['callbackURL'] = $callbackURL;
        null !== $callbackURLNotification && $self['callbackURLNotification'] = $callbackURLNotification;
        null !== $filteringScoreAmlSuspicions && $self['filteringScoreAmlSuspicions'] = $filteringScoreAmlSuspicions;
        null !== $language && $self['language'] = $language;
        null !== $portalSteps && $self['portalSteps'] = $portalSteps;
        null !== $rawData && $self['rawData'] = $rawData;

        return $self;
    }

    /**
     * Flag indicating whether there are active research AML (Anti-Money Laundering) suspicions for the individual when you apply for a new entry or get an existing one.
     */
    public function withActiveAmlSuspicions(bool $activeAmlSuspicions): self
    {
        $self = clone $this;
        $self['activeAmlSuspicions'] = $activeAmlSuspicions;

        return $self;
    }

    /**
     * URL to call back upon completion of processing.
     */
    public function withCallbackURL(string $callbackURL): self
    {
        $self = clone $this;
        $self['callbackURL'] = $callbackURL;

        return $self;
    }

    /**
     * URL for receive notifications about the processing state or status.
     */
    public function withCallbackURLNotification(
        string $callbackURLNotification
    ): self {
        $self = clone $this;
        $self['callbackURLNotification'] = $callbackURLNotification;

        return $self;
    }

    /**
     * Minimum filtering score (between 0 and 1) for AML suspicions to be considered.
     */
    public function withFilteringScoreAmlSuspicions(
        float $filteringScoreAmlSuspicions
    ): self {
        $self = clone $this;
        $self['filteringScoreAmlSuspicions'] = $filteringScoreAmlSuspicions;

        return $self;
    }

    /**
     * Preferred language for communication (e.g., "eng", "fra").
     */
    public function withLanguage(string $language): self
    {
        $self = clone $this;
        $self['language'] = $language;

        return $self;
    }

    /**
     * List of steps to include in the portal workflow.
     *
     * @param list<PortalStep|value-of<PortalStep>> $portalSteps
     */
    public function withPortalSteps(array $portalSteps): self
    {
        $self = clone $this;
        $self['portalSteps'] = $portalSteps;

        return $self;
    }

    /**
     * Flag indicating whether to include raw data in the response.
     */
    public function withRawData(bool $rawData): self
    {
        $self = clone $this;
        $self['rawData'] = $rawData;

        return $self;
    }
}
