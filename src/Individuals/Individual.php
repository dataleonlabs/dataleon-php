<?php

declare(strict_types=1);

namespace Dataleon\Individuals;

use Dataleon\Check;
use Dataleon\Core\Attributes\Optional;
use Dataleon\Core\Concerns\SdkModel;
use Dataleon\Core\Contracts\BaseModel;
use Dataleon\Individuals\Documents\GenericDocument;
use Dataleon\Individuals\Documents\GenericDocument\Table;
use Dataleon\Individuals\Documents\GenericDocument\Value;
use Dataleon\Individuals\Individual\AmlSuspicion;
use Dataleon\Individuals\Individual\AmlSuspicion\Status;
use Dataleon\Individuals\Individual\AmlSuspicion\Type;
use Dataleon\Individuals\Individual\Certificat;
use Dataleon\Individuals\Individual\IdentityCard;
use Dataleon\Individuals\Individual\Person;
use Dataleon\Individuals\Individual\Property;
use Dataleon\Individuals\Individual\Risk;
use Dataleon\Individuals\Individual\Tag;
use Dataleon\Individuals\Individual\TechnicalData;
use Dataleon\Individuals\Individual\TechnicalData\PortalStep;

/**
 * Represents a single individual record, including identification, status, and associated metadata.
 *
 * @phpstan-type IndividualShape = array{
 *   id?: string|null,
 *   amlSuspicions?: list<AmlSuspicion>|null,
 *   authURL?: string|null,
 *   certificat?: Certificat|null,
 *   checks?: list<Check>|null,
 *   createdAt?: \DateTimeInterface|null,
 *   documents?: list<GenericDocument>|null,
 *   identityCard?: IdentityCard|null,
 *   number?: int|null,
 *   person?: Person|null,
 *   portalURL?: string|null,
 *   properties?: list<Property>|null,
 *   risk?: Risk|null,
 *   sourceID?: string|null,
 *   state?: string|null,
 *   status?: string|null,
 *   tags?: list<Tag>|null,
 *   technicalData?: TechnicalData|null,
 *   webviewURL?: string|null,
 *   workspaceID?: string|null,
 * }
 */
final class Individual implements BaseModel
{
    /** @use SdkModel<IndividualShape> */
    use SdkModel;

    /**
     * Unique identifier of the individual.
     */
    #[Optional]
    public ?string $id;

    /**
     * List of AML (Anti-Money Laundering) suspicion entries linked to the individual.
     *
     * @var list<AmlSuspicion>|null $amlSuspicions
     */
    #[Optional('aml_suspicions', list: AmlSuspicion::class)]
    public ?array $amlSuspicions;

    /**
     * URL to authenticate the individual, usually for document signing or onboarding.
     */
    #[Optional('auth_url')]
    public ?string $authURL;

    /**
     * Digital certificate associated with the individual, if any.
     */
    #[Optional]
    public ?Certificat $certificat;

    /**
     * List of verification or validation checks applied to the individual.
     *
     * @var list<Check>|null $checks
     */
    #[Optional(list: Check::class)]
    public ?array $checks;

    /**
     * Timestamp of the individual's creation in ISO 8601 format.
     */
    #[Optional('created_at')]
    public ?\DateTimeInterface $createdAt;

    /**
     * All documents submitted or associated with the individual.
     *
     * @var list<GenericDocument>|null $documents
     */
    #[Optional(list: GenericDocument::class)]
    public ?array $documents;

    /**
     * Reference to the individual's identity document.
     */
    #[Optional('identity_card')]
    public ?IdentityCard $identityCard;

    /**
     * Internal sequential number or reference for the individual.
     */
    #[Optional]
    public ?int $number;

    /**
     * Personal details of the individual, such as name, date of birth, and contact info.
     */
    #[Optional]
    public ?Person $person;

    /**
     * Admin or internal portal URL for viewing the individual's details.
     */
    #[Optional('portal_url')]
    public ?string $portalURL;

    /**
     * Custom key-value metadata fields associated with the individual.
     *
     * @var list<Property>|null $properties
     */
    #[Optional(list: Property::class)]
    public ?array $properties;

    /**
     * Risk assessment associated with the individual.
     */
    #[Optional]
    public ?Risk $risk;

