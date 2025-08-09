<?php

declare(strict_types=1);

namespace Dataleon\Models\CompanyUpdateParams;

use Dataleon\Core\Attributes\Api;
use Dataleon\Core\Concerns\Model;
use Dataleon\Core\Contracts\BaseModel;

/**
 * Technical metadata and callback configuration.
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
     * URL to receive a callback once the company is processed.
     */
    #[Api('callback_url', optional: true)]
    public ?string $callbackURL;

    /**
     * URL to receive notifications about the processing state and status.
     */
    #[Api('callback_url_notification', optional: true)]
    public ?string $callbackURLNotification;

    /**
     * Preferred language for responses or notifications (e.g., "eng", "fra").
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
    public static function new(
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
     * URL to receive a callback once the company is processed.
     */
    public function setCallbackURL(string $callbackURL): self
    {
        $this->callbackURL = $callbackURL;

        return $this;
    }

    /**
     * URL to receive notifications about the processing state and status.
     */
    public function setCallbackURLNotification(
        string $callbackURLNotification
    ): self {
        $this->callbackURLNotification = $callbackURLNotification;

        return $this;
    }

    /**
     * Preferred language for responses or notifications (e.g., "eng", "fra").
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
