<?php

declare(strict_types=1);

namespace Dataleon\Companies\CompanyRegistration;

use Dataleon\Companies\CompanyRegistration\TechnicalData\PortalStep;
use Dataleon\Core\Attributes\Optional;
use Dataleon\Core\Concerns\SdkModel;
use Dataleon\Core\Contracts\BaseModel;

/**
 * Technical metadata related to the request, such as IP address, QR code settings, and callback URLs.
 *
 * @phpstan-type TechnicalDataShape = array{
 *   active_aml_suspicions?: bool|null,
 *   api_version?: int|null,
 *   approved_at?: \DateTimeInterface|null,
 *   callback_url?: string|null,
 *   callback_url_notification?: string|null,
 *   disable_notification?: bool|null,
 *   disable_notification_date?: \DateTimeInterface|null,
 *   export_type?: string|null,
 *   filtering_score_aml_suspicions?: float|null,
 *   finished_at?: \DateTimeInterface|null,
 *   ip?: string|null,
 *   language?: string|null,
 *   location_ip?: string|null,
 *   need_review_at?: \DateTimeInterface|null,
 *   notification_confirmation?: bool|null,
 *   portal_steps?: list<value-of<PortalStep>>|null,
 *   qr_code?: string|null,
 *   raw_data?: bool|null,
 *   rejected_at?: \DateTimeInterface|null,
 *   session_duration?: int|null,
 *   started_at?: \DateTimeInterface|null,
 *   transfer_at?: \DateTimeInterface|null,
 *   transfer_mode?: string|null,
 * }
 */
final class TechnicalData implements BaseModel
{
    /** @use SdkModel<TechnicalDataShape> */
    use SdkModel;

    /**
     * Flag indicating whether there are active research AML (Anti-Money Laundering) suspicions for the object when you apply for a new entry or get an existing one.
     */
    #[Optional]
    public ?bool $active_aml_suspicions;

    /**
     * Version number of the API used.
     */
    #[Optional]
    public ?int $api_version;

    /**
     * Timestamp when the request or process was approved.
     */
    #[Optional]
    public ?\DateTimeInterface $approved_at;

    /**
     * URL to receive callback data from the AML system.
     */
    #[Optional]
    public ?string $callback_url;

    /**
     * URL to receive notification updates about the processing status.
     */
    #[Optional]
    public ?string $callback_url_notification;

    /**
     * Flag to indicate if notifications are disabled.
     */
    #[Optional]
    public ?bool $disable_notification;

    /**
     * Timestamp when notifications were disabled; null if never disabled.
     */
    #[Optional(nullable: true)]
    public ?\DateTimeInterface $disable_notification_date;

    /**
     * Export format defined by the API (e.g., "json", "xml").
     */
    #[Optional]
    public ?string $export_type;

    /**
     * Minimum filtering score (between 0 and 1) for AML suspicions to be considered.
     */
    #[Optional]
    public ?float $filtering_score_aml_suspicions;

    /**
     * Timestamp when the process finished.
     */
    #[Optional]
    public ?\DateTimeInterface $finished_at;

    /**
     * IP address of the our system handling the request.
     */
    #[Optional]
    public ?string $ip;

    /**
     * Language preference used in the client workspace (e.g., "fra").
     */
    #[Optional]
    public ?string $language;

    /**
     * IP address of the end client (final user) captured.
     */
    #[Optional]
    public ?string $location_ip;

    /**
     * Timestamp indicating when the request or process needs review; null if none.
     */
    #[Optional(nullable: true)]
    public ?\DateTimeInterface $need_review_at;

    /**
     * Flag indicating if notification confirmation is required or received.
     */
    #[Optional]
    public ?bool $notification_confirmation;

    /**
     * List of steps to include in the portal workflow.
     *
     * @var list<value-of<PortalStep>>|null $portal_steps
     */
    #[Optional(list: PortalStep::class)]
    public ?array $portal_steps;

    /**
     * Indicates whether QR code is enabled ("true" or "false").
     */
    #[Optional]
    public ?string $qr_code;

    /**
     * Flag indicating whether to include raw data in the response.
     */
    #[Optional]
    public ?bool $raw_data;

