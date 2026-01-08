<?php

declare(strict_types=1);

namespace Dataleon\Individuals;

use Dataleon\Check;
use Dataleon\Core\Attributes\Optional;
use Dataleon\Core\Concerns\SdkModel;
use Dataleon\Core\Contracts\BaseModel;
use Dataleon\Individuals\Documents\GenericDocument;
use Dataleon\Individuals\Individual\AmlSuspicion;
use Dataleon\Individuals\Individual\Certificat;
use Dataleon\Individuals\Individual\IdentityCard;
use Dataleon\Individuals\Individual\Person;
use Dataleon\Individuals\Individual\Property;
use Dataleon\Individuals\Individual\Risk;
use Dataleon\Individuals\Individual\Tag;
use Dataleon\Individuals\Individual\TechnicalData;

/**
 * Represents a single individual record, including identification, status, and associated metadata.
 *
 * @phpstan-import-type AmlSuspicionShape from \Dataleon\Individuals\Individual\AmlSuspicion
 * @phpstan-import-type CertificatShape from \Dataleon\Individuals\Individual\Certificat
 * @phpstan-import-type CheckShape from \Dataleon\Check
 * @phpstan-import-type GenericDocumentShape from \Dataleon\Individuals\Documents\GenericDocument
 * @phpstan-import-type IdentityCardShape from \Dataleon\Individuals\Individual\IdentityCard
 * @phpstan-import-type PersonShape from \Dataleon\Individuals\Individual\Person
 * @phpstan-import-type PropertyShape from \Dataleon\Individuals\Individual\Property
 * @phpstan-import-type RiskShape from \Dataleon\Individuals\Individual\Risk
 * @phpstan-import-type TagShape from \Dataleon\Individuals\Individual\Tag
 * @phpstan-import-type TechnicalDataShape from \Dataleon\Individuals\Individual\TechnicalData
 *
 * @phpstan-type IndividualShape = array{
 *   id?: string|null,
 *   amlSuspicions?: list<AmlSuspicion|AmlSuspicionShape>|null,
 *   authURL?: string|null,
 *   certificat?: null|Certificat|CertificatShape,
 *   checks?: list<Check|CheckShape>|null,
 *   createdAt?: \DateTimeInterface|null,
 *   documents?: list<GenericDocument|GenericDocumentShape>|null,
 *   identityCard?: null|IdentityCard|IdentityCardShape,
 *   number?: int|null,
 *   person?: null|Person|PersonShape,
 *   portalURL?: string|null,
 *   properties?: list<Property|PropertyShape>|null,
 *   risk?: null|Risk|RiskShape,
 *   sourceID?: string|null,
 *   state?: string|null,
 *   status?: string|null,
 *   tags?: list<Tag|TagShape>|null,
 *   technicalData?: null|TechnicalData|TechnicalDataShape,
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
     * @param list<AmlSuspicion|AmlSuspicionShape>|null $amlSuspicions
     * @param Certificat|CertificatShape|null $certificat
     * @param list<Check|CheckShape>|null $checks
     * @param list<GenericDocument|GenericDocumentShape>|null $documents
     * @param IdentityCard|IdentityCardShape|null $identityCard
     * @param Person|PersonShape|null $person
     * @param list<Property|PropertyShape>|null $properties
     * @param Risk|RiskShape|null $risk
     * @param list<Tag|TagShape>|null $tags
     * @param TechnicalData|TechnicalDataShape|null $technicalData
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
        $self = new self;

        null !== $id && $self['id'] = $id;
        null !== $amlSuspicions && $self['amlSuspicions'] = $amlSuspicions;
        null !== $authURL && $self['authURL'] = $authURL;
        null !== $certificat && $self['certificat'] = $certificat;
        null !== $checks && $self['checks'] = $checks;
        null !== $createdAt && $self['createdAt'] = $createdAt;
        null !== $documents && $self['documents'] = $documents;
        null !== $identityCard && $self['identityCard'] = $identityCard;
        null !== $number && $self['number'] = $number;
        null !== $person && $self['person'] = $person;
        null !== $portalURL && $self['portalURL'] = $portalURL;
        null !== $properties && $self['properties'] = $properties;
        null !== $risk && $self['risk'] = $risk;
        null !== $sourceID && $self['sourceID'] = $sourceID;
        null !== $state && $self['state'] = $state;
        null !== $status && $self['status'] = $status;
        null !== $tags && $self['tags'] = $tags;
        null !== $technicalData && $self['technicalData'] = $technicalData;
        null !== $webviewURL && $self['webviewURL'] = $webviewURL;
        null !== $workspaceID && $self['workspaceID'] = $workspaceID;

        return $self;
    }

    /**
     * Unique identifier of the individual.
     */
    public function withID(string $id): self
    {
        $self = clone $this;
        $self['id'] = $id;

        return $self;
    }

    /**
     * List of AML (Anti-Money Laundering) suspicion entries linked to the individual.
     *
     * @param list<AmlSuspicion|AmlSuspicionShape> $amlSuspicions
     */
    public function withAmlSuspicions(array $amlSuspicions): self
    {
        $self = clone $this;
        $self['amlSuspicions'] = $amlSuspicions;

        return $self;
    }

    /**
     * URL to authenticate the individual, usually for document signing or onboarding.
     */
    public function withAuthURL(string $authURL): self
    {
        $self = clone $this;
        $self['authURL'] = $authURL;

        return $self;
    }

    /**
     * Digital certificate associated with the individual, if any.
     *
     * @param Certificat|CertificatShape $certificat
     */
    public function withCertificat(Certificat|array $certificat): self
    {
        $self = clone $this;
        $self['certificat'] = $certificat;

        return $self;
    }

    /**
     * List of verification or validation checks applied to the individual.
     *
     * @param list<Check|CheckShape> $checks
     */
    public function withChecks(array $checks): self
    {
        $self = clone $this;
        $self['checks'] = $checks;

        return $self;
    }

    /**
     * Timestamp of the individual's creation in ISO 8601 format.
     */
    public function withCreatedAt(\DateTimeInterface $createdAt): self
    {
        $self = clone $this;
        $self['createdAt'] = $createdAt;

        return $self;
    }

    /**
     * All documents submitted or associated with the individual.
     *
     * @param list<GenericDocument|GenericDocumentShape> $documents
     */
    public function withDocuments(array $documents): self
    {
        $self = clone $this;
        $self['documents'] = $documents;

        return $self;
    }

    /**
     * Reference to the individual's identity document.
     *
     * @param IdentityCard|IdentityCardShape $identityCard
     */
    public function withIdentityCard(IdentityCard|array $identityCard): self
    {
        $self = clone $this;
        $self['identityCard'] = $identityCard;

        return $self;
    }

    /**
     * Internal sequential number or reference for the individual.
     */
    public function withNumber(int $number): self
    {
        $self = clone $this;
        $self['number'] = $number;

        return $self;
    }

    /**
     * Personal details of the individual, such as name, date of birth, and contact info.
     *
     * @param Person|PersonShape $person
     */
    public function withPerson(Person|array $person): self
    {
        $self = clone $this;
        $self['person'] = $person;

        return $self;
    }

    /**
     * Admin or internal portal URL for viewing the individual's details.
     */
    public function withPortalURL(string $portalURL): self
    {
        $self = clone $this;
        $self['portalURL'] = $portalURL;

        return $self;
    }

    /**
     * Custom key-value metadata fields associated with the individual.
     *
     * @param list<Property|PropertyShape> $properties
     */
    public function withProperties(array $properties): self
    {
        $self = clone $this;
        $self['properties'] = $properties;

        return $self;
    }

    /**
     * Risk assessment associated with the individual.
     *
     * @param Risk|RiskShape $risk
     */
    public function withRisk(Risk|array $risk): self
    {
        $self = clone $this;
        $self['risk'] = $risk;

        return $self;
    }

    /**
     * Optional identifier indicating the source of the individual record.
     */
    public function withSourceID(string $sourceID): self
    {
        $self = clone $this;
        $self['sourceID'] = $sourceID;

        return $self;
    }

    /**
     * Current operational state in the workflow (e.g., WAITING, IN_PROGRESS, COMPLETED).
     */
    public function withState(string $state): self
    {
        $self = clone $this;
        $self['state'] = $state;

        return $self;
    }

    /**
     * Overall processing status of the individual (e.g., rejected, need_review, approved).
     */
    public function withStatus(string $status): self
    {
        $self = clone $this;
        $self['status'] = $status;

        return $self;
    }

    /**
     * List of tags assigned to the individual for categorization or metadata purposes.
     *
     * @param list<Tag|TagShape> $tags
     */
    public function withTags(array $tags): self
    {
        $self = clone $this;
        $self['tags'] = $tags;

        return $self;
    }

    /**
     * Technical metadata related to the request (e.g., QR code settings, language).
     *
     * @param TechnicalData|TechnicalDataShape $technicalData
     */
    public function withTechnicalData(TechnicalData|array $technicalData): self
    {
        $self = clone $this;
        $self['technicalData'] = $technicalData;

        return $self;
    }

    /**
     * Public-facing webview URL for the individual’s identification process.
     */
    public function withWebviewURL(string $webviewURL): self
    {
        $self = clone $this;
        $self['webviewURL'] = $webviewURL;

        return $self;
    }

    /**
     * Identifier of the workspace to which the individual belongs.
     */
    public function withWorkspaceID(string $workspaceID): self
    {
        $self = clone $this;
        $self['workspaceID'] = $workspaceID;

        return $self;
    }
}