    /**
     * Optional identifier indicating the source of the individual record.
     */
    #[Optional('source_id')]
    public ?string $sourceID;

    /**
     * Current operational state in the workflow (e.g., WAITING, IN_PROGRESS, COMPLETED).
     */
    #[Optional]
    public ?string $state;

    /**
     * Overall processing status of the individual (e.g., rejected, need_review, approved).
     */
    #[Optional]
    public ?string $status;

    /**
     * List of tags assigned to the individual for categorization or metadata purposes.
     *
     * @var list<Tag>|null $tags
     */
    #[Optional(list: Tag::class)]
    public ?array $tags;

    /**
     * Technical metadata related to the request (e.g., QR code settings, language).
     */
    #[Optional('technical_data')]
    public ?TechnicalData $technicalData;

    /**
     * Public-facing webview URL for the individual’s identification process.
     */
    #[Optional('webview_url')]
    public ?string $webviewURL;

    /**
     * Identifier of the workspace to which the individual belongs.
     */
    #[Optional('workspace_id')]
    public ?string $workspaceID;

    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     *
     * @param list<AmlSuspicion|array{
     *   caption?: string|null,
     *   country?: string|null,
     *   gender?: string|null,
     *   relation?: string|null,
     *   schema?: string|null,
     *   score?: float|null,
     *   source?: string|null,
     *   status?: value-of<Status>|null,
     *   type?: value-of<Type>|null,
     * }> $amlSuspicions
     * @param Certificat|array{
     *   id?: string|null, createdAt?: \DateTimeInterface|null, filename?: string|null
     * } $certificat
     * @param list<Check|array{
     *   masked?: bool|null,
     *   message?: string|null,
     *   name?: string|null,
     *   validate?: bool|null,
     *   weight?: int|null,
     * }> $checks
     * @param list<GenericDocument|array{
     *   id?: string|null,
     *   checks?: list<Check>|null,
     *   createdAt?: \DateTimeInterface|null,
     *   documentType?: string|null,
     *   name?: string|null,
     *   signedURL?: string|null,
     *   state?: string|null,
     *   status?: string|null,
     *   tables?: list<Table>|null,
     *   values?: list<Value>|null,
     * }> $documents
     * @param IdentityCard|array{
     *   id?: string|null,
     *   backDocumentSignedURL?: string|null,
     *   birthPlace?: string|null,
     *   birthday?: string|null,
     *   country?: string|null,
     *   expirationDate?: string|null,
     *   firstName?: string|null,
     *   frontDocumentSignedURL?: string|null,
     *   gender?: string|null,
     *   issueDate?: string|null,
     *   lastName?: string|null,
     *   mrzLine1?: string|null,
     *   mrzLine2?: string|null,
     *   mrzLine3?: string|null,
     *   type?: string|null,
     * } $identityCard
     * @param Person|array{
     *   birthday?: string|null,
     *   email?: string|null,
     *   faceImageSignedURL?: string|null,
     *   firstName?: string|null,
     *   fullName?: string|null,
     *   gender?: string|null,
     *   lastName?: string|null,
     *   maidenName?: string|null,
     *   nationality?: string|null,
     *   phoneNumber?: string|null,
     * } $person
     * @param list<Property|array{
     *   name?: string|null, type?: string|null, value?: string|null
     * }> $properties
     * @param Risk|array{
     *   code?: string|null, reason?: string|null, score?: float|null
     * } $risk
     * @param list<Tag|array{
     *   key?: string|null,
     *   private?: bool|null,
     *   type?: string|null,
     *   value?: string|null,
     * }> $tags
     * @param TechnicalData|array{
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
     * } $technicalData
     */
    public static function with(
        ?string $id = null,
        ?array $amlSuspicions = null,
        ?string $authURL = null,
        Certificat|array|null $certificat = null,
        ?array $checks = null,
        ?\DateTimeInterface $createdAt = null,
        ?array $documents = null,
        IdentityCard|array|null $identityCard = null,
        ?int $number = null,
        Person|array|null $person = null,
        ?string $portalURL = null,
        ?array $properties = null,
        Risk|array|null $risk = null,
        ?string $sourceID = null,
        ?string $state = null,
        ?string $status = null,
        ?array $tags = null,
        TechnicalData|array|null $technicalData = null,
        ?string $webviewURL = null,
        ?string $workspaceID = null,
    ): self {
        $obj = new self;

        null !== $id && $obj['id'] = $id;
        null !== $amlSuspicions && $obj['amlSuspicions'] = $amlSuspicions;
        null !== $authURL && $obj['authURL'] = $authURL;
        null !== $certificat && $obj['certificat'] = $certificat;
        null !== $checks && $obj['checks'] = $checks;
        null !== $createdAt && $obj['createdAt'] = $createdAt;
        null !== $documents && $obj['documents'] = $documents;
        null !== $identityCard && $obj['identityCard'] = $identityCard;
        null !== $number && $obj['number'] = $number;
        null !== $person && $obj['person'] = $person;
        null !== $portalURL && $obj['portalURL'] = $portalURL;
        null !== $properties && $obj['properties'] = $properties;
        null !== $risk && $obj['risk'] = $risk;
        null !== $sourceID && $obj['sourceID'] = $sourceID;
        null !== $state && $obj['state'] = $state;
        null !== $status && $obj['status'] = $status;
        null !== $tags && $obj['tags'] = $tags;
        null !== $technicalData && $obj['technicalData'] = $technicalData;
        null !== $webviewURL && $obj['webviewURL'] = $webviewURL;
        null !== $workspaceID && $obj['workspaceID'] = $workspaceID;

        return $obj;
    }

