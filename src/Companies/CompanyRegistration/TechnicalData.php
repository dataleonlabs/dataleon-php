<?php

declare(strict_types=1);

namespace Dataleon\Companies\CompanyRegistration;

use Dataleon\Core\Attributes\Api;
use Dataleon\Core\Concerns\SdkModel;
use Dataleon\Core\Contracts\BaseModel;

/**
 * Technical metadata related to the request, such as IP address, QR code settings, and callback URLs.
 */
final class TechnicalData implements BaseModel
{
    use SdkModel;

    /**
     * Flag indicating whether there are active research AML (Anti-Money Laundering) suspicions for the object when you apply for a new entry or get an existing one.
     */
    #[Api('active_aml_suspicions', optional: true)]
    public ?bool $activeAmlSuspicions;

    /**
     * Version number of the API used.
     */
    #[Api('api_version', optional: true)]
    public ?int $apiVersion;

    /**
     * Timestamp when the request or process was approved.
     */
    #[Api('approved_at', optional: true)]
    public ?\DateTimeInterface $approvedAt;

    /**
     * URL to receive callback data from the AML system.
     */
    #[Api('callback_url', optional: true)]
    public ?string $callbackURL;

    /**
     * URL to receive notification updates about the processing status.
     */
    #[Api('callback_url_notification', optional: true)]
    public ?string $callbackURLNotification;

    /**
     * Flag to indicate if notifications are disabled.
     */
    #[Api('disable_notification', optional: true)]
    public ?bool $disableNotification;

    /**
     * Timestamp when notifications were disabled; null if never disabled.
     */
    #[Api('disable_notification_date', optional: true)]
    public ?\DateTimeInterface $disableNotificationDate;

    /**
     * Export format defined by the API (e.g., "json", "xml").
     */
    #[Api('export_type', optional: true)]
    public ?string $exportType;

    /**
     * Timestamp when the process finished.
     */
    #[Api('finished_at', optional: true)]
    public ?\DateTimeInterface $finishedAt;

    /**
     * IP address of the our system handling the request.
     */
    #[Api(optional: true)]
    public ?string $ip;

    /**
     * Language preference used in the client workspace (e.g., "fra").
     */
    #[Api(optional: true)]
    public ?string $language;

    /**
     * IP address of the end client (final user) captured.
     */
    #[Api('location_ip', optional: true)]
    public ?string $locationIP;

    /**
     * Timestamp indicating when the request or process needs review; null if none.
     */
    #[Api('need_review_at', optional: true)]
    public ?\DateTimeInterface $needReviewAt;

    /**
     * Flag indicating if notification confirmation is required or received.
     */
    #[Api('notification_confirmation', optional: true)]
    public ?bool $notificationConfirmation;

    /**
     * Indicates whether QR code is enabled ("true" or "false").
     */
    #[Api('qr_code', optional: true)]
    public ?string $qrCode;

    /**
     * Flag indicating whether to include raw data in the response.
     */
    #[Api('raw_data', optional: true)]
    public ?bool $rawData;

    /**
     * Timestamp when the request or process was rejected; null if not rejected.
     */
    #[Api('rejected_at', optional: true)]
    public ?\DateTimeInterface $rejectedAt;

    /**
     * Duration of the user session in seconds.
     */
    #[Api('session_duration', optional: true)]
    public ?int $sessionDuration;

    /**
     * Timestamp when the process started.
     */
    #[Api('started_at', optional: true)]
    public ?\DateTimeInterface $startedAt;

    /**
     * Date/time of data transfer.
     */
    #[Api('transfer_at', optional: true)]
    public ?\DateTimeInterface $transferAt;