    /**
     * Timestamp when the request or process was rejected; null if not rejected.
     */
    #[Optional(nullable: true)]
    public ?\DateTimeInterface $rejected_at;

    /**
     * Duration of the user session in seconds.
     */
    #[Optional]
    public ?int $session_duration;

    /**
     * Timestamp when the process started.
     */
    #[Optional]
    public ?\DateTimeInterface $started_at;

    /**
     * Date/time of data transfer.
     */
    #[Optional]
    public ?\DateTimeInterface $transfer_at;

    /**
     * Mode of data transfer.
     */
    #[Optional]
    public ?string $transfer_mode;

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
        ?int $api_version = null,
        ?\DateTimeInterface $approved_at = null,
        ?string $callback_url = null,
        ?string $callback_url_notification = null,
        ?bool $disable_notification = null,
        ?\DateTimeInterface $disable_notification_date = null,
        ?string $export_type = null,
        ?float $filtering_score_aml_suspicions = null,
        ?\DateTimeInterface $finished_at = null,
        ?string $ip = null,
        ?string $language = null,
        ?string $location_ip = null,
        ?\DateTimeInterface $need_review_at = null,
        ?bool $notification_confirmation = null,
        ?array $portal_steps = null,
        ?string $qr_code = null,
        ?bool $raw_data = null,
        ?\DateTimeInterface $rejected_at = null,
        ?int $session_duration = null,
        ?\DateTimeInterface $started_at = null,
        ?\DateTimeInterface $transfer_at = null,
        ?string $transfer_mode = null,
    ): self {
        $obj = new self;

        null !== $active_aml_suspicions && $obj['active_aml_suspicions'] = $active_aml_suspicions;
        null !== $api_version && $obj['api_version'] = $api_version;
        null !== $approved_at && $obj['approved_at'] = $approved_at;
        null !== $callback_url && $obj['callback_url'] = $callback_url;
        null !== $callback_url_notification && $obj['callback_url_notification'] = $callback_url_notification;
        null !== $disable_notification && $obj['disable_notification'] = $disable_notification;
        null !== $disable_notification_date && $obj['disable_notification_date'] = $disable_notification_date;
        null !== $export_type && $obj['export_type'] = $export_type;
        null !== $filtering_score_aml_suspicions && $obj['filtering_score_aml_suspicions'] = $filtering_score_aml_suspicions;
        null !== $finished_at && $obj['finished_at'] = $finished_at;
        null !== $ip && $obj['ip'] = $ip;
        null !== $language && $obj['language'] = $language;
        null !== $location_ip && $obj['location_ip'] = $location_ip;
        null !== $need_review_at && $obj['need_review_at'] = $need_review_at;
        null !== $notification_confirmation && $obj['notification_confirmation'] = $notification_confirmation;
        null !== $portal_steps && $obj['portal_steps'] = $portal_steps;
        null !== $qr_code && $obj['qr_code'] = $qr_code;
        null !== $raw_data && $obj['raw_data'] = $raw_data;
        null !== $rejected_at && $obj['rejected_at'] = $rejected_at;
        null !== $session_duration && $obj['session_duration'] = $session_duration;
        null !== $started_at && $obj['started_at'] = $started_at;
        null !== $transfer_at && $obj['transfer_at'] = $transfer_at;
        null !== $transfer_mode && $obj['transfer_mode'] = $transfer_mode;

        return $obj;
    }

    /**
     * Flag indicating whether there are active research AML (Anti-Money Laundering) suspicions for the object when you apply for a new entry or get an existing one.
     */
    public function withActiveAmlSuspicions(bool $activeAmlSuspicions): self
    {
        $obj = clone $this;
        $obj['active_aml_suspicions'] = $activeAmlSuspicions;

        return $obj;
    }

    /**
     * Version number of the API used.
     */
    public function withAPIVersion(int $apiVersion): self
    {
        $obj = clone $this;
        $obj['api_version'] = $apiVersion;

        return $obj;
    }

    /**
     * Timestamp when the request or process was approved.
     */
    public function withApprovedAt(\DateTimeInterface $approvedAt): self
    {
        $obj = clone $this;
        $obj['approved_at'] = $approvedAt;

        return $obj;
    }

    /**
     * URL to receive callback data from the AML system.
     */
    public function withCallbackURL(string $callbackURL): self
    {
        $obj = clone $this;
        $obj['callback_url'] = $callbackURL;

        return $obj;
    }

    /**
     * URL to receive notification updates about the processing status.
     */
    public function withCallbackURLNotification(
        string $callbackURLNotification
    ): self {
        $obj = clone $this;
        $obj['callback_url_notification'] = $callbackURLNotification;

        return $obj;
    }

    /**
     * Flag to indicate if notifications are disabled.
     */
    public function withDisableNotification(bool $disableNotification): self
    {
        $obj = clone $this;
        $obj['disable_notification'] = $disableNotification;

        return $obj;
    }

    /**
     * Timestamp when notifications were disabled; null if never disabled.
     */
    public function withDisableNotificationDate(
        ?\DateTimeInterface $disableNotificationDate
    ): self {
        $obj = clone $this;
        $obj['disable_notification_date'] = $disableNotificationDate;

        return $obj;
    }

    /**
     * Export format defined by the API (e.g., "json", "xml").
     */
    public function withExportType(string $exportType): self
    {
        $obj = clone $this;
        $obj['export_type'] = $exportType;

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
     * Timestamp when the process finished.
     */
    public function withFinishedAt(\DateTimeInterface $finishedAt): self
    {
        $obj = clone $this;
        $obj['finished_at'] = $finishedAt;

        return $obj;
    }

    /**
     * IP address of the our system handling the request.
     */
    public function withIP(string $ip): self
    {
        $obj = clone $this;
        $obj['ip'] = $ip;

        return $obj;
    }

    /**
     * Language preference used in the client workspace (e.g., "fra").
     */
    public function withLanguage(string $language): self
    {
        $obj = clone $this;
        $obj['language'] = $language;

        return $obj;
    }

    /**
     * IP address of the end client (final user) captured.
     */
    public function withLocationIP(string $locationIP): self
    {
        $obj = clone $this;
        $obj['location_ip'] = $locationIP;

        return $obj;
    }

    /**
     * Timestamp indicating when the request or process needs review; null if none.
     */
    public function withNeedReviewAt(?\DateTimeInterface $needReviewAt): self
    {
        $obj = clone $this;
        $obj['need_review_at'] = $needReviewAt;

        return $obj;
    }

    /**
     * Flag indicating if notification confirmation is required or received.
     */
    public function withNotificationConfirmation(
        bool $notificationConfirmation
    ): self {
        $obj = clone $this;
        $obj['notification_confirmation'] = $notificationConfirmation;

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
     * Indicates whether QR code is enabled ("true" or "false").
     */
    public function withQrCode(string $qrCode): self
    {
        $obj = clone $this;
        $obj['qr_code'] = $qrCode;

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

    /**
     * Timestamp when the request or process was rejected; null if not rejected.
     */
    public function withRejectedAt(?\DateTimeInterface $rejectedAt): self
    {
        $obj = clone $this;
        $obj['rejected_at'] = $rejectedAt;

        return $obj;
    }

    /**
     * Duration of the user session in seconds.
     */
    public function withSessionDuration(int $sessionDuration): self
    {
        $obj = clone $this;
        $obj['session_duration'] = $sessionDuration;

        return $obj;
    }

    /**
     * Timestamp when the process started.
     */
    public function withStartedAt(\DateTimeInterface $startedAt): self
    {
        $obj = clone $this;
        $obj['started_at'] = $startedAt;

        return $obj;
    }

    /**
     * Date/time of data transfer.
     */
    public function withTransferAt(\DateTimeInterface $transferAt): self
    {
        $obj = clone $this;
        $obj['transfer_at'] = $transferAt;

        return $obj;
    }

    /**
     * Mode of data transfer.
     */
    public function withTransferMode(string $transferMode): self
    {
        $obj = clone $this;
        $obj['transfer_mode'] = $transferMode;

        return $obj;
    }
}
