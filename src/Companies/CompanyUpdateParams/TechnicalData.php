<?php

declare(strict_types=1);

namespace Dataleon\Companies\CompanyUpdateParams;

use Dataleon\Companies\CompanyUpdateParams\TechnicalData\PortalStep;
use Dataleon\Core\Attributes\Optional;
use Dataleon\Core\Concerns\SdkModel;
use Dataleon\Core\Contracts\BaseModel;

/**
 * Technical metadata and callback configuration.
 *
 * @phpstan-type TechnicalDataShape = array{
 *   active_aml_suspicions?: bool|null,
 *   callback_url?: string|null,
 *   callback_url_notification?: string|null,
 *   filtering_score_aml_suspicions?: float|null,
 *   language?: string|null,
 *   portal_steps?: list<value-of<PortalStep>>|null,
 *   raw_data?: bool|null,
 * }
 */
final class TechnicalData implements BaseModel
{
    /** @use SdkModel<TechnicalDataShape> */
    use SdkModel;

    /**
     * Flag indicating whether there are active research AML (Anti-Money Laundering) suspicions for the company when you apply for a new entry or get an existing one.
     */
    #[Optional]
    public ?bool $active_aml_suspicions;

    /**
     * URL to receive a callback once the company is processed.
     */
    #[Optional]
    public ?string $callback_url;

    /**
     * URL to receive notifications about the processing state and status.
     */
    #[Optional]
    public ?string $callback_url_notification;

    /**
     * Minimum filtering score (between 0 and 1) for AML suspicions to be considered.
     */
    #[Optional]
    public ?float $filtering_score_aml_suspicions;

    /**
     * Preferred language for responses or notifications (e.g., "eng", "fra").
     */
    #[Optional]
    public ?string $language;

    /**
     * List of steps to include in the portal workflow.
     *
     * @var list<value-of<PortalStep>>|null $portal_steps
     */
    #[Optional(list: PortalStep::class)]
    public ?array $portal_steps;

    /**
     * Flag indicating whether to include raw data in the response.
     */
    #[Optional]
    public ?bool $raw_data;

    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     *
     * @param list<PortalStep|value-of<PortalStep>> $portal_steps
     */
    public static function with(
        ?bool $active_aml_suspicions = null,
        ?string $callback_url = null,
        ?string $callback_url_notification = null,
        ?float $filtering_score_aml_suspicions = null,
        ?string $language = null,
        ?array $portal_steps = null,
        ?bool $raw_data = null,
    ): self {
        $obj = new self;

        null !== $active_aml_suspicions && $obj['active_aml_suspicions'] = $active_aml_suspicions;
        null !== $callback_url && $obj['callback_url'] = $callback_url;
        null !== $callback_url_notification && $obj['callback_url_notification'] = $callback_url_notification;
        null !== $filtering_score_aml_suspicions && $obj['filtering_score_aml_suspicions'] = $filtering_score_aml_suspicions;
        null !== $language && $obj['language'] = $language;
        null !== $portal_steps && $obj['portal_steps'] = $portal_steps;
        null !== $raw_data && $obj['raw_data'] = $raw_data;

        return $obj;
    }

    /**
     * Flag indicating whether there are active research AML (Anti-Money Laundering) suspicions for the company when you apply for a new entry or get an existing one.
     */
    public function withActiveAmlSuspicions(bool $activeAmlSuspicions): self
    {
        $obj = clone $this;
        $obj['active_aml_suspicions'] = $activeAmlSuspicions;

        return $obj;
    }

    /**
     * URL to receive a callback once the company is processed.
     */
    public function withCallbackURL(string $callbackURL): self
    {
        $obj = clone $this;
        $obj['callback_url'] = $callbackURL;

        return $obj;
    }

    /**
     * URL to receive notifications about the processing state and status.
     */
    public function withCallbackURLNotification(
        string $callbackURLNotification
    ): self {
        $obj = clone $this;
        $obj['callback_url_notification'] = $callbackURLNotification;

        return $obj;
    }

    /**
     * Minimum filtering score (between 0 and 1) for AML suspicions to be considered.
     */
    public function withFilteringScoreAmlSuspicions(
        float $filteringScoreAmlSuspicions
    ): self {
        $obj = clone $this;
        $obj['filtering_score_aml_suspicions'] = $filteringScoreAmlSuspicions;

        return $obj;
    }

    /**
     * Preferred language for responses or notifications (e.g., "eng", "fra").
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
        $obj['portal_steps'] = $portalSteps;

        return $obj;
    }

    /**
     * Flag indicating whether to include raw data in the response.
     */
    public function withRawData(bool $rawData): self
    {
        $obj = clone $this;
        $obj['raw_data'] = $rawData;

        return $obj;
    }
}
