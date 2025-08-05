<?php

declare(strict_types=1);

namespace Dataleon\Models\Individual;

use Dataleon\Core\Attributes\Api;
use Dataleon\Core\Concerns\Model;
use Dataleon\Core\Contracts\BaseModel;

/**
 * Technical metadata related to the request (e.g., QR code settings, language).
 *
 * @phpstan-type technical_data_alias = array{
 *   apiVersion?: int,
 *   approvedAt?: \DateTimeInterface,
 *   callbackURL?: string,
 *   callbackURLNotification?: string,
 *   disableNotification?: bool,
 *   disableNotificationDate?: \DateTimeInterface|null,
 *   exportType?: string,
 *   finishedAt?: \DateTimeInterface,
 *   ip?: string,
 *   language?: string,
 *   locationIP?: string,
 *   needReviewAt?: \DateTimeInterface|null,
 *   notificationConfirmation?: bool,
 *   qrCode?: string,
 *   rawData?: bool,
 *   rejectedAt?: \DateTimeInterface|null,
 *   startedAt?: \DateTimeInterface,
 *   transferAt?: \DateTimeInterface,
 *   transferMode?: string,
 * }
 */
final class TechnicalData implements BaseModel
{
    use Model;

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
    public static function new(
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
        ?\DateTimeInterface $startedAt = null,
        ?\DateTimeInterface $transferAt = null,
        ?string $transferMode = null,
    ): self {
        $obj = new self;

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
        null !== $startedAt && $obj->startedAt = $startedAt;
        null !== $transferAt && $obj->transferAt = $transferAt;
        null !== $transferMode && $obj->transferMode = $transferMode;

        return $obj;
    }

    /**
     * Version number of the API used.
     */
    public function setAPIVersion(int $apiVersion): self
    {
        $this->apiVersion = $apiVersion;

        return $this;
    }

    /**
     * Timestamp when the request or process was approved.
     */
    public function setApprovedAt(\DateTimeInterface $approvedAt): self
    {
        $this->approvedAt = $approvedAt;

        return $this;
    }

    /**
     * URL to receive callback data from the AML system.
     */
    public function setCallbackURL(string $callbackURL): self
    {
        $this->callbackURL = $callbackURL;

        return $this;
    }

    /**
     * URL to receive notification updates about the processing status.
     */
    public function setCallbackURLNotification(
        string $callbackURLNotification
    ): self {
        $this->callbackURLNotification = $callbackURLNotification;

        return $this;
    }

    /**
     * Flag to indicate if notifications are disabled.
     */
    public function setDisableNotification(bool $disableNotification): self
    {
        $this->disableNotification = $disableNotification;

        return $this;
    }

    /**
     * Timestamp when notifications were disabled; null if never disabled.
     */
    public function setDisableNotificationDate(
        ?\DateTimeInterface $disableNotificationDate
    ): self {
        $this->disableNotificationDate = $disableNotificationDate;

        return $this;
    }

    /**
     * Export format defined by the API (e.g., "json", "xml").
     */
    public function setExportType(string $exportType): self
    {
        $this->exportType = $exportType;

        return $this;
    }

    /**
     * Timestamp when the process finished.
     */
    public function setFinishedAt(\DateTimeInterface $finishedAt): self
    {
        $this->finishedAt = $finishedAt;

        return $this;
    }

    /**
     * IP address of the our system handling the request.
     */
    public function setIP(string $ip): self
    {
        $this->ip = $ip;

        return $this;
    }

    /**
     * Language preference used in the client workspace (e.g., "fra").
     */
    public function setLanguage(string $language): self
    {
        $this->language = $language;

        return $this;
    }

    /**
     * IP address of the end client (final user) captured.
     */
    public function setLocationIP(string $locationIP): self
    {
        $this->locationIP = $locationIP;

        return $this;
    }

    /**
     * Timestamp indicating when the request or process needs review; null if none.
     */
    public function setNeedReviewAt(?\DateTimeInterface $needReviewAt): self
    {
        $this->needReviewAt = $needReviewAt;

        return $this;
    }

    /**
     * Flag indicating if notification confirmation is required or received.
     */
    public function setNotificationConfirmation(
        bool $notificationConfirmation
    ): self {
        $this->notificationConfirmation = $notificationConfirmation;

        return $this;
    }

    /**
     * Indicates whether QR code is enabled ("true" or "false").
     */
    public function setQrCode(string $qrCode): self
    {
        $this->qrCode = $qrCode;

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

    /**
     * Timestamp when the request or process was rejected; null if not rejected.
     */
    public function setRejectedAt(?\DateTimeInterface $rejectedAt): self
    {
        $this->rejectedAt = $rejectedAt;

        return $this;
    }

    /**
     * Timestamp when the process started.
     */
    public function setStartedAt(\DateTimeInterface $startedAt): self
    {
        $this->startedAt = $startedAt;

        return $this;
    }

    /**
     * Date/time of data transfer.
     */
    public function setTransferAt(\DateTimeInterface $transferAt): self
    {
        $this->transferAt = $transferAt;

        return $this;
    }

    /**
     * Mode of data transfer.
     */
    public function setTransferMode(string $transferMode): self
    {
        $this->transferMode = $transferMode;

        return $this;
    }
}
