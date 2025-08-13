<?php

declare(strict_types=1);

namespace Dataleon\Individuals\IndividualUpdateParams;

use Dataleon\Core\Attributes\Api;
use Dataleon\Core\Concerns\Model;
use Dataleon\Core\Contracts\BaseModel;

/**
 * Technical metadata related to the request or processing.
 *
 * @phpstan-type technical_data_alias = array{
 *   callbackURL?: string,
 *   callbackURLNotification?: string,
 *   language?: string,
 *   rawData?: bool,
 * }
 */
final class TechnicalData implements BaseModel
{
    use Model;

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
    public static function from(
        ?string $callbackURL = null,
        ?string $callbackURLNotification = null,
        ?string $language = null,
        ?bool $rawData = null,
    ): self {
        $obj = new self;

        null !== $callbackURL && $obj->callbackURL = $callbackURL;
        null !== $callbackURLNotification && $obj->callbackURLNotification = $callbackURLNotification;
        null !== $language && $obj->language = $language;
        null !== $rawData && $obj->rawData = $rawData;

        return $obj;
    }

    /**
     * URL to call back upon completion of processing.
     */
    public function setCallbackURL(string $callbackURL): self
    {
        $this->callbackURL = $callbackURL;

        return $this;
    }

    /**
     * URL for receive notifications about the processing state or status.
     */
    public function setCallbackURLNotification(
        string $callbackURLNotification
    ): self {
        $this->callbackURLNotification = $callbackURLNotification;

        return $this;
    }

    /**
     * Preferred language for communication (e.g., "eng", "fra").
     */
    public function setLanguage(string $language): self
    {
        $this->language = $language;

        return $this;
    }

    /**
     * Flag indicating whether to include raw data in the response.
     */
    public function setRawData(bool $rawData): self
    {
        $this->rawData = $rawData;

        return $this;
    }
}