    /**
     * Mode of data transfer.
     */
    #[Api('transfer_mode', optional: true)]
    public ?string $transferMode;

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
        ?int $apiVersion = null,
        ?\DateTimeInterface $approvedAt = null,
        ?string $callbackURL = null,
        ?string $callbackURLNotification = null,
        ?bool $disableNotification = null,
        ?\DateTimeInterface $disableNotificationDate = null,
        ?string $exportType = null,
        ?\DateTimeInterface $finishedAt = null,
        ?string $ip = null,
        ?string $language = null,
        ?string $locationIP = null,
        ?\DateTimeInterface $needReviewAt = null,
        ?bool $notificationConfirmation = null,
        ?string $qrCode = null,
        ?bool $rawData = null,
        ?\DateTimeInterface $rejectedAt = null,
        ?int $sessionDuration = null,
        ?\DateTimeInterface $startedAt = null,
        ?\DateTimeInterface $transferAt = null,
        ?string $transferMode = null,
    ): self {
        $obj = new self;

        null !== $activeAmlSuspicions && $obj->activeAmlSuspicions = $activeAmlSuspicions;
        null !== $apiVersion && $obj->apiVersion = $apiVersion;
        null !== $approvedAt && $obj->approvedAt = $approvedAt;
        null !== $callbackURL && $obj->callbackURL = $callbackURL;
        null !== $callbackURLNotification && $obj->callbackURLNotification = $callbackURLNotification;
        null !== $disableNotification && $obj->disableNotification = $disableNotification;
        null !== $disableNotificationDate && $obj->disableNotificationDate = $disableNotificationDate;
        null !== $exportType && $obj->exportType = $exportType;
        null !== $finishedAt && $obj->finishedAt = $finishedAt;
        null !== $ip && $obj->ip = $ip;
        null !== $language && $obj->language = $language;
        null !== $locationIP && $obj->locationIP = $locationIP;
        null !== $needReviewAt && $obj->needReviewAt = $needReviewAt;
        null !== $notificationConfirmation && $obj->notificationConfirmation = $notificationConfirmation;
        null !== $qrCode && $obj->qrCode = $qrCode;
        null !== $rawData && $obj->rawData = $rawData;
        null !== $rejectedAt && $obj->rejectedAt = $rejectedAt;
        null !== $sessionDuration && $obj->sessionDuration = $sessionDuration;
        null !== $startedAt && $obj->startedAt = $startedAt;
        null !== $transferAt && $obj->transferAt = $transferAt;
        null !== $transferMode && $obj->transferMode = $transferMode;

        return $obj;
    }

    /**
     * Flag indicating whether there are active research AML (Anti-Money Laundering) suspicions for the object when you apply for a new entry or get an existing one.
     */
    public function withActiveAmlSuspicions(bool $activeAmlSuspicions): self
    {
        $obj = clone $this;
        $obj->activeAmlSuspicions = $activeAmlSuspicions;

        return $obj;
    }

    /**
     * Version number of the API used.
     */
    public function withAPIVersion(int $apiVersion): self
    {
        $obj = clone $this;
        $obj->apiVersion = $apiVersion;

        return $obj;
    }

    /**
     * Timestamp when the request or process was approved.
     */
    public function withApprovedAt(\DateTimeInterface $approvedAt): self
    {
        $obj = clone $this;
        $obj->approvedAt = $approvedAt;

        return $obj;
    }

    /**
     * URL to receive callback data from the AML system.
     */
    public function withCallbackURL(string $callbackURL): self
    {
        $obj = clone $this;
        $obj->callbackURL = $callbackURL;

        return $obj;
    }

    /**
     * URL to receive notification updates about the processing status.
     */
    public function withCallbackURLNotification(
        string $callbackURLNotification
    ): self {
        $obj = clone $this;
        $obj->callbackURLNotification = $callbackURLNotification;

        return $obj;
    }

    /**
     * Flag to indicate if notifications are disabled.
     */
    public function withDisableNotification(bool $disableNotification): self
    {
        $obj = clone $this;
        $obj->disableNotification = $disableNotification;

        return $obj;
    }

    /**
     * Timestamp when notifications were disabled; null if never disabled.
     */
    public function withDisableNotificationDate(
        ?\DateTimeInterface $disableNotificationDate
    ): self {
        $obj = clone $this;
        $obj->disableNotificationDate = $disableNotificationDate;

        return $obj;
    }

    /**
     * Export format defined by the API (e.g., "json", "xml").
     */
    public function withExportType(string $exportType): self
    {
        $obj = clone $this;
        $obj->exportType = $exportType;

        return $obj;
    }

    /**
     * Timestamp when the process finished.
     */
    public function withFinishedAt(\DateTimeInterface $finishedAt): self
    {
        $obj = clone $this;
        $obj->finishedAt = $finishedAt;

        return $obj;
    }

    /**
     * IP address of the our system handling the request.
     */
    public function withIP(string $ip): self
    {
        $obj = clone $this;
        $obj->ip = $ip;

        return $obj;
    }

    /**
     * Language preference used in the client workspace (e.g., "fra").
     */
    public function withLanguage(string $language): self
    {
        $obj = clone $this;
        $obj->language = $language;

        return $obj;
    }

    /**
     * IP address of the end client (final user) captured.
     */
    public function withLocationIP(string $locationIP): self
    {
        $obj = clone $this;
        $obj->locationIP = $locationIP;

        return $obj;
    }

    /**
     * Timestamp indicating when the request or process needs review; null if none.
     */
    public function withNeedReviewAt(?\DateTimeInterface $needReviewAt): self
    {
        $obj = clone $this;
        $obj->needReviewAt = $needReviewAt;

        return $obj;
    }

    /**
     * Flag indicating if notification confirmation is required or received.
     */
    public function withNotificationConfirmation(
        bool $notificationConfirmation
    ): self {
        $obj = clone $this;
        $obj->notificationConfirmation = $notificationConfirmation;

        return $obj;
    }

    /**
     * Indicates whether QR code is enabled ("true" or "false").
     */
    public function withQrCode(string $qrCode): self
    {
        $obj = clone $this;
        $obj->qrCode = $qrCode;

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

    /**
     * Timestamp when the request or process was rejected; null if not rejected.
     */
    public function withRejectedAt(?\DateTimeInterface $rejectedAt): self
    {
        $obj = clone $this;
        $obj->rejectedAt = $rejectedAt;

        return $obj;
    }

    /**
     * Duration of the user session in seconds.
     */
    public function withSessionDuration(int $sessionDuration): self
    {
        $obj = clone $this;
        $obj->sessionDuration = $sessionDuration;

        return $obj;
    }

    /**
     * Timestamp when the process started.
     */
    public function withStartedAt(\DateTimeInterface $startedAt): self
    {
        $obj = clone $this;
        $obj->startedAt = $startedAt;

        return $obj;
    }

    /**
     * Date/time of data transfer.
     */
    public function withTransferAt(\DateTimeInterface $transferAt): self
    {
        $obj = clone $this;
        $obj->transferAt = $transferAt;

        return $obj;
    }

    /**
     * Mode of data transfer.
     */
    public function withTransferMode(string $transferMode): self
    {
        $obj = clone $this;
        $obj->transferMode = $transferMode;

        return $obj;
    }
}
