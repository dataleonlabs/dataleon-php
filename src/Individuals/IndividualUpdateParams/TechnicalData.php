<?php

declare(strict_types=1);

namespace Dataleon\Individuals\IndividualUpdateParams;

use Dataleon\Core\Attributes\Api;
use Dataleon\Core\Concerns\SdkModel;
use Dataleon\Core\Contracts\BaseModel;
use Dataleon\Individuals\IndividualUpdateParams\TechnicalData\PortalStep;

/**
 * Technical metadata related to the request or processing.
 *
 * @phpstan-type technical_data = array{
 *   activeAmlSuspicions?: bool,
 *   callbackURL?: string,
 *   callbackURLNotification?: string,
 *   filteringScoreAmlSuspicions?: float,
 *   language?: string,
 *   portalSteps?: list<value-of<PortalStep>>,
 *   rawData?: bool,
 * }
 */
final class TechnicalData implements BaseModel
{
    /** @use SdkModel<technical_data> */
    use SdkModel;

    /**
     * Flag indicating whether there are active research AML (Anti-Money Laundering) suspicions for the individual when you apply for a new entry or get an existing one.
     */
    #[Api('active_aml_suspicions', optional: true)]
    public ?bool $activeAmlSuspicions;

    /**
     * URL to call back upon completion of processing.
     */
    #[Api('callback_url', optional: true)]
    public ?string $callbackURL;

    /**
     * URL for receive notifications about the processing state or status.
     */
    #[Api('callback_url_notification', optional: true)]
    public ?string $callbackURLNotification;

    /**
     * Minimum filtering score (between 0 and 1) for AML suspicions to be considered.
     */
    #[Api('filtering_score_aml_suspicions', optional: true)]
    public ?float $filteringScoreAmlSuspicions;

    /**
     * Preferred language for communication (e.g., "eng", "fra").
     */
    #[Api(optional: true)]
    public ?string $language;

    /**
     * List of steps to include in the portal workflow.
     *
     * @var list<value-of<PortalStep>>|null $portalSteps
     */
    #[Api('portal_steps', list: PortalStep::class, optional: true)]
    public ?array $portalSteps;

    /**
     * Flag indicating whether to include raw data in the response.
     */
    #[Api('raw_data', optional: true)]
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

        null !== $activeAmlSuspicions && $obj->activeAmlSuspicions = $activeAmlSuspicions;
        null !== $callbackURL && $obj->callbackURL = $callbackURL;
        null !== $callbackURLNotification && $obj->callbackURLNotification = $callbackURLNotification;
        null !== $filteringScoreAmlSuspicions && $obj->filteringScoreAmlSuspicions = $filteringScoreAmlSuspicions;
        null !== $language && $obj->language = $language;
        null !== $portalSteps && $obj['portalSteps'] = $portalSteps;
        null !== $rawData && $obj->rawData = $rawData;

        return $obj;
    }

    /**
     * Flag indicating whether there are active research AML (Anti-Money Laundering) suspicions for the individual when you apply for a new entry or get an existing one.
     */
    public function withActiveAmlSuspicions(bool $activeAmlSuspicions): self
    {
        $obj = clone $this;
        $obj->activeAmlSuspicions = $activeAmlSuspicions;

        return $obj;
    }

    /**
     * URL to call back upon completion of processing.
     */
    public function withCallbackURL(string $callbackURL): self
    {
        $obj = clone $this;
        $obj->callbackURL = $callbackURL;

        return $obj;
    }

    /**
     * URL for receive notifications about the processing state or status.
     */
    public function withCallbackURLNotification(
        string $callbackURLNotification
    ): self {
        $obj = clone $this;
        $obj->callbackURLNotification = $callbackURLNotification;

        return $obj;
    }

    /**
     * Minimum filtering score (between 0 and 1) for AML suspicions to be considered.
     */
    public function withFilteringScoreAmlSuspicions(
        float $filteringScoreAmlSuspicions
    ): self {
        $obj = clone $this;
        $obj->filteringScoreAmlSuspicions = $filteringScoreAmlSuspicions;

        return $obj;
    }

    /**
     * Preferred language for communication (e.g., "eng", "fra").
     */
    public function withLanguage(string $language): self
    {
        $obj = clone $this;
        $obj->language = $language;

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
        $obj->rawData = $rawData;

        return $obj;
    }
}
