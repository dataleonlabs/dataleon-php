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
        $obj = new self;

        null !== $activeAmlSuspicions && $obj['activeAmlSuspicions'] = $activeAmlSuspicions;
        null !== $apiVersion && $obj['apiVersion'] = $apiVersion;
        null !== $approvedAt && $obj['approvedAt'] = $approvedAt;
        null !== $callbackURL && $obj['callbackURL'] = $callbackURL;
        null !== $callbackURLNotification && $obj['callbackURLNotification'] = $callbackURLNotification;
        null !== $disableNotification && $obj['disableNotification'] = $disableNotification;
        null !== $disableNotificationDate && $obj['disableNotificationDate'] = $disableNotificationDate;
        null !== $exportType && $obj['exportType'] = $exportType;
        null !== $filteringScoreAmlSuspicions && $obj['filteringScoreAmlSuspicions'] = $filteringScoreAmlSuspicions;
        null !== $finishedAt && $obj['finishedAt'] = $finishedAt;
        null !== $ip && $obj['ip'] = $ip;
        null !== $language && $obj['language'] = $language;
        null !== $locationIP && $obj['locationIP'] = $locationIP;
        null !== $needReviewAt && $obj['needReviewAt'] = $needReviewAt;
        null !== $notificationConfirmation && $obj['notificationConfirmation'] = $notificationConfirmation;
        null !== $portalSteps && $obj['portalSteps'] = $portalSteps;
        null !== $qrCode && $obj['qrCode'] = $qrCode;
        null !== $rawData && $obj['rawData'] = $rawData;
        null !== $rejectedAt && $obj['rejectedAt'] = $rejectedAt;
        null !== $sessionDuration && $obj['sessionDuration'] = $sessionDuration;
        null !== $startedAt && $obj['startedAt'] = $startedAt;
        null !== $transferAt && $obj['transferAt'] = $transferAt;
        null !== $transferMode && $obj['transferMode'] = $transferMode;

        return $obj;
    }

    /**
     * Flag indicating whether there are active research AML (Anti-Money Laundering) suspicions for the object when you apply for a new entry or get an existing one.
     */
    public function withActiveAmlSuspicions(bool $activeAmlSuspicions): self
    {
        $obj = clone $this;
        $obj['activeAmlSuspicions'] = $activeAmlSuspicions;

        return $obj;
    }

    /**
     * Version number of the API used.
     */
    public function withAPIVersion(int $apiVersion): self
    {
        $obj = clone $this;
        $obj['apiVersion'] = $apiVersion;

        return $obj;
    }

    /**
     * Timestamp when the request or process was approved.
     */
    public function withApprovedAt(\DateTimeInterface $approvedAt): self
    {
        $obj = clone $this;
        $obj['approvedAt'] = $approvedAt;

        return $obj;
    }

    /**
     * URL to receive callback data from the AML system.
     */
    public function withCallbackURL(string $callbackURL): self
    {
        $obj = clone $this;
        $obj['callbackURL'] = $callbackURL;

        return $obj;
    }

    /**
     * URL to receive notification updates about the processing status.
     */
    public function withCallbackURLNotification(
        string $callbackURLNotification
    ): self {
        $obj = clone $this;
        $obj['callbackURLNotification'] = $callbackURLNotification;

        return $obj;
    }

    /**
     * Flag to indicate if notifications are disabled.
     */
    public function withDisableNotification(bool $disableNotification): self
    {
        $obj = clone $this;
        $obj['disableNotification'] = $disableNotification;

        return $obj;
    }

    /**
     * Timestamp when notifications were disabled; null if never disabled.
     */
    public function withDisableNotificationDate(
        ?\DateTimeInterface $disableNotificationDate
    ): self {
        $obj = clone $this;
        $obj['disableNotificationDate'] = $disableNotificationDate;

        return $obj;
    }

    /**
     * Export format defined by the API (e.g., "json", "xml").
     */
    public function withExportType(string $exportType): self
    {
        $obj = clone $this;
        $obj['exportType'] = $exportType;

        return $obj;
    }

    /**
     * Minimum filtering score (between 0 and 1) for AML suspicions to be considered.
     */
    public function withFilteringScoreAmlSuspicions(
        float $filteringScoreAmlSuspicions
    ): self {
        $obj = clone $this;
        $obj['filteringScoreAmlSuspicions'] = $filteringScoreAmlSuspicions;

        return $obj;
    }

    /**
     * Timestamp when the process finished.
     */
    public function withFinishedAt(\DateTimeInterface $finishedAt): self
    {
        $obj = clone $this;
        $obj['finishedAt'] = $finishedAt;

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
        $obj['locationIP'] = $locationIP;

        return $obj;
    }

    /**
     * Timestamp indicating when the request or process needs review; null if none.
     */
    public function withNeedReviewAt(?\DateTimeInterface $needReviewAt): self
    {
        $obj = clone $this;
        $obj['needReviewAt'] = $needReviewAt;

        return $obj;
    }

    /**
     * Flag indicating if notification confirmation is required or received.
     */
    public function withNotificationConfirmation(
        bool $notificationConfirmation
    ): self {
        $obj = clone $this;
        $obj['notificationConfirmation'] = $notificationConfirmation;

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
     * Indicates whether QR code is enabled ("true" or "false").
     */
    public function withQrCode(string $qrCode): self
    {
        $obj = clone $this;
        $obj['qrCode'] = $qrCode;

        return $obj;
    }

    /**
     * Flag indicating whether to include raw data in the response.
     */
    public function withRawData(bool $rawData): self
    {
        $obj = clone $this;
        $obj['rawData'] = $rawData;

        return $obj;
    }

    /**
     * Timestamp when the request or process was rejected; null if not rejected.
     */
    public function withRejectedAt(?\DateTimeInterface $rejectedAt): self
    {
        $obj = clone $this;
        $obj['rejectedAt'] = $rejectedAt;

        return $obj;
    }

    /**
     * Duration of the user session in seconds.
     */
    public function withSessionDuration(int $sessionDuration): self
    {
        $obj = clone $this;
        $obj['sessionDuration'] = $sessionDuration;

        return $obj;
    }

    /**
     * Timestamp when the process started.
     */
    public function withStartedAt(\DateTimeInterface $startedAt): self
    {
        $obj = clone $this;
        $obj['startedAt'] = $startedAt;

        return $obj;
    }

    /**
     * Date/time of data transfer.
     */
    public function withTransferAt(\DateTimeInterface $transferAt): self
    {
        $obj = clone $this;
        $obj['transferAt'] = $transferAt;

        return $obj;
    }

    /**
     * Mode of data transfer.
     */
    public function withTransferMode(string $transferMode): self
    {
        $obj = clone $this;
        $obj['transferMode'] = $transferMode;

        return $obj;
    }
}
