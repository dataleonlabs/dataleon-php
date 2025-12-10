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
 *   activeAmlSuspicions?: bool|null,
 *   apiVersion?: int|null,
 *   approvedAt?: \DateTimeInterface|null,
 *   callbackURL?: string|null,
 *   callbackURLNotification?: string|null,
 *   disableNotification?: bool|null,
 *   disableNotificationDate?: \DateTimeInterface|null,
 *   exportType?: string|null,
 *   filteringScoreAmlSuspicions?: float|null,
 *   finishedAt?: \DateTimeInterface|null,
 *   ip?: string|null,
 *   language?: string|null,
 *   locationIP?: string|null,
 *   needReviewAt?: \DateTimeInterface|null,
 *   notificationConfirmation?: bool|null,
 *   portalSteps?: list<value-of<PortalStep>>|null,
 *   qrCode?: string|null,
 *   rawData?: bool|null,
 *   rejectedAt?: \DateTimeInterface|null,
 *   sessionDuration?: int|null,
 *   startedAt?: \DateTimeInterface|null,
 *   transferAt?: \DateTimeInterface|null,
 *   transferMode?: string|null,
 * }
 */
final class TechnicalData implements BaseModel
{
    /** @use SdkModel<TechnicalDataShape> */
    use SdkModel;

    /**
     * Flag indicating whether there are active research AML (Anti-Money Laundering) suspicions for the object when you apply for a new entry or get an existing one.
     */
    #[Optional('active_aml_suspicions')]
    public ?bool $activeAmlSuspicions;

    /**
     * Version number of the API used.
     */
    #[Optional('api_version')]
    public ?int $apiVersion;

    /**
     * Timestamp when the request or process was approved.
     */
    #[Optional('approved_at')]
    public ?\DateTimeInterface $approvedAt;

    /**
     * URL to receive callback data from the AML system.
     */
    #[Optional('callback_url')]
    public ?string $callbackURL;

    /**
     * URL to receive notification updates about the processing status.
     */
    #[Optional('callback_url_notification')]
    public ?string $callbackURLNotification;

    /**
     * Flag to indicate if notifications are disabled.
     */
    #[Optional('disable_notification')]
    public ?bool $disableNotification;

    /**
     * Timestamp when notifications were disabled; null if never disabled.
     */
    #[Optional('disable_notification_date', nullable: true)]
    public ?\DateTimeInterface $disableNotificationDate;

    /**
     * Export format defined by the API (e.g., "json", "xml").
     */
    #[Optional('export_type')]
    public ?string $exportType;

    /**
     * Minimum filtering score (between 0 and 1) for AML suspicions to be considered.
     */
    #[Optional('filtering_score_aml_suspicions')]
    public ?float $filteringScoreAmlSuspicions;

    /**
     * Timestamp when the process finished.
     */
    #[Optional('finished_at')]
    public ?\DateTimeInterface $finishedAt;

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
    #[Optional('location_ip')]
    public ?string $locationIP;

    /**
     * Timestamp indicating when the request or process needs review; null if none.
     */
    #[Optional('need_review_at', nullable: true)]
    public ?\DateTimeInterface $needReviewAt;

    /**
     * Flag indicating if notification confirmation is required or received.
     */
    #[Optional('notification_confirmation')]
    public ?bool $notificationConfirmation;

    /**
     * List of steps to include in the portal workflow.
     *
     * @var list<value-of<PortalStep>>|null $portalSteps
     */
    #[Optional('portal_steps', list: PortalStep::class)]
    public ?array $portalSteps;

    /**
     * Indicates whether QR code is enabled ("true" or "false").
     */
    #[Optional('qr_code')]
    public ?string $qrCode;

    /**
     * Flag indicating whether to include raw data in the response.
     */
    #[Optional('raw_data')]
    public ?bool $rawData;

    /**
     * Timestamp when the request or process was rejected; null if not rejected.
     */
    #[Optional('rejected_at', nullable: true)]
    public ?\DateTimeInterface $rejectedAt;

    /**
     * Duration of the user session in seconds.
     */
    #[Optional('session_duration')]
    public ?int $sessionDuration;

    /**
     * Timestamp when the process started.
     */
    #[Optional('started_at')]
    public ?\DateTimeInterface $startedAt;