    /**
     * Unique identifier of the individual.
     */
    public function withID(string $id): self
    {
        $obj = clone $this;
        $obj['id'] = $id;

        return $obj;
    }

    /**
     * List of AML (Anti-Money Laundering) suspicion entries linked to the individual.
     *
     * @param list<AmlSuspicion|array{
     *   caption?: string|null,
     *   country?: string|null,
     *   gender?: string|null,
     *   relation?: string|null,
     *   schema?: string|null,
     *   score?: float|null,
     *   source?: string|null,
     *   status?: value-of<Status>|null,
     *   type?: value-of<Type>|null,
     * }> $amlSuspicions
     */
    public function withAmlSuspicions(array $amlSuspicions): self
    {
        $obj = clone $this;
        $obj['amlSuspicions'] = $amlSuspicions;

        return $obj;
    }

    /**
     * URL to authenticate the individual, usually for document signing or onboarding.
     */
    public function withAuthURL(string $authURL): self
    {
        $obj = clone $this;
        $obj['authURL'] = $authURL;

        return $obj;
    }

    /**
     * Digital certificate associated with the individual, if any.
     *
     * @param Certificat|array{
     *   id?: string|null, createdAt?: \DateTimeInterface|null, filename?: string|null
     * } $certificat
     */
    public function withCertificat(Certificat|array $certificat): self
    {
        $obj = clone $this;
        $obj['certificat'] = $certificat;

        return $obj;
    }

    /**
     * List of verification or validation checks applied to the individual.
     *
     * @param list<Check|array{
     *   masked?: bool|null,
     *   message?: string|null,
     *   name?: string|null,
     *   validate?: bool|null,
     *   weight?: int|null,
     * }> $checks
     */
    public function withChecks(array $checks): self
    {
        $obj = clone $this;
        $obj['checks'] = $checks;

        return $obj;
    }

    /**
     * Timestamp of the individual's creation in ISO 8601 format.
     */
    public function withCreatedAt(\DateTimeInterface $createdAt): self
    {
        $obj = clone $this;
        $obj['createdAt'] = $createdAt;

        return $obj;
    }

    /**
     * All documents submitted or associated with the individual.
     *
     * @param list<GenericDocument|array{
     *   id?: string|null,
     *   checks?: list<Check>|null,
     *   createdAt?: \DateTimeInterface|null,
     *   documentType?: string|null,
     *   name?: string|null,
     *   signedURL?: string|null,
     *   state?: string|null,
     *   status?: string|null,
     *   tables?: list<Table>|null,
     *   values?: list<Value>|null,
     * }> $documents
     */
    public function withDocuments(array $documents): self
    {
        $obj = clone $this;
        $obj['documents'] = $documents;

        return $obj;
    }

