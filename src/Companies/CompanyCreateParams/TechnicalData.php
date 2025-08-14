<?php

declare(strict_types=1);

namespace Dataleon\Companies\CompanyCreateParams;

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
    public static function with(
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
    public function withCallbackURL(string $callbackURL): self
    {
        $obj = clone $this;
        $obj->callbackURL = $callbackURL;

        return $obj;
    }

    /**
     * URL to receive notifications about the processing state and status.
     */
    public function withCallbackURLNotification(
        string $callbackURLNotification
    ): self {
        $obj = clone $this;
        $obj->callbackURLNotification = $callbackURLNotification;

        return $obj;
    }

    /**
     * Preferred language for responses or notifications (e.g., "eng", "fra").
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
