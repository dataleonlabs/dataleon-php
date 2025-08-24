<?php

declare(strict_types=1);

namespace Dataleon\Individuals\IndividualUpdateParams;

use Dataleon\Core\Attributes\Api;
use Dataleon\Core\Concerns\SdkModel;
use Dataleon\Core\Contracts\BaseModel;

/**
 * Technical metadata related to the request or processing.
 */
final class TechnicalData implements BaseModel
{
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
     * Preferred language for communication (e.g., "eng", "fra").
     */
    #[Api(optional: true)]
    public ?string $language;

    /**
     * Flag indicating whether to include raw data in the response.
     */
    #[Api('raw_data', optional: true)]
    public ?bool $rawData;

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
        ?bool $activeAmlSuspicions = null,
        ?string $callbackURL = null,
        ?string $callbackURLNotification = null,
        ?string $language = null,
        ?bool $rawData = null,
    ): self {
        $obj = new self;

        null !== $activeAmlSuspicions && $obj->activeAmlSuspicions = $activeAmlSuspicions;
        null !== $callbackURL && $obj->callbackURL = $callbackURL;
        null !== $callbackURLNotification && $obj->callbackURLNotification = $callbackURLNotification;
        null !== $language && $obj->language = $language;
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
     * Preferred language for communication (e.g., "eng", "fra").
     */
    public function withLanguage(string $language): self
    {
        $obj = clone $this;
        $obj->language = $language;

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
