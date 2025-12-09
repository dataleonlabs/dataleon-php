<?php

declare(strict_types=1);

namespace Dataleon\Individuals\IndividualCreateParams;

use Dataleon\Core\Attributes\Optional;
use Dataleon\Core\Concerns\SdkModel;
use Dataleon\Core\Contracts\BaseModel;
use Dataleon\Individuals\IndividualCreateParams\TechnicalData\PortalStep;

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
        $obj = new self;

        null !== $activeAmlSuspicions && $obj['activeAmlSuspicions'] = $activeAmlSuspicions;
        null !== $callbackURL && $obj['callbackURL'] = $callbackURL;
        null !== $callbackURLNotification && $obj['callbackURLNotification'] = $callbackURLNotification;
        null !== $filteringScoreAmlSuspicions && $obj['filteringScoreAmlSuspicions'] = $filteringScoreAmlSuspicions;
        null !== $language && $obj['language'] = $language;
        null !== $portalSteps && $obj['portalSteps'] = $portalSteps;
        null !== $rawData && $obj['rawData'] = $rawData;

        return $obj;
    }

    /**
     * Flag indicating whether there are active research AML (Anti-Money Laundering) suspicions for the individual when you apply for a new entry or get an existing one.
     */
    public function withActiveAmlSuspicions(bool $activeAmlSuspicions): self
    {
        $obj = clone $this;
        $obj['activeAmlSuspicions'] = $activeAmlSuspicions;

        return $obj;
    }

    /**
     * URL to call back upon completion of processing.
     */
    public function withCallbackURL(string $callbackURL): self
    {
        $obj = clone $this;
        $obj['callbackURL'] = $callbackURL;

        return $obj;
    }

    /**
     * URL for receive notifications about the processing state or status.
     */
    public function withCallbackURLNotification(
        string $callbackURLNotification
    ): self {
        $obj = clone $this;
        $obj['callbackURLNotification'] = $callbackURLNotification;

        return $obj;
    }

    /**
     * Minimum filtering score (between 0 and 1) for AML suspicions to be considered.
     */
    public function withFilteringScoreAmlSuspicions(
        float $filteringScoreAmlSuspicions
    ): self {
        $obj = clone $this;
        $obj['filteringScoreAmlSuspicions'] = $filteringScoreAmlSuspicions;

        return $obj;
    }

    /**
     * Preferred language for communication (e.g., "eng", "fra").
     */
    public function withLanguage(string $language): self
    {
        $obj = clone $this;
        $obj['language'] = $language;

        return $obj;
    }

    /**
     * List of steps to include in the portal workflow.
     *
     * @param list<PortalStep|value-of<PortalStep>> $portalSteps
     */
    public function withPortalSteps(array $portalSteps): self
    {
        $obj = clone $this;
        $obj['portalSteps'] = $portalSteps;

        return $obj;
    }

    /**
     * Flag indicating whether to include raw data in the response.
     */
    public function withRawData(bool $rawData): self
    {
        $obj = clone $this;
        $obj['rawData'] = $rawData;

        return $obj;
    }
}