    /**
     * Date/time of data transfer.
     */
    #[Optional('transfer_at')]
    public ?\DateTimeInterface $transferAt;

    /**
     * Mode of data transfer.
     */
    #[Optional('transfer_mode')]
    public ?string $transferMode;

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
        ?int $apiVersion = null,
        ?\DateTimeInterface $approvedAt = null,
        ?string $callbackURL = null,
        ?string $callbackURLNotification = null,
        ?bool $disableNotification = null,
        ?\DateTimeInterface $disableNotificationDate = null,
        ?string $exportType = null,
        ?float $filteringScoreAmlSuspicions = null,
        ?\DateTimeInterface $finishedAt = null,
        ?string $ip = null,
        ?string $language = null,
        ?string $locationIP = null,
        ?\DateTimeInterface $needReviewAt = null,
        ?bool $notificationConfirmation = null,
        ?array $portalSteps = null,
        ?string $qrCode = null,
        ?bool $rawData = null,
        ?\DateTimeInterface $rejectedAt = null,
        ?int $sessionDuration = null,
        ?\DateTimeInterface $startedAt = null,
        ?\DateTimeInterface $transferAt = null,
        ?string $transferMode = null,
    ): self {
        $self = new self;

        null !== $activeAmlSuspicions && $self['activeAmlSuspicions'] = $activeAmlSuspicions;
        null !== $apiVersion && $self['apiVersion'] = $apiVersion;
        null !== $approvedAt && $self['approvedAt'] = $approvedAt;
        null !== $callbackURL && $self['callbackURL'] = $callbackURL;
        null !== $callbackURLNotification && $self['callbackURLNotification'] = $callbackURLNotification;
        null !== $disableNotification && $self['disableNotification'] = $disableNotification;
        null !== $disableNotificationDate && $self['disableNotificationDate'] = $disableNotificationDate;
        null !== $exportType && $self['exportType'] = $exportType;
        null !== $filteringScoreAmlSuspicions && $self['filteringScoreAmlSuspicions'] = $filteringScoreAmlSuspicions;
        null !== $finishedAt && $self['finishedAt'] = $finishedAt;
        null !== $ip && $self['ip'] = $ip;
        null !== $language && $self['language'] = $language;
        null !== $locationIP && $self['locationIP'] = $locationIP;
        null !== $needReviewAt && $self['needReviewAt'] = $needReviewAt;
        null !== $notificationConfirmation && $self['notificationConfirmation'] = $notificationConfirmation;
        null !== $portalSteps && $self['portalSteps'] = $portalSteps;
        null !== $qrCode && $self['qrCode'] = $qrCode;
        null !== $rawData && $self['rawData'] = $rawData;
        null !== $rejectedAt && $self['rejectedAt'] = $rejectedAt;
        null !== $sessionDuration && $self['sessionDuration'] = $sessionDuration;
        null !== $startedAt && $self['startedAt'] = $startedAt;
        null !== $transferAt && $self['transferAt'] = $transferAt;
        null !== $transferMode && $self['transferMode'] = $transferMode;

        return $self;
    }

    /**
     * Flag indicating whether there are active research AML (Anti-Money Laundering) suspicions for the object when you apply for a new entry or get an existing one.
     */
    public function withActiveAmlSuspicions(bool $activeAmlSuspicions): self
    {
        $self = clone $this;
        $self['activeAmlSuspicions'] = $activeAmlSuspicions;

        return $self;
    }

    /**
     * Version number of the API used.
     */
    public function withAPIVersion(int $apiVersion): self
    {
        $self = clone $this;
        $self['apiVersion'] = $apiVersion;

        return $self;
    }

    /**
     * Timestamp when the request or process was approved.
     */
    public function withApprovedAt(\DateTimeInterface $approvedAt): self
    {
        $self = clone $this;
        $self['approvedAt'] = $approvedAt;

        return $self;
    }

    /**
     * URL to receive callback data from the AML system.
     */
    public function withCallbackURL(string $callbackURL): self
    {
        $self = clone $this;
        $self['callbackURL'] = $callbackURL;

        return $self;
    }

    /**
     * URL to receive notification updates about the processing status.
     */
    public function withCallbackURLNotification(
        string $callbackURLNotification
    ): self {
        $self = clone $this;
        $self['callbackURLNotification'] = $callbackURLNotification;

        return $self;
    }

    /**
     * Flag to indicate if notifications are disabled.
     */
    public function withDisableNotification(bool $disableNotification): self
    {
        $self = clone $this;
        $self['disableNotification'] = $disableNotification;

        return $self;
    }

    /**
     * Timestamp when notifications were disabled; null if never disabled.
     */
    public function withDisableNotificationDate(
        ?\DateTimeInterface $disableNotificationDate
    ): self {
        $self = clone $this;
        $self['disableNotificationDate'] = $disableNotificationDate;

        return $self;
    }

    /**
     * Export format defined by the API (e.g., "json", "xml").
     */
    public function withExportType(string $exportType): self
    {
        $self = clone $this;
        $self['exportType'] = $exportType;

        return $self;
    }

    /**
     * Minimum filtering score (between 0 and 1) for AML suspicions to be considered.
     */
    public function withFilteringScoreAmlSuspicions(
        float $filteringScoreAmlSuspicions
    ): self {
        $self = clone $this;
        $self['filteringScoreAmlSuspicions'] = $filteringScoreAmlSuspicions;

        return $self;
    }

    /**
     * Timestamp when the process finished.
     */
    public function withFinishedAt(\DateTimeInterface $finishedAt): self
    {
        $self = clone $this;
        $self['finishedAt'] = $finishedAt;

        return $self;
    }

    /**
     * IP address of the our system handling the request.
     */
    public function withIP(string $ip): self
    {
        $self = clone $this;
        $self['ip'] = $ip;

        return $self;
    }

    /**
     * Language preference used in the client workspace (e.g., "fra").
     */
    public function withLanguage(string $language): self
    {
        $self = clone $this;
        $self['language'] = $language;

        return $self;
    }

    /**
     * IP address of the end client (final user) captured.
     */
    public function withLocationIP(string $locationIP): self
    {
        $self = clone $this;
        $self['locationIP'] = $locationIP;

        return $self;
    }

    /**
     * Timestamp indicating when the request or process needs review; null if none.
     */
    public function withNeedReviewAt(?\DateTimeInterface $needReviewAt): self
    {
        $self = clone $this;
        $self['needReviewAt'] = $needReviewAt;

        return $self;
    }

    /**
     * Flag indicating if notification confirmation is required or received.
     */
    public function withNotificationConfirmation(
        bool $notificationConfirmation
    ): self {
        $self = clone $this;
        $self['notificationConfirmation'] = $notificationConfirmation;

        return $self;
    }

    /**
     * List of steps to include in the portal workflow.
     *
     * @param list<PortalStep|value-of<PortalStep>> $portalSteps
     */
    public function withPortalSteps(array $portalSteps): self
    {
        $self = clone $this;
        $self['portalSteps'] = $portalSteps;

        return $self;
    }

    /**
     * Indicates whether QR code is enabled ("true" or "false").
     */
    public function withQrCode(string $qrCode): self
    {
        $self = clone $this;
        $self['qrCode'] = $qrCode;

        return $self;
    }

    /**
     * Flag indicating whether to include raw data in the response.
     */
    public function withRawData(bool $rawData): self
    {
        $self = clone $this;
        $self['rawData'] = $rawData;

        return $self;
    }

    /**
     * Timestamp when the request or process was rejected; null if not rejected.
     */
    public function withRejectedAt(?\DateTimeInterface $rejectedAt): self
    {
        $self = clone $this;
        $self['rejectedAt'] = $rejectedAt;

        return $self;
    }

    /**
     * Duration of the user session in seconds.
     */
    public function withSessionDuration(int $sessionDuration): self
    {
        $self = clone $this;
        $self['sessionDuration'] = $sessionDuration;

        return $self;
    }

    /**
     * Timestamp when the process started.
     */
    public function withStartedAt(\DateTimeInterface $startedAt): self
    {
        $self = clone $this;
        $self['startedAt'] = $startedAt;

        return $self;
    }

    /**
     * Date/time of data transfer.
     */
    public function withTransferAt(\DateTimeInterface $transferAt): self
    {
        $self = clone $this;
        $self['transferAt'] = $transferAt;

        return $self;
    }

    /**
     * Mode of data transfer.
     */
    public function withTransferMode(string $transferMode): self
    {
        $self = clone $this;
        $self['transferMode'] = $transferMode;

        return $self;
    }
}