    /**
     * Reference to the individual's identity document.
     *
     * @param IdentityCard|array{
     *   id?: string|null,
     *   backDocumentSignedURL?: string|null,
     *   birthPlace?: string|null,
     *   birthday?: string|null,
     *   country?: string|null,
     *   expirationDate?: string|null,
     *   firstName?: string|null,
     *   frontDocumentSignedURL?: string|null,
     *   gender?: string|null,
     *   issueDate?: string|null,
     *   lastName?: string|null,
     *   mrzLine1?: string|null,
     *   mrzLine2?: string|null,
     *   mrzLine3?: string|null,
     *   type?: string|null,
     * } $identityCard
     */
    public function withIdentityCard(IdentityCard|array $identityCard): self
    {
        $obj = clone $this;
        $obj['identityCard'] = $identityCard;

        return $obj;
    }

    /**
     * Internal sequential number or reference for the individual.
     */
    public function withNumber(int $number): self
    {
        $obj = clone $this;
        $obj['number'] = $number;

        return $obj;
    }

    /**
     * Personal details of the individual, such as name, date of birth, and contact info.
     *
     * @param Person|array{
     *   birthday?: string|null,
     *   email?: string|null,
     *   faceImageSignedURL?: string|null,
     *   firstName?: string|null,
     *   fullName?: string|null,
     *   gender?: string|null,
     *   lastName?: string|null,
     *   maidenName?: string|null,
     *   nationality?: string|null,
     *   phoneNumber?: string|null,
     * } $person
     */
    public function withPerson(Person|array $person): self
    {
        $obj = clone $this;
        $obj['person'] = $person;

        return $obj;
    }

    /**
     * Admin or internal portal URL for viewing the individual's details.
     */
    public function withPortalURL(string $portalURL): self
    {
        $obj = clone $this;
        $obj['portalURL'] = $portalURL;

        return $obj;
    }

    /**
     * Custom key-value metadata fields associated with the individual.
     *
     * @param list<Property|array{
     *   name?: string|null, type?: string|null, value?: string|null
     * }> $properties
     */
    public function withProperties(array $properties): self
    {
        $obj = clone $this;
        $obj['properties'] = $properties;

        return $obj;
    }

    /**
     * Risk assessment associated with the individual.
     *
     * @param Risk|array{
     *   code?: string|null, reason?: string|null, score?: float|null
     * } $risk
     */
    public function withRisk(Risk|array $risk): self
    {
        $obj = clone $this;
        $obj['risk'] = $risk;

        return $obj;
    }

    /**
     * Optional identifier indicating the source of the individual record.
     */
    public function withSourceID(string $sourceID): self
    {
        $obj = clone $this;
        $obj['sourceID'] = $sourceID;

        return $obj;
    }

    /**
     * Current operational state in the workflow (e.g., WAITING, IN_PROGRESS, COMPLETED).
     */
    public function withState(string $state): self
    {
        $obj = clone $this;
        $obj['state'] = $state;

        return $obj;
    }

    /**
     * Overall processing status of the individual (e.g., rejected, need_review, approved).
     */
    public function withStatus(string $status): self
    {
        $obj = clone $this;
        $obj['status'] = $status;

        return $obj;
    }

    /**
     * List of tags assigned to the individual for categorization or metadata purposes.
     *
     * @param list<Tag|array{
     *   key?: string|null,
     *   private?: bool|null,
     *   type?: string|null,
     *   value?: string|null,
     * }> $tags
     */
    public function withTags(array $tags): self
    {
        $obj = clone $this;
        $obj['tags'] = $tags;

        return $obj;
    }

    /**
     * Technical metadata related to the request (e.g., QR code settings, language).
     *
     * @param TechnicalData|array{
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
     * } $technicalData
     */
    public function withTechnicalData(TechnicalData|array $technicalData): self
    {
        $obj = clone $this;
        $obj['technicalData'] = $technicalData;

        return $obj;
    }

    /**
     * Public-facing webview URL for the individual’s identification process.
     */
    public function withWebviewURL(string $webviewURL): self
    {
        $obj = clone $this;
        $obj['webviewURL'] = $webviewURL;

        return $obj;
    }

    /**
     * Identifier of the workspace to which the individual belongs.
     */
    public function withWorkspaceID(string $workspaceID): self
    {
        $obj = clone $this;
        $obj['workspaceID'] = $workspaceID;

        return $obj;
    }
}
